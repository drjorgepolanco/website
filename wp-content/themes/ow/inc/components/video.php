<?php 
function ow_cpnt_video_fmt_raw( $video, $fmt ) {
    ?>
    <video playsinline muted loop controls class="ow-video ow-raw">
        <source src="<?php echo $video; ?>" type="video/<?php echo $fmt; ?>">
    </video>
    <?php
}
function ow_cpnt_video_fmt_vim( $video ) {
    ?>
    <iframe class="ow-video ow-video-web ow-vimeo" src="https://player.vimeo.com/video/<?php echo $video; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    <?php
}
function ow_cpnt_video_fmt_yt( $video ) {
    ?>
    <iframe class="ow-video ow-video-web ow-youtube" src="https://www.youtube.com/embed/<?php echo $video; ?>?rel=0&amp;showinfo=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    <?php
}