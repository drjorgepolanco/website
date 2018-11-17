<?php 
function ow_acf_sctn_ctnt_dbl( $name, $args ) {
    $args = $args[0];
    $type = $args['type'];
    $ctnt = $args['ctnt'];
    
    // Subsections
    $width = $ctnt['width'];
    $one   = $ctnt['col_one'];
    $two   = $ctnt['col_two'];
    $two_w = 100 - $width;

    $one_args = array( 'type' => $type, 'col' => 'one', 'width' => $width, 'subsctn' => $one );
    $two_args = array( 'type' => $type, 'col' => 'two', 'width' => $two_w, 'subsctn' => $two );
 
    ow_cpnt_sctn_header( $name, $args );
        ?>
        <div class="ow-wrap-subsctns clearfix">
            <?php
            ow_acf_sctn_ctnt_dbl_subsctn( $one_args );
            ow_acf_sctn_ctnt_dbl_subsctn( $two_args );
            ?>
        </div>
        <?php
    ow_cpnt_sctn_footer();
}
function ow_acf_sctn_ctnt_dbl_subsctn( $args ) {
    $type    = $args['type'];
    $col     = $args['col'];
    $width   = $args['width'];
    $subsctn = $args['subsctn'];

    $align   = $subsctn['align'][0]['prop_align'];
    ?>
    <div class="ow-col ow-<?php echo $col; ?> ow-align-<?php echo $align; ?>" style="width: <?php echo $width; ?>%;">
        <?php ow_cpnt_subsctn( $type, $subsctn ); ?>
    </div>
    <?php
}
 
