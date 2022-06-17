<?php 
require_once "header.php"; 
require_once "functions.php";

$conn = db_connect();
?>


<div class='flex all_orders ff-serrat'>
    <button class='button backbutton fz-small' onclick='history.go(-1);'>&#8592;</button>
    <h1 class="ff-crimson accent-text fz-large center">All painting orders</h1>

    <div class="flex db_heads accent-text center ff-crimson fz-medium">
        <span>Name</span>
        <span>Phone Number</span>
        <span>E-mail</span>
        <span>Address</span>
        <span>Art ID</span>
        <span>Art Name</span>
    </div>
    
    <?php fetch_all_orders($conn); ?>
</div>