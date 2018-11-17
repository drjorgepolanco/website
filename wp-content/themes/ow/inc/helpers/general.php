<?php
/* No IE8 Message */
if (!function_exists('ow_no_ie8')) {
    function ow_no_ie8() {
        ?>
        <!--[if lt IE 8]>
            <p class="browserupgrade">
                You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/?locale=en">upgrade your browser</a> to improve your experience.
            </p>
        <![endif]-->
        <?php
    }
}

/* Mouse Wheel */
if ( ! function_exists( 'ow_mouse_wheel' ) ) {
    function ow_mouse_wheel() {
        ?>
        <div class="scroll">
            <a href="#">
                <div class="mouse">
                    <div class="wheel"></div>
                </div>
            </a>
        </div>
        <?php
    }
}

if ( ! function_exists( 'ow_get_stripped_content' ) ) {
    function ow_get_stripped_content( $content, $tags ) {
        // $content: the content you want to output
        // $tags: the tags you are looking to keep, every other will be removed
        $stripped = strip_tags( $content, $tags );
        echo $stripped;
    }
}