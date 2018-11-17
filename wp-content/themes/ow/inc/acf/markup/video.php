<?php 
function ow_acf_mrkp_video( $type, $args ) {
    $video = $args['video'];
    ?>
    <div class="ow-wrap-subsctn ow-<?php echo $type; ?>">
        <div class="ow-subsctn clearfix">
            <div class="inner clearfix">
                <?php
                if ( $type === 'dyc' ) {
                    $ratio = $args['ratio'][0]['mrkp_video_prop_ratio'];
                    ?>
                    <div class="ow-video-fill-not clearfix">
                        <?php ow_acf_mrkp_video_src( $video, $ratio ); ?>
                    </div>
                    <?php
                } 
                else {
                    ?>
                    <div class="ow-video-fill">
                        <?php ow_acf_mrkp_video_src( $video ); ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}
function ow_acf_mrkp_video_dyc( $args ) {
    $dynamic = $args[0];
    $video   = $dynamic['video'];
    $ratio   = $dynamic['ratio'][0]['mrkp_video_prop_ratio'];
    ow_acf_mrkp_video_src( $video, $ratio );
}
function ow_acf_mrkp_video_src( $video, $ratio = '' ) {
    $video   = $video[0];
    $fmt     = $video['fmt'];
    ?>
    <div class="ow-video-height <?php if ( $ratio ) { echo $ratio; } ?>">
        <?php
        if ( $fmt === 'youtube' ) { 
            $yt = $video['yt'];
            ow_cpnt_video_fmt_yt( $yt ); 
        }
        elseif ( $fmt === 'vimeo' ) { 
            $vim = $video['vim'];
            ow_cpnt_video_fmt_vim( $vim ); 
        }
        else { 
            $raw = $video['raw'];
            ow_cpnt_video_fmt_raw( $raw, $fmt ); 
        }
        ?>
    </div>
    <?php
}
