<?php
	get_header();
?>

<?php while(have_posts(  )) : the_post(); ?>

	<?php if(is_checkout()) { ?>
		<div class="main__container">
			<?php the_content(); ?>
		</div>
	<?php } else { ?>
		<?php the_content(); ?>
	<?php } ?>

<?php endwhile; ?>

<?php
	get_footer();
?>
