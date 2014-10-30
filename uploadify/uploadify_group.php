<?php

/*
  Uploadify
  Copyright (c) 2012 Reactive Apps, Ronnie Garcia
  Released under the MIT License <http://www.opensource.org/licenses/mit-license.php>
 */


if (!empty($_REQUEST['session_id'])) {

    session_id($_REQUEST['session_id']);
}
// Define a destination
$targetFolder = '/translationSystem/uploads'; // Relative to the root
//$targetFolder = '/weixin_crm/uploads'; // Relative to the root

$url = 'http://192.168.0.112/translationSystem/uploads/';
//$url = 'http://localhost/weixin_crm/uploads/';


$arrayp['objectid'] = $_REQUEST['objectid'];


if (!empty($_FILES)) {
    $tempFile = $_FILES['Filedata']['tmp_name'];
    $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
    $fileName = $_FILES['Filedata']['name'];
    $fileNameInfo = pathinfo($fileName);
    $fileNameExtension = $fileNameInfo['extension'];
    $fileNewName = time() . "." . $fileNameExtension;
    $targetFile = rtrim($targetPath, '/') . '/' . $fileNewName;

    // Validate the file type
    $fileTypes = array('jpg', 'jpeg', 'png'); // File extensions

    $fileParts = pathinfo($_FILES['Filedata']['name']);

    $fileSizeLimte = 5 * 1024 * 1024;

  

    if ($_FILES['Filedata']['size'] > $fileSizeLimte) {
        echo 'code1'; //文件大小溢出
    } else
    if (in_array($fileParts['extension'], $fileTypes)) {
        move_uploaded_file($tempFile, $targetFile);
        @chmod($targetFile, 0755);

        $arrayp['path'] = $url . $fileNewName;
        $arrayp['fileName'] = $fileNewName;


        header('Content-type: application/json');


        echo json_encode($arrayp);
    } else {
        echo 'code2';
    }
}
?>