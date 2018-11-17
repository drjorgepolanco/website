<?php
function ow_acf_mrkp_grid_media( $grid ) {
	$grid   = $grid[0];

	$set    = $grid['set'][0];
	$type   = $set['type'];

	$filter = $grid['filter'];
    ?>
    <div class="ow-wrap-grid <?php ow_grid_set_type( $set ); ?> clearfix" style="<?php ow_grid_set_side_pad( $set ); ?>">
    	
    	<?php ow_grid_media_filter( $filter ); ?>

		<ul class="grid ow-grid clearfix ow-grid-media ow-grid-<?php echo $type; ?> <?php ow_grid_set_items_width( $set ); ?> <?php ow_grid_set_items_max_per_row( $set ); ?>" style="<?php ow_grid_set_mw( $set ); ?>">
			<?php ow_acf_mrkp_grid_media_list( $grid ); ?>
		</ul>
    </div>
    <?php
}
function ow_acf_mrkp_grid_media_list( $grid ) {
	$set    = $grid['set'][0];
	$name   = $set['name'];
	$type   = $set['type'];

	$item   = $set['item'];
	$shadow = $item['shadow'];
	$gutter = $item['gutter'];

	$items  = $grid['items'];

	if ( $items ) {
	    foreach ( $items as $item ) {
	    	$cat     = $item['cat'];
	    	$mtype   = $item['type']; // media type: image or video
	    	$link    = $item['link'];
	    	$img     = wp_get_attachment_image_src( $item['img'], 'full' );
	    	$img_alt = get_post_meta( $item['img'], '_wp_attachment_image_alt', true);
	    	$video   = $item['video'];
	    	$ctnt    = $item['ctnt'];
	    	?>
	        <li class="ow-grid-item ow-grid-item-<?php echo $type; ?><?php ow_grid_media_taxonomies( $cat ); ?>" style="padding: <?php echo $gutter; ?>px;">
	        	<div class="ow-wrap-link <?php echo ow_acf_mrkp_shadow( $shadow ); ?>">

		        	<a class="ow-link" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
		        		<?php 
		        		if ( $mtype === 'image' ):
					        if ( $type === 'static-height' ): 
					        	?>
					        	<span class="ow-bg-img" style="background-image: url(<?php echo $img[0]; ?>); height: <?php echo $set['height']; ?>px;"></span>
					        <?php else : ?>
					            <img class="ow-img" src="<?php echo $img[0]; ?>" alt="<?php echo $img_alt; ?>">
					        <?php 
					    	endif;

					        ow_acf_mrkp_ctnt( $ctnt );
		        		endif;

		        		if ( $mtype === 'video' ):
			        		ow_grid_media_video_type( $args );
								ow_acf_mrkp_video_dyc( $video );
							echo '</div>';

							ow_acf_mrkp_ctnt( $ctnt );
					    endif; 
					    ?>
		        	</a>

		        </div>
	        </li>
	    	<?php
	    }
	}
}

function ow_grid_media_video_type( $args ) {
	$type      = $args['type'];
	$type_grid = $type['grid'];
	$set       = $args['set'];

	if ( $type_grid === 'static-height' ) {
		?>
		<div class="ow-video-static-height" style="height: <?php echo $set['height']; ?>px;">
		<?php
	}
	else {
		?>
		<div class="ow-video-masonry ow-video-fill-not">
		<?php
	}
}



/* Filter */

function ow_grid_media_filter( $filter ) {
	$show = $filter['show'];

	if ( $show ):
	    ?>
	    <div class="ow-filter-wrap">
		    <div class="inner">
		        <div class="ow-filter">
		            <div class="filter-button-group button-group js-radio-button-group ow-btn-group">   
		                <?php ow_grid_media_filter_btns( $filter ); ?>
		            </div>
		        </div>
		    </div>	    	
	    </div>
	    <?php
	endif;
}
/* Buttons for Content Filtering */
function ow_grid_media_filter_btns( $filter ) {
	$shadow = $filter['shadow'];
	$cats   = $filter['cats'];
	
	if ( $cats ) {
		foreach ( $cats as $cat ) {
			$slug = $cat->slug;
			$name = $cat->name;

			$class = '';
			$title = '';

			switch ( $slug ) {
				case 'uncategorized':
					$class = '*';
					$title = 'HTML, CSS, JavaScript & jQuery';
					break;
				default:
					$class = '.' . $slug;
					$title  = $name;
					break;
			}
			echo '<button class="button ow-btn ' . ow_acf_mrkp_shadow( $shadow ) . '" data-filter="' . $class . '">' . $title . '</button>';  			
		}
	}
}

/* Categories for Content Filtering */
function ow_grid_media_taxonomies( $items ) {
	if ( $items ) {
		foreach ( $items as $item ) { 
			echo ' ' . esc_html( $item->slug ); 
		}
	}
}
