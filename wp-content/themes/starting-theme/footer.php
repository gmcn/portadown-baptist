<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Starting_Theme
 */

?>

	</div><!-- #content -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<footer class="container-fluid">

		<div class="row">
			<div class="col-xs-6 col-md-2 matchheight">
				<a class="navbar-brand" href="/"><img src="<?php echo get_stylesheet_directory_uri();?>/images/logo.svg" alt="<?php echo get_bloginfo( 'description', 'display' ) ?>"/></a><br />
				<ul class="footer_social">
					<li>
						<a href="/"><img src="<?php echo get_stylesheet_directory_uri();?>/images/facebook-icon_header.svg" alt="Like Portadown Baptist on Facebook"></a>
					</li>
					<li>
						<a href="/"><img src="<?php echo get_stylesheet_directory_uri();?>/images/twitter-icon_header.svg" alt="Follow Portadown Baptist on Twitter"></a>
					</li>
					<li>
						<a href="/"><img src="<?php echo get_stylesheet_directory_uri();?>/images/youtube-icon_header.svg" alt="Portadown Baptist on Youtube"></a>
					</li>
				</ul>
			</div>
			<div class="col-xs-6 col-md-2 matchheight">

					<?php wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'items_wrap' => '<ul id="" class="footer_nav">%3$s</ul>' ) );
						?>

			</div>
			<div class="col-md-4 footer_twitter matchheight">

				<?php
					// keys from your app
					$oauth_access_token = "23049388-2RfHvKBNnL2ySkEKBPsOyGTqXLHBDkUuzw0faRc4J";
					$oauth_access_token_secret = "t146qv20rvrqRp5ZzyQccswz3QB7CofmIYcgyJkxZl11X";
					$consumer_key = "32GdTf2QCUxwLMABAg5bAYVzl";
					$consumer_secret = "q9SxqOrcZMsMlYrGPzBlvSKh7HQ5umu3xCzZ100dl0ClpuEuix";

					// we are going to use "user_timeline"
					$twitter_timeline = "user_timeline";

					// specify number of tweets to be shown and twitter username
					// for example, we want to show 20 of Taylor Swift's twitter posts
					$request = array(
					    'count' => '2',
					    'screen_name' => 'ThomasStBaptist'
					);

					$screen_name = 'ThomasStBaptist';


					// put oauth values in one oauth array variable
					$oauth = array(
					    'oauth_consumer_key' => $consumer_key,
					    'oauth_nonce' => time(),
					    'oauth_signature_method' => 'HMAC-SHA1',
					    'oauth_token' => $oauth_access_token,
					    'oauth_timestamp' => time(),
					    'oauth_version' => '1.0'
					);

					// combine request and oauth in one array
					$oauth = array_merge($oauth, $request);

					// make base string
					$baseURI="https://api.twitter.com/1.1/statuses/$twitter_timeline.json";
					$method="GET";
					$params=$oauth;

					$r = array();
					ksort($params);
					foreach($params as $key=>$value){
					    $r[] = "$key=" . rawurlencode($value);
					}
					$base_info = $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
					$composite_key = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);

					// get oauth signature
					$oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
					$oauth['oauth_signature'] = $oauth_signature;

					// make request
					// make auth header
					$r = 'Authorization: OAuth ';

					$values = array();
					foreach($oauth as $key=>$value){
						$values[] = "$key=\"" . rawurlencode($value) . "\"";
					}
					$r .= implode(', ', $values);

					// get auth header
					$header = array($r, 'Expect:');

					// set cURL options
					$options = array(
						CURLOPT_HTTPHEADER => $header,
						CURLOPT_HEADER => false,
						CURLOPT_URL => "https://api.twitter.com/1.1/statuses/$twitter_timeline.json?". http_build_query($request),
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_SSL_VERIFYPEER => true
					);

					$themeUrl = get_stylesheet_directory_uri();

					// retrieve the twitter feed
					$feed = curl_init();
					curl_setopt_array($feed, $options);
					$json = curl_exec($feed);
					curl_close($feed);

					// decode json format tweets
					$tweets=json_decode($json, true);

					 ?>

			 <?php

			 // show tweets
			foreach($tweets as $tweet) : ?>

			<?php // get tweet text
			$tweet_text=$tweet['text'];
			$tweet_date=$tweet['created_at'];
			$date = new DateTime( $tweet['created_at'] );

			// make links clickable
			$tweet_text=preg_replace('@(https?://([-\w\.]+)+(/([\w/_\.]*(\?\S+)?(#\S+)?)?)?)@', '<a href="$1" target="_blank">$1</a>', $tweet_text); ?>

				<div class="footer_twitter__wrapper">


					<p><img src='<?php echo $themeUrl ?>/images/twitter_live.svg' alt='<?php $screen_name ?>'><?php echo $tweet_text; ?></p>

					<p class="footer_twitter__wrapper__timestamp"><a class="screen_name" href="https://twitter.com/<?php echo $screen_name ?>" target="_blank">@<?php echo $screen_name ?></a> <?php echo $date->format( 'M. j, Y' );  ?></p>
				</div>



			<?php endforeach ?>


			</div>
			<div class="col-md-4 footer_links matchheight">
				<a href="#">Privacy Policy</a>
				<a href="#">Cookies</a>
				<p>Website by <a class="byline" href="#">Cornell</a></p>

			</div>
		</div>


		<div class="row signature no-gutters">
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-1 footer_sponsors">
				<img src="<?php echo get_stylesheet_directory_uri();?>/images/irish-baptist-college.jpg" srcset="<?php echo get_stylesheet_directory_uri();?>/images/irish-baptist-college@2x.jpg" alt="Irish Beptist College">
			</div>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-1 footer_sponsors">
				<img src="<?php echo get_stylesheet_directory_uri();?>/images/baptist-missions.jpg" srcset="<?php echo get_stylesheet_directory_uri();?>/images/baptist-missions@2x.jpg" alt="Baptist Missions | Proclaiming Christ & Planing Churches">
			</div>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-1 footer_sponsors">
				<img src="<?php echo get_stylesheet_directory_uri();?>/images/baptist-women.jpg" srcset="<?php echo get_stylesheet_directory_uri();?>/images/baptist-women@2x.jpg" alt="Baptist Women">
			</div>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-1 footer_sponsors">
				<img src="<?php echo get_stylesheet_directory_uri();?>/images/byouth.jpg" srcset="<?php echo get_stylesheet_directory_uri();?>/images/byouth@2x.jpg" alt="Byouth">
			</div>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-1 footer_sponsors">
				<img src="<?php echo get_stylesheet_directory_uri();?>/images/association-of-baptists-chuches-in-ireland.jpg" srcset="<?php echo get_stylesheet_directory_uri();?>/images/association-of-baptists-chuches-in-ireland@2x.jpg" alt="Association of Baptists churches in Ireland">
			</div>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-1 footer_sponsors">
				<img src="<?php echo get_stylesheet_directory_uri();?>/images/reach.jpg" srcset="<?php echo get_stylesheet_directory_uri();?>/images/reach@2x.jpg" alt="Reach">
			</div>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-1 footer_sponsors">
				<img src="<?php echo get_stylesheet_directory_uri();?>/images/campaigners.jpg" srcset="<?php echo get_stylesheet_directory_uri();?>/images/campaigners@2x.jpg" alt="Campaigners Youth & Childrens's Ministry">
			</div>
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-1 footer_sponsors">
				<img src="<?php echo get_stylesheet_directory_uri();?>/images/griefshare.jpg" srcset="<?php echo get_stylesheet_directory_uri();?>/images/griefshare@2x.jpg" alt="GriefShare">
			</div>
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
