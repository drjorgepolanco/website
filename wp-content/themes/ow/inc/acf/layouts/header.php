<?php if ( ! function_exists( 'ow_acf_lyts_header' ) ) {
    function ow_acf_lyts_header( $args ) {
        $args        = $args[0];

        $header      = $args['header'];
        $mobi        = $args['mobi'];
        $wgts        = $args['wgts'];

        $hide        = $header['hide'];
        $bg          = $header['bg'];
        $pos         = $header['pos'];
        $shadow      = $header['shadow'];
        $logo        = $header['logo'];

        $mobi_bg     = $mobi['bg'];
        $mobi_pos    = $mobi['pos'];
        $mobi_shadow = $mobi['shadow'];
        $mobi_trig   = $mobi['trig'];
        ?>
        <header id="masthead" class="site-header active" <?php ow_lyts_header_data_nav_status( $hide ); ?> style="position: <?php echo $pos; ?>;">
            
            <div class="ow-header-bg" style="<?php echo ow_acf_prop_color_bg( $bg ); ?><?php echo ow_acf_prop_shadow( $shadow ); ?>"></div>

            <div class="ow-site-header-inner inner clearfix">
                <?php ow_acf_mrkp_logo( $logo ); ?>

                <nav id="site-nav" class="main-nav ow-header-nav">
                    <?php ow_mobile_nav_trigger( $mobi_trig ); ?>

                    <div id="ow-wrap-nav" class="ow-wrap-nav ow-<?php echo $mobi_pos; ?>" style="<?php echo ow_acf_prop_color_bg( $mobi_bg ); ?><?php echo ow_acf_prop_shadow( $mobi_shadow ); ?>">
                        <div class="inner">
                            <?php ow_acf_lyts_nav_wgts( $wgts ); ?>
                        </div>
                    </div>
                </nav><!-- #site-nav -->
            </div>
        </header><!-- #masthead -->
        <?php
    }
}
function ow_lyts_header_data_nav_status( $hide ) {
    if ( $hide ) {
        echo 'data-nav-status="toggle"';
    }
}
function ow_mobile_nav_trigger( $trig ) {
    $type = $trig['type'];

    if ( $type === 'icon' ) {
        $show_menu = $trig['menu'];
        $color     = $trig['color'];
        ?>
        <a class="menu-toggle ow-nav-trigger" href="#0" aria-controls="main-menu" aria-expanded="false" style="<?php echo ow_acf_prop_color_brdr( $color ); ?>">
            <span class="inner">
                <?php if ( $show_menu ): ?>
                    <span class="ow-text" style="<?php echo ow_acf_prop_color( $color ); ?>">
                        <?php esc_html_e( 'Menu', 'ow' ); ?>
                    </span>
                <?php endif; ?>

                <span class="ow-icon" style="<?php echo ow_acf_prop_color_bg( $color ); ?>">
                    <span class="ow-before" style="<?php echo ow_acf_prop_color_bg( $color ); ?>"></span>
                    <span class="ow-after" style="<?php echo ow_acf_prop_color_bg( $color ); ?>"></span>
                </span>
            </span>
        </a>
        <?php
    }
    if ( $type === 'button' ) {
        ?>
        <button class="menu-toggle ow-nav-trigger" aria-controls="main-menu" aria-expanded="false">
            <?php esc_html_e( 'Menu', 'ow' ); ?>
        </button>
        <?php            
    }
}