<?php


$legalExtensions = ['md', 'markdown', 'txt', 'text'];
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
