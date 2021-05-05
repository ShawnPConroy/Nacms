<?php
/* https://github.com/ShawnPConroy/Nacms */

// Uncomment theme you want to apply over the deault partially elegant theme

// $theme = 'folder-theme-partially-light.css';
// $theme = 'folder-theme-partially-dark.css';

/* Basic colour gradients */
// $theme = 'folder-theme-partially-red.css';
// $theme = 'folder-theme-partially-orange.css';
// $theme = 'folder-theme-partially-yellow.css';
// $theme = 'folder-theme-partially-green.css';
// $theme = 'folder-theme-partially-blue.css';
// $theme = 'folder-theme-partially-purple.css';

/* Wacky themes */
// $theme = 'folder-theme-partially-rainbow.css';
// $theme = 'folder-theme-partially-cyberpunk.css';

/* Ugly Themes */
// $theme = 'folder-theme-tones-of-red.css';
// $theme = 'folder-theme-tones-of-green.css';
// $theme = 'folder-theme-tones-of-blue.css';
// $theme = 'folder-theme-tones-of-orange.css';
// $theme = 'folder-theme-tones-of-purple.css';

$scriptDir = dirname(__FILE__);
require_once($scriptDir.'/nacms-lib.php');

$scriptUri = dirname($_SERVER['SCRIPT_NAME']);
$folderPath = realpath(urldecode($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']));
$folderName = basename($folderPath);
$legalFolder = pathInRoot($folderPath);

if ($folderPath && $legalFolder) {
    $dir = opendir($folderPath);
    
    $folders = [];
    $files = [];
    while (($currentFile = readdir($dir)) !== false) {
        if ($currentFile[0] != '.') {
            if (is_dir($folderPath.'/'.$currentFile)) {
                $folders[] = $currentFile;
            } else {
                $files[] = $currentFile;
            }
        }
    }
    sort($files);
    sort($folders);
}
?>

<!doctype html>
<html lang=en>
<head>
<meta charset=utf-8>
<title><?php echo $folderName; ?></title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@500&display=swap" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="<?php echo $scriptUri.'/folder-default.css'; ?>">
<?php if (isset($theme)) { ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $scriptUri.'/'.$theme; ?>">
<?php } ?>
</head>
<body>
<h1><?php echo $folderName; ?></h1>
<ul>
    <li class="up"><a href="..">Go up one level</a></li>
<?php
function showItem($uri, $text, $class)
{
    echo "    <li class=\"$class\"><a href=\"{$uri}\">{$text}</a></li>\n";
}
foreach ($folders as $folder) {
    showItem($folder.'/', $folder, 'folder');
}
foreach ($files as $file) {
    showItem($file, $file, 'file');
}
?>
</ul>
</body>
</html>
