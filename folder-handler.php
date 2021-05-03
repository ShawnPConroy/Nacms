<?php

$scriptDir = dirname(__FILE__);
require_once($scriptDir.'/nacms-lib.php');

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
<link rel="stylesheet" type="text/css" href="<?php echo str_replace(basename(__FILE__), 'folder.css', $_SERVER['SCRIPT_NAME']); ?>">
</head>
<body>

<h1><?php echo $folderName; ?></h1>
<ul>
    <li><a href="..">↑ Go up one level</a></li>
<?php
function showItem($uri, $text)
{
    echo "    <li><a href=\"{$uri}\">{$text}</a></li>\n";
}
foreach ($folders as $folder) {
    showItem($folder.'/', $folder.' →');
}
foreach ($files as $file) {
    showItem($file, $file);
}
?>
</ul>
</body>
</html>
