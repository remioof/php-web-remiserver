<?php

// deprecated, i'll leave it here in case the site needs css/js loader
// JAVASCRIPT FILES
$js_path = 'public/app/Static/js';
$js = '';
$handle = '';
$file = '';
if ($handle = opendir($js_path)) {
    while (false !== ($file = readdir($handle))) {
        if (is_file($js_path.'/'.$file)) {
            $js .= '<script src="'.$js_path.'/'.$file .'" type="text/javascript"></script>'."\n";
        }
    }
    closedir($handle);
    echo $js;
}
 
// CSS FILES
$css_path = 'public/Static/css';
$css = '';
$handle = '';
$file = '';
if ($handle = opendir($css_path)) {
    while (false !== ($file = readdir($handle))) {
        if (is_file($css_path.'/'.$file)) {
            $css .= '<link rel="stylesheet" href="'.$css_path.'/'.$file.'" type="text/css" media="all" />'."\n";
        }
    }
    closedir($handle);
    echo $css;
}

?>