<?php

    session_start();

    // text style
    $text = $_SESSION['id'] . '/' . $_POST['title'] . '/' . $_POST['type'] . '/' . $_POST['description'] . PHP_EOL;
    
    // openning an archive to write the text
    $archive = fopen('callarchive.txt', 'a');

    // writing and then closing the selected archive
    fwrite($archive, $text);
    fclose($archive);

    // return to open_call.php
    header('Location: open_call.php?submit=success');

?>