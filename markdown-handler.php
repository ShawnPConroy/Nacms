<?php

$scriptDir = dirname(__FILE__);
require_once($scriptDir.'/nacms-lib.php');
require_once($scriptDir.'/parsedown/Parsedown.php');
$pd = new Parsedown();

/* Confirm request is legal: in a public folder and a markdown file */
$filePath = realpath($_SERVER['PATH_TRANSLATED']);
$fileInfo = pathinfo($filePath);
$legalExtension = in_array(strtolower($fileInfo['extension']), $legalExtensions);
$legalFolder = pathInRoot($fileInfo['dirname']);

/* Generate content */
if ($filePath && $legalExtension && $legalFolder) {
    $content = $pd->text(file_get_contents($filePath));
} else {
    $content =  "<p>Bad filename given</p>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $fileInfo['filename']; ?></title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo str_replace(basename(__FILE__), 'markdown-default.css', $_SERVER['SCRIPT_NAME']); ?>">
</head>
<body>
<?php echo $content;?>
</body>
</html>
