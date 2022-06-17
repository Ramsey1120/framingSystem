<?php 
require_once "header.php"; 
require_once "functions.php";

$num_per_page=12;

if(isset($_GET["page"])) {
        $page=$_GET["page"];
	} else {    
		$page=1;
	}

	$start_from=($page-1)*12;
    $conn = db_connect();

?>

<div class="art container flex">
    <?php fetch_all_art($conn,$start_from,$num_per_page); ?>
</div>

  
<?php 
    $conn = db_connect();

    $all_art_cont = mysqli_query($conn,"SELECT * FROM Art") or die(mysqli_error($conn));
    $total_records=mysqli_num_rows($all_art_cont);
    $total_pages=ceil($total_records/$num_per_page);
    
    echo "<div class='flex pagination'>";
    
    if ($page != 1) {
        echo "<a class='ff-serrat black-text' href='listart.php?page=" . $page - 1 ."'>&lt</a>";
    } else {
        echo "<a class='ff-serrat black-text' href='listart.php?page=" . $page ."'>&lt</a>";
    }


    for($i=0;$i<$total_pages;$i++) {

        if ($page == $i+1) {
            echo "<a class='ff-serrat black-text bold pagination-active' href='listart.php?page=". $i + 1 . "'>" . $i + 1 ."</a>" ;
        } else {
            echo "<a class='ff-serrat black-text' href='listart.php?page=". $i + 1 ."'>". $i + 1 ."</a>" ;
        }
    }

    if ($page != $total_pages) {
        echo "<a class='ff-serrat black-text' href='listart.php?page=" . $page + 1 ."'>&gt</a>";
    } else {
        echo "<a class='ff-serrat black-text' href='listart.php?page=" . $page ."'>&gt</a>";
    }

    echo "</div>";

    mysqli_close($conn);
?>