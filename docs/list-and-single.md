## list
```php
<?php get_header(); ?>
	<article class="">
	  <h1>custom field</h1>
		<?php
			$wp_query = new WP_Query();
			$param = array(
				'posts_per_page' => '-1', 
				'post_type' => 'custom-field',
				'orderby' => 'title',
				'order' => 'ASC'
			);
		
			$wp_query -> query($param);
			
			if ( $wp_query -> have_posts() ) : 
				while ( $wp_query -> have_posts() ) : the_post(); ?>
			<li>
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail( 
						array( 'class' => 'custom-thumbnail' )
					);
				} ?>
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</li>
		<?php endwhile; endif; ?>
	</article>
<?php get_footer(); ?>

```

## single
```php
<?php get_header(); ?>
	<article class="">
	<?php
    	while ( have_posts() ) : the_post(); ?>
    <h1>
    	<?php the_title(); ?>
    </h1>

    <time>
    	<?php the_date(); the_time(); ?>
    </time>
    
    <p>
    	<?php the_field('text_field'); ?>
    </p>
	<?php endwhile; ?>
	</article>
<?php get_footer(); ?>

```
