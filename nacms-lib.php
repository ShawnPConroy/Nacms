<?php


$legalExtensions = ['md', 'markdown', 'txt', 'text'];
$skipFolder = ['cgi-bin'];
$skipFiles = ['400.shtml', '400.shtml', '401.shtml', '403.shtml', '404.shtml', '419.shtml', '500.shtml', '500.shtml', 'cp_errordocument.shtml'];
/*
  Checks if path is in the web servers document root
  Requires realpath($_SERVER['PATH_TRANSLATED']);
*/
function pathInRoot($filepath)
{
    
    //
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {  # Windows OS
        $documentRoot = str_replace('/', '\\', $_SERVER['DOCUMENT_ROOT']);
    } else {  #Unix OS
        $documentRoot = $_SERVER['DOCUMENT_ROOT'];
    }
    
    return substr($filepath, 0, strlen($_SERVER['DOCUMENT_ROOT'])) == $documentRoot;
}
