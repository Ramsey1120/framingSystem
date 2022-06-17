<?php
    require_once "functions.php"; 
    $conn = db_connect();
    $id = $_GET["id"];

    $art_img = mysqli_query($conn,"SELECT art_thumbnail FROM Art WHERE art_ID = '$id'") or die(mysqli_error($conn));

    if (mysqli_num_rows($art_img) > 0 ) {

        while ($row = mysqli_fetch_array($art_img)) {
            $row_art =  $row["art_thumbnail"];
        }

    }
    
    header("content-type: image/jpeg"); 
    echo $row_art;

?>