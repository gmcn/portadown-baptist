<?php

	$title = get_the_title();

	$title = str_replace(" ", "<br />", $title);

 ?>

<div class="container contact">
	<div class="row">
		<div class="col-md-6 contact_content">
			<h1><?php echo $title ?></h1>
			<?php the_content(); ?>
		</div>
		<div class="col-md-6 contact_form">
			<?php echo do_shortcode('[contact-form-7 id="7" title="Contact form 1"]'); ?>
		</div>
	</div>
</div>
