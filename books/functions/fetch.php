<?php
/**
 * Created by PhpStorm.
 * User: anirban
 * Date: 4/18/2017
 * Time: 7:31 PM
 */

include("../includes/bookDatabase.php");

function get_book()
{
    global $bookconn;
    $output = '';
    $sql = "SELECT _title, author_name, country, release_year FROM bookstore.books WHERE _title LIKE '%".$_GET["search"]."%'";
    //echo $sql;
    $result = mysqli_query($bookconn, $sql);
// Check connection
    if (!$bookconn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (mysqli_num_rows($result) > 0) {
        $output .= '<h4 align="center"> Search Result </h4>';
        $output .= '<div class="table-responsive">
                    <table class = "table table bordered">
                        <tr>
                         <th> Name </th>
                         <th> Author</th>
                         <th> Release Year </th>
                         <th> Country</th>
                        </tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            $output .= '
            <tr>
                <td>' . $row["_title"] . '</td>
                <td>' . $row["author_name"] . '</td>
                <td>' . $row["release_year"] . '</td>
                <td>' . $row["country"] . '</td>
            </tr>
         ';
        }
        echo $output;

    } else {
        echo "Data NOT Found";
    }

}

get_book();
?>

<!--$sql = "SELECT `_title`,release_year FROM moviedb.films  WHERE _title LIKE '%A%'";-->

<!--$sql = "SELECT `_title`,release_year FROM moviedb.films  WHERE _title LIKE '%" . $_POST["search"] . "%' ";-->