<?php
function ow_acf_mrkp_grid_image( $grid ) {
	$grid = $grid[0];
	$set  = $grid['set'][0];
	$type = $set['type'];
    ?>
    <div class="ow-wrap-grid <?php ow_grid_set_type( $set ); ?> clearfix" style="<?php ow_grid_set_side_pad( $set ); ?>">
		<ul class="grid ow-grid clearfix ow-grid-image ow-grid-<?php echo $type; ?> <?php ow_grid_set_items_width( $set ); ?> <?php ow_grid_set_items_max_per_row( $set ); ?>" style="<?php ow_grid_set_mw( $set ); ?>">
			<?php ow_acf_mrkp_grid_image_list( $grid ); ?>
		</ul>
    </div>
    <?php
}
function ow_acf_mrkp_grid_image_list( $grid ) {	
	$set       = $grid['set'][0];
	$name      = $set['name'];
	$type      = $set['type'];

	$item      = $set['item'];
	$shadow    = $item['shadow'];
	$gutter    = $item['gutter'];

	$show_ctnt = $grid['show_ctnt'];

	$images    = $grid['images'];

	if ( $images ) {
	    foreach ( $images as $img ) {
	    	$title = $img['title'];
	    	$capt  = $img['caption'];
	    	$alt   = $img['alt'];
	    	$desc  = $img['description'];
	    	?>
	        <li class="ow-grid-item ow-grid-item-<?php echo $type; ?>" style="padding: <?php echo $gutter; ?>px">
	        	<div class="ow-wrap-link <?php echo ow_acf_mrkp_shadow( $shadow ); ?>">

				    <a href="<?php echo $img['url']; ?>" class="ow-link" data-lightbox="<?php echo $name; ?>" data-title="<?php echo $img['caption']; ?>">
				        <?php if ( $type === 'static-height' ): ?>
				        	<span class="ow-bg-img" style="background-image: url(<?php echo $img['sizes']['large']; ?>); height: <?php echo $item['height']; ?>px;"></span>
				        <?php else : ?>
				            <img src="<?php echo $img['sizes']['large']; ?>" alt="<?php echo $img['alt']; ?>">
				        <?php endif; ?>
						
						<?php if ( $show_ctnt ): ?>
							<span class="ow-wrap-mrkp-ctnt">
						        <?php 
						        if ( $alt ) {
						        	echo '<h6>' . $alt . '</h6>';
						        }
						       	if ( $title ) {
						        	echo '<h4>' . $title . '</h4>';
						        }
						        if ( $capt ) {
						        	echo '<h5>' . $capt . '</h5>';
						        }
						        if ( $desc ) {
						        	echo '<p>' . $desc . '</p>';
						        }
						        ?>
							</span>
						<?php endif; ?>

				    </a>

				</div>
	        </li>
	    	<?php
	    }
	}
}