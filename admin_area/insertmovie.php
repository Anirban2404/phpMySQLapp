<?php
/**
 * Created by PhpStorm.
 * User: anirban
 * Date: 4/18/2017
 * Time: 7:31 PM
 */

include("../movies/includes/movieDatabase.php");

function add_genre()
{
    global $conn;
    $sql = "INSERT INTO moviedb.genre (`_title`) VALUES ('".$_GET["add_Genre"]."')";
    //echo "<option>$sql</option>";
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //$result = mysqli_query($bookconn, $sql);
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error";
    }
}
add_genre();
?>
