<?php 
require_once "header.php"; 
require_once "functions.php";

$conn = db_connect();

if ($_SERVER["REQUEST_METHOD"] === "POST") {  ?> 

    <section class="info ff-serrat fz-medium">

        <h1 class="center accent-text">Welcome Cara!</h1>
        <p>Here is the latest data according to user analytics.</p>

        <hr>

        <p>Number of pieces currently uploaded: <span class="accent-text fz-medium bold"><?php count_all_art($conn); ?></span></p>
        <p>Total number of pieces ordered: <span class="accent-text fz-medium bold"><?php count_all_orders($conn); ?></span></p>
        <p>Face-to-face bookings for the next weeks: <span class="accent-text fz-medium bold"><?php count_all_booking($conn); ?></span></p>

        <hr>

        <a class="button submit white-text ff-serrat center bold" href="admin_orders.php">View all orders</a>
        <a class="button submit white-text ff-serrat center bold" href="admin_bookings.php">View all bookings</a>
    </section>

    <form action="newpainting.php" class="form container addpainting" id="newpainting" method="post" enctype="multipart/form-data">
        
    <legend class="legend ff-crimson white-text fz-large center">Add Painting</legend>

        <div class="err-msg fz-small ff-serrat center"></div>
        <input class="form-input ff-serrat" type="text" name="name" placeholder="Art name"><br>

        <div class="err-msg fz-small ff-serrat center"></div>
        <input class="ff-serrat" type="file" name="thumbnail"><br>

        <div class="flex" style="--gap:0.25em;">
            <div>
                <div class="err-msg fz-small ff-serrat center"></div>
                <input class="form-input ff-serrat" type="number" name="width" placeholder="Width (in mm)">
            </div>

            <div>
                <div class="err-msg fz-small ff-serrat center"></div>
                <input class="form-input ff-serrat" type="number" name="height" placeholder="Height (in mm)">
            </div>

            <div>      
                 <div class="err-msg fz-small ff-serrat center"></div>
            <input class="form-input ff-serrat" type="number" name="price" step=".01" placeholder="Price (£)"><br>
            </div>
        </div>
    

        <div class="err-msg fz-small ff-serrat center"></div>
        <textarea class="form-input ff-serrat" name="desc" cols="50" rows="9" style="resize:none; "></textarea><br>

        <input class="button submit ff-crimson fz-small white-text" type="submit" value="Access" name="addorder">
    </form> 

    <script src="JS/admin.js"></script>

<?php } else { ?>

    <div class="legend_container">
        <legend class="legend ff-crimson">Admin Panel</legend>
        <hr>
        <p class="legend_desc fz-small ff-crimson grey-text">Admin Panel</p>
    </div>

    <form class="form container ff-serrat"  id="admin_panel" action="#" method="post">
    <div class="err-msg fz-small ff-serrat center"></div>
        <input type="password" name="password" id="password" class="form-input ff-gothic grey-text fz-small" placeholder="password"><br> 
        <input class="button submit ff-crimson fz-small white-text" type="submit" value="Access" name="access">
    </form>

    <script src="JS/admin.js"></script>

<?php } ?>