<?php
/* Add custom fonts to wysiwyg editor */
add_filter( 'tiny_mce_before_init', 'ow_mce_custom_fonts_array' );
function ow_mce_custom_fonts_array( $init ) {
    $theme_advanced_fonts = "Arial Black=arial black,avant garde;" .
                            "Courier New=courier new,courier;" .
                            "Georgia=georgia,palatino;" .
                            "Helvetica=Helvetica;" .
                            "Lato=Lato;" .
                            "Meta Serif Bold=Meta Serif Bold;" .
                            "Meta Serif Book=Meta Serif Book;" .
                            "Meta Serif Book Italic=Meta Serif Book Italic;" .
                            "Meta Serif Medium=Meta Serif Medium;" .
                            "Meta Serif Medium Italic=Meta Serif Medium Italic;" .
                            "Proxima Nova Light=Proxima Nova Light;" .
                            "Proxima Nova Regular=Proxima Nova Regular;" .
                            "Proxima Nova Semibold=Proxima Nova Semibold;" .
                            "Proxima Nova Bold=Proxima Nova Bold;" .
                            "Tahoma=tahoma,arial,helvetica,sans-serif;" .
                            "Times New Roman=times new roman,times;" .
                            "TTNorms Bold=TTNorms-Bold;" .
                            "TTNorms Bold Italic=TTNorms-BoldItalic;" .
                            "TTNorms Black=TTNorms-Black;" .
                            "TTNorms Black Italic=TTNorms-BlackItalic;" .
                            "TTNorms Extra Bold=TTNorms-ExtraBold;" .
                            "TTNorms Extra Bold Italic=TTNorms-ExtraBoldItalic;" .
                            "TTNorms Extra Light=TTNorms-ExtraLight;" .
                            "TTNorms Extra Light Italic=TTNorms-ExtraLightItalic;" .
                            "TTNorms Heavy=TTNorms-Heavy;" .
                            "TTNorms Heavy Italic=TTNorms-HeavyItalic;" .
                            "TTNorms Italic=TTNorms-Italic;" .
                            "TTNorms Light=TTNorms-Light;" .
                            "TTNorms Light Italic=TTNorms-LightItalic;" .
                            "TTNorms Medium=TTNorms-Medium;" .
                            "TTNorms Medium Italic=TTNorms-MediumItalic;" .
                            "TTNorms Regular=TTNorms-Regular;" .
                            "TTNorms Thin=TTNorms-Thin;" .
                            "TTNorms Thin Italic=TTNorms-ThinItalic;" .
                            "Verdana=verdana,geneva;";
    $init['font_formats'] = $theme_advanced_fonts;
    return $init;
}
