<?php function ow_acf_mrkp_back_to_top( $args ) {
    $args = $args[0];
    $show = $args['show'];
    $text = $args['text'];
    $icon = $args['icon'];
    if ( $show ) {
        ?>
        <div class="ow-wrap-back-to-top">
            <div class="inner">
                <a href="#0" id="ow-back-to-top" class="ow-back-to-top">
                    <span class="inner">
                        <?php if ( $text ): ?>
                            <span class="ow-text"><?php echo $text; ?></span>
                        <?php endif; ?>

                        <span class="ow-icon">
                            <i class="fa fa-<?php echo $icon; ?>"></i>
                        </span>
                    </span>
                </a>
            </div>
        </div>
        <?php
    }
}