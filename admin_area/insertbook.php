<?php
/**
 * Created by PhpStorm.
 * User: anirban
 * Date: 4/18/2017
 * Time: 7:31 PM
 */

include("../books/includes/bookDatabase.php");

function add_category()
{
    global $bookconn;
    $sql = "INSERT INTO `bookstore`.`category` (`cat_title`) VALUES ('".$_GET["add_Cat"]."')";
    //echo "<option>$sql</option>";
    // Check connection
    if (!$bookconn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //$result = mysqli_query($bookconn, $sql);
    if (mysqli_query($bookconn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error";
    }
}
add_category();
?>
