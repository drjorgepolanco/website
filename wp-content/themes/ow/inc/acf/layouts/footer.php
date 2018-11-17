<?php if ( ! function_exists( 'ow_acf_lyts_footer' ) ) {
    function ow_acf_lyts_footer( $args ) {
        $args        = $args[0];
        $logo        = $args['logo'];
        $info        = $args['info'];
        $wgts        = $args['wgts'];
        $copyright   = $args['copyright'];
        $back_to_top = $args['back_to_top'];
        $modals      = $args['modals'];
        ?>
        <footer id="colophon" class="site-footer">
            <div class="inner clearfix">
                <div class="ow-wrap-footer clearfix">
                    <?php 
                    ow_acf_mrkp_logo( $logo );
                    ow_acf_mrkp_ctnt_list( $info );
                    ow_acf_lyts_nav_wgts( $wgts );
                    ow_cpnt_copyright( $copyright );
                    ow_acf_mrkp_back_to_top( $back_to_top ); 
                    ?>
                </div>
            </div>
        </footer>
        <?php
        ow_acf_mrkp_modals( $modals );
    }
}