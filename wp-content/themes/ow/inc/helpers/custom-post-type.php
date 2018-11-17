<?php
/* Get Custom Post Type Image */
function ow_get_cpt_img( $img, $class = '' ) {
    if ( $img ) {
        echo '<img src="' . $img['url'] . '" alt="' . $img['alt'] . '" class="' . $class . '">';
    }
}
/* Get Custom Post Type Image as Background Image */
function ow_get_cpt_bg_img( $img ) {
    if ( $img ) {
        echo 'background-image: url(' . $img['url'] . ');';
    }
}
/* Get Picture tag using Custom Post Type Images */
function ow_get_cpt_picture( $mobile, $desktop, $class = '', $min_width = '1024px' ) {
    ?>
    <span class="ow-picture <?php echo $class; ?>">
        <picture>
            <source media="(min-width: <?php echo $min_width; ?>)" srcset="<?php echo $desktop['url']; ?>">
            <?php ow_get_cpt_img( $mobile ) ?>
        </picture>
    </span>
    <?php
}
