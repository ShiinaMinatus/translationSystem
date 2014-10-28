<?php

$path = dirname($_SERVER['SCRIPT_FILENAME']) . "/api/Logs/SQL";
$oDir = new DirectoryIterator($path);
foreach ($oDir as $file) {
    if ($file->isfile()) {
        $tmpFile['link'] = $file->getPath();
        $tmpFile['name'] = $file->getFileName();
        $tmpFile['type'] = 'file';
        // $tmpFile['size'] = _cal_size($file->getSize());
        $tmpFile['mtime'] = $file->getMTime();
        $arrFile[] = $tmpFile;
    }
}
$fileStringAll = "";
foreach ($arrFile as $array) {
    $fileName = $array["link"] . "/" . $array['name'];

    $fileName = urldecode($fileName);
    $fileString = file_get_contents($fileName);
    $fileString = str_replace("\r\n", "<br>", $fileString);
    $fileStringAll.=$fileString;
}
echo $fileString;
//print_r($arrFile);
?>