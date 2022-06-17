<?php 
require_once "header.php"; 
require_once "functions.php";

$conn = db_connect();
?>

<div class='flex all_orders ff-serrat'>
<button class='button backbutton fz-small' onclick='history.go(-1);'>&#8592;</button>
    <h1 class="ff-crimson accent-text fz-large center">All booking details</h1>

    <div class="flex db_heads accent-text center ff-crimson fz-medium">
        <span>Name</span>
        <span>Phone Number</span>
        <span>Date</span>
        <span>Time Slot</span>
    </div>
    <?php fetch_all_booking($conn); ?>
</div>