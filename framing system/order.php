<?php 

$id = $_GET["id"];
$name = $_GET["name"];

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    
    require_once "functions.php";
    $conn = db_connect();

    $fname = sanitise($_POST["fname"]);
    $sname = sanitise($_POST["sname"]);
    $phone_no = sanitise($_POST["phone_no"]);
    $email = sanitise($_POST["email"]);
    $street_name = sanitise($_POST["street_name"]);
    $city = sanitise($_POST["city"]);
    $postcode = sanitise($_POST["postcode"]);
    
    $postcode = strtoupper($postcode);
    $address = $street_name . " " . $city . " " . $postcode;
    
    add_order($conn,$fname,$sname,$phone_no,$email,$address,$id,$name);

    $confirm = true;
    header("Location: singleart.php?id=$id&name=$name&confirm=$confirm");
}
?> 
