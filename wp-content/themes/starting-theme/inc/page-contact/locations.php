<?php if( have_rows('locations') ): ?>

<div class="container-fluid">
	<div class="row">

	<?php $i = 1; while( have_rows('locations') ): the_row();

		// vars
		$locationName = get_sub_field('location_name');
		$locationImg = get_sub_field('location_image');
		$locationGmap = get_sub_field('location_gmaps_link');

		?>



		<div class="col-md-6 contact_locations">
				<div class="col-sm-10 col-md-8 col-lg-6 <?php if ($i % 2) : ?>col-sm-offset-2 col-md-offset-4 col-lg-offset-6<?php endif ?> contact_locations__title">
					<?php echo $locationName ?><br />
					Location
				</div>
			<img src="<?php echo $locationImg ?>" alt="<?php echo $locationName ?>">
			<div class="vert-align">
				<a href="<?php echo $locationGmap ?>" target="_blank">Click for maps & directions</a>
			</div>
		</div>

	<?php $i++; endwhile; ?>

	</div>
</div>

<?php endif; ?>
