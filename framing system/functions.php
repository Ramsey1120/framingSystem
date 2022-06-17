<?php 
// This file contains all the custom function used in this assignment

// The following function is responsible for establishing a connection to the database
function db_connect() {
    $servername = "devweb2021.cis.strath.ac.uk";
    $dbusernmae = "rtb20133";
    $dbpassword = "Ei3ha5ohdees";
    $dbname = "rtb20133";

    $conn = mysqli_connect($servername,$dbusernmae,$dbpassword,$dbname);

    if (!$conn) {die(mysqli_connect_error($conn));}
    return $conn;
}



// The following function will sanitise the input given in (this is to prevent injection attacks)
function sanitise($input) {
    trim($input);
    strip_tags($input);
    stripslashes($input);
    htmlspecialchars($input);

    $conn = db_connect();
    mysqli_real_escape_string($conn,$input);

    return $input;
}



function add_art($conn,$name,$thumbnail,$date,$width,$height,$price,$desc) {
    $new_order = mysqli_query($conn, "INSERT INTO Art (art_name,art_thumbnail,completion,`width (mm)`,`height (mm)`,`price (£)`,`description`) 
    VALUES ('$name','$thumbnail','$date','$width','$height','$price','$desc')") or die(mysqli_error($conn));
    mysqli_close($conn);
}


function fetch_all_art($conn,$start_from,$num_per_page) {
    
    $all_art = mysqli_query($conn,"SELECT * FROM Art LIMIT $start_from,$num_per_page") or die(mysqli_error($conn));

    if (mysqli_num_rows($all_art) > 0 ) {

        while ($row = mysqli_fetch_array($all_art)) {

            echo 
            "<div class='single_art'>
                <div class='ff-crimson accent-text fz-large center'>" . $row["art_name"] . "</div>" . 
                "<img class='single_art_img' src='image.php?id=" . $row["art_ID"] . "'>" 
                . "<div class='flex single_art_price'>
                    <span class='grey-text ff-serrat bold center'>" . $row["price (£)"] . "£</span><br>
                    <a class='single_art_more white-text grey-bg ff-serrat center uppercase bold' href='singleart.php?id=" 
                    . $row["art_ID"]  . "&name=" . $row["art_name"] . "'>View More...
                    </a>
                </div>
            </div>";
        }

    }
    
    mysqli_close($conn);
} 



function fetch_art($conn,$id,$name) {
    $all_art = mysqli_query($conn,"SELECT * FROM Art WHERE art_iD='$id' AND art_name='$name'") or die(mysqli_error($conn));
    
    if (mysqli_num_rows($all_art) > 0 ) {

        $row = mysqli_fetch_array($all_art);

        echo  "<div class='magnified_art fz-medium ff-serrat grey-text flex'>";

        if (isset($_GET["confirm"])) { 
            echo "<div class='confirmation fz-small center'>You have successfully ordered '" . $name . "' piece</div>"; 
        }

        echo
            "<button class='button backbutton fz-small' onclick='history.go(-1);'>&#8592;</button>" . 

            "<h1 class='fz-large ff-crimson accent-text uppercase center'>" . $row["art_name"] . "</h1>" . 
            "<p class='grey-text'><span class='accent-text ff-crimson'>ID:</span> " . $row["art_ID"] . "<br><em>" . $row["description"] . ".</em></p>" .
            
            "<hr>" . 

            "<p><span class='accent-text ff-crimson'>Width (mm): </span> " . $row["width (mm)"] . "</p>" . 
            "<p><span class='accent-text ff-crimson'>Height (mm): </span> " . $row["height (mm)"] . "</p>" . 
            "<p><span class='accent-text ff-crimson'>Price: </span>" . $row["price (£)"] . "£</p>" .    
            "<button  style='margin-top:auto;' class='button submit order_button white-text ff-crimson center'>Order</button>" .
        "</div>";
    }

    mysqli_close($conn);
} 

function add_order($conn,$name,$surname,$phone,$email,$postal,$art_id,$art_name) {

    $new_order = mysqli_query($conn, "INSERT INTO Art_orders (firstname,surname,phone_no,email,order_address,art_id,art_name) 
    VALUES ('$name','$surname','$phone','$email','$postal','$art_id','$art_name')") or die(mysqli_error($conn));
    mysqli_close($conn);
}


function fetch_all_orders($conn) {

    $all_orders = mysqli_query($conn,"SELECT * FROM Art_orders") or die(mysqli_error($conn));

    if (mysqli_num_rows($all_orders) > 0 ) {

        while ($row = mysqli_fetch_array($all_orders)) {
            echo 
            "<div class='db_details'>" .
                "<p>". $row["firstname"] . " " . $row["surname"] . "</p>"
                . "<p>".$row["phone_no"]  . "</p>". 
                "<p>". $row["email"] . "</p>". 
                "<p>". $row["order_address"] . "</p>".
                "<p>" . $row["art_id"] . "</p>". 
                "<p>". $row["art_name"] . "</p>" . 
            "</div>";
        }   
    }

    mysqli_close($conn);
}

function add_booking($conn,$fname,$sname,$phoneno,$date,$time) {
    $insert_booking = mysqli_query($conn,"INSERT INTO TrackNTrace (firstname,surname,phone_no,booking_date,booking_time) 
    VALUES ('$fname','$sname','$phoneno','$date','$time') ") or die(mysqli_error($conn));
    mysqli_close($conn);
}


function fetch_all_booking($conn) {
    $fetch_bookings = mysqli_query($conn,"SELECT * FROM TrackNTrace") or die(mysqli_error($conn));

    if (mysqli_num_rows($fetch_bookings) > 0 ) {

        while ($row = mysqli_fetch_array($fetch_bookings)) {
            echo 
            "<div class='flex db_details booking_details'>" 
                ."<p>". $row["firstname"] . " " . $row["surname"] ."</p>"
                ."<p>". $row["phone_no"] ."</p>"
                ."<p>". $row["booking_date"] ."</p>"
                ."<p>". $row["booking_time"] ."</p>"      
            ."</div>";
        }   
    }
   
    mysqli_close($conn);
}


function count_all_booking($conn) {
    $fetch_bookings = mysqli_query($conn,"SELECT COUNT(*) AS bookings FROM TrackNTrace") or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($fetch_bookings)) {echo $row["bookings"];}   
}


function count_all_orders($conn) {
    $fetch_bookings = mysqli_query($conn,"SELECT COUNT(*) AS orders FROM Art_orders") or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($fetch_bookings)) {echo $row["orders"];}   
}


function count_all_art($conn) {
    $fetch_bookings = mysqli_query($conn,"SELECT COUNT(*) AS art FROM Art") or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($fetch_bookings)) {echo $row["art"];}   
}



?>