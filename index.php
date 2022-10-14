<?php

use app\classes\CurlLoader;
use app\classes\PregMathParser;

require __DIR__ . '/vendor/autoload.php';
include '_saveFileList.php';
include '_form.php';
$tagCountList = '';
if (!empty($_GET['openFilename'])){
    $tagCountList = file_get_contents("parsedFiles/{$_GET['openFilename']}");
} elseif (!empty($_POST['parseUrl'])) {
    $loader = new CurlLoader($_POST['parseUrl']);
    $data = $loader->download();
    $parser = new PregMathParser($data,true);
    $tagCountList = $parser->run();
}
if (!empty($tagCountList)){
    echo $tagCountList;
}