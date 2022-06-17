
<?php  

require_once "functions.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") { 

    $conn = db_connect();

    $name = sanitise($_POST["name"]);
    $thumbnail_data = mysqli_real_escape_string($conn,file_get_contents($_FILES["thumbnail"]["tmp_name"]));

    $date = date("Y-m-d H:i:s");

    $width = sanitise($_POST["width"]);
    $height = sanitise($_POST["height"]);
    $desc = sanitise($_POST["desc"]);
    $price = sanitise($_POST["price"]);

    echo 

    add_art($conn,$name,$thumbnail_data,$date,$width,$height,$price,$desc);

    header("Location: admin.php");
}
?>