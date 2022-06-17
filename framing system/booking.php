<?php 
require_once "header.php"; 


if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    require_once "functions.php"; 
    
    $conn = db_connect();

    $fname = sanitise($_POST["fname"]);
    $sname = sanitise($_POST["sname"]);
    $phone_no = sanitise($_POST["phone_no"]);
    $date = sanitise($_POST["date"]);
    $time = sanitise($_POST["time"]);

    add_booking($conn,$fname,$sname,$phone_no,$date,$time);
?>


<?php }  else { ?>

    <div class="legend_container">
        <legend class="legend ff-crimson">Book a visit</legend>
        <hr>
        <p class="legend_desc fz-small ff-crimson grey-text"> 
            Fill the form to book a visit. 
            Pick a suitable time for your appointment.<br>
            In line with the policies of the Scottish Government you must practice social distancing and wear a mask
         </p>
    </div>

    <form class="form container trackntrace" method="post">

        <div class="err-msg fz-small ff-serrat center"></div>
        <input type="text" name="fname" class="form-input ff-serrat white-text" placeholder="firstname"><br>
        
        <div class="err-msg fz-small ff-serrat center"></div>
        <input type="text" name="sname" class="form-input ff-serrat white-text" placeholder="surname"><br>
        
        <div class="err-msg fz-small ff-serrat center"></div>
        <input type="text" name="phone_no" class="form-input ff-serrat white-text" placeholder="phone number"><br>
        
        <div class="err-msg fz-small ff-serrat center"></div>
        <input type="date" name="date" class="form-input ff-serrat white-text" id="date" placeholder="date"><br>
        
        <div class="err-msg fz-small ff-serrat center"></div>
        <input type="time" name="time"  class="form-input ff-serrat white-text">

        <input class="button white-text white-bg submit ff-crimson fz-medium" type="submit" value="Book Visit">
    </form>

    <script src="JS/booking.js"></script>

<?php  }  ?>