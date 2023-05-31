<?php

if (isset($_POST)) {
    $provider = $_POST['provider'];
    $filename = $_POST['filename'];
    $content = file_get_contents('https://f004.backblazeb2.com/file/LDV2-Corrections/' . $provider . '/org/' . $filename);
    $fileName = "downloaded_files/correct_test.txt";
    $file = fopen("downloaded_files/correct_test.txt", "w");
    fwrite($file, $content);
    fclose($file);
    echo "file downloded";
}
?>
