<?php 
require_once "header.php"; 
require_once "functions.php";

$id = $_GET["id"];
$name = $_GET["name"];


$conn = db_connect();

?>


<div class="container magnified_art_container flex">  
        
    <?php fetch_art($conn,$id,$name); ?>

    <form action="order.php?id=<?php echo $id ?>&name=<?php echo $name ?>" class="form container order" method="post">

        <?php echo "<p class='grey-text'><span class='accent-text ff-crimsom'>ID:</span> " . $id . "<br>" ?>
        <?php echo "<p class='fz-medium ff-crimsom accent-text     uppercase center'>" . $name . "</p>" ?>

        <hr style='margin; 0;'>

        <legend class="legend order_title ff-crimsom accent-text fz-large center">Order</legend>

        <div class="flex" style="--gap:.5em;">
            <div>
                <div class="err-msg fz-small ff-serrat center"></div>
                <input class="form-input ff-serrat white-text fz-small" type="text" name="fname" class="form-input" placeholder="Firstname"><br>
            </div>

            <div>
                <div class="err-msg fz-small ff-serrat center"></div>
                <input class="form-input ff-serrat grey-text fz-small" type="text" name="sname" class="form-input" placeholder="Surname"><br>
            </div>
        </div>

        <div class="err-msg fz-small ff-serrat center"></div>
        <input class="form-input ff-serrat white-text fz-small" type="text" name="phone_no" class="form-input" placeholder="Phone number"><br>
        
        <div class="err-msg fz-small ff-serrat center"></div>
        <input class="form-input ff-serrat white-text fz-small" type="text" name="email" class="form-input" placeholder="E-mail"><br>
        
        <div class="err-msg fz-small ff-serrat center"></div>
        <input class="form-input ff-serrat white-text fz-small" type="text" name="street_name" class="form-input" placeholder="Street name"><br>

        <div class="flex" style="--gap:.5em;">
            <div>
                <div class="err-msg fz-small ff-serrat center"></div>
                <input class="form-input ff-serrat white-text fz-small" type="text" name="city" class="form-input" placeholder="City">
            </div>

            <div>
                <div class="err-msg fz-small ff-serrat center"></div>
                <input class="form-input ff-serrat white-text fz-small" type="text" name="postcode" class="form-input" placeholder="Postcode (no spaces)">
            </div>
        </div>

        <input class="button submit ff-crimsom fz-small white-text" type="submit" value="Submit Order">
    </form>

    <?php echo "<img src='image.php?id=$id alt=''>";?>
</div>


<script src="JS/singleart.js">
</script>