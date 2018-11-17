<?php 
function ow_acf_mrkp_img( $args ) {
    $args = $args[0];
    $show = $args['show'];
    $file = $args['file'];
    $mobi = $file['mobile'];
    $desk = $file['desktop'];

    if ( $show ):
        ?>
        <div class="ow-wrap-mrkp-img clearfix">
            <div class="inner">
                <?php 
                if ( $desk ): 
                    ow_acf_mrkp_img_el( $mobi, 'ow-mobile'  );
                    ow_acf_mrkp_img_el( $desk, 'ow-desktop' );
                else:
                    ow_acf_mrkp_img_el( $mobi );
                endif;
                ?>
            </div>
        </div>
        <?php
    endif;
}
function ow_acf_mrkp_img_el( $img, $class = '' ) {
    $img = wp_get_attachment_image_src( $img, 'full' );
    ?>
    <div class="ow-mrkp-img <?php echo $class; ?>" style="background-image: url(<?php echo $img[0]; ?>);"></div>
    <?php
}