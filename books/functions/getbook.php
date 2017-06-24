<?php
//include("../includes/database.php");

function get_films($data)
{
    global $bookconn;
    $output = '';
    $sql = "SELECT _title, author_name, country, release_year FROM bookstore.books 
              WHERE _id IN (SELECT _book_id FROM bookstore.book_category_relationship 
                WHERE _cat_id = (SELECT cat_id FROM bookstore.category WHERE cat_title ='" . $data . "'))";
    //echo $sql;


    $result = mysqli_query($bookconn, $sql);
// Check connection
    if (!$bookconn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (mysqli_num_rows($result) > 0) {
        $output .= '<h4 align="center">'.$data.' Book List </h4>';
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

function get_country($data)
{
    global $bookconn;
    $output = '';
    $sql = "SELECT _title, author_name, country, release_year FROM bookstore.books WHERE country = '" . $data . "'";
    //echo $sql;


    $result = mysqli_query($bookconn, $sql);
// Check connection
    if (!$bookconn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (mysqli_num_rows($result) > 0) {
        $output .= '<h4 align="center"> Book List </h4>';
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

function get_author($data)
{
    global $bookconn;
    $output = '';
    $sql = "SELECT _title, author_name, country, release_year FROM bookstore.books WHERE author_name = '" . $data . "'";
    //echo $sql;


    $result = mysqli_query($bookconn, $sql);
// Check connection
    if (!$bookconn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (mysqli_num_rows($result) > 0) {
        $output .= '<h4 align="center"> Book List </h4>';
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

function get_year($data)
{
    global $bookconn;
    $output = '';
    $sql = $sql = "SELECT _title, author_name, country, release_year FROM bookstore.books WHERE release_year = '" . $data . "'";
    //echo $sql;


    $result = mysqli_query($bookconn, $sql);
// Check connection
    if (!$bookconn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (mysqli_num_rows($result) > 0) {
        $output .= '<h4 align="center"> Book List </h4>';
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
?>
