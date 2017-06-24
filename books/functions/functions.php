<?php
/**
 * Created by PhpStorm.
 * User: anirban
 * Date: 4/18/2017
 * Time: 4:58 PM
 */
function getbooks(){
    global $bookconn;
    $get_films = "SELECT _title, author_name, country, release_year FROM bookstore.books ORDER BY _title;";
    $run_films = mysqli_query($bookconn, $get_films);
    while ($row_films = mysqli_fetch_assoc($run_films)){
        $film_name = $row_films['_title'];
        echo "<option>$film_name</option>";
    }
}

function getcategories(){
    global $bookconn;
    $get_cats = "SELECT cat_title FROM bookstore.category ORDER BY cat_title";
    $run_cats = mysqli_query($bookconn, $get_cats);
    while ($row_cats = mysqli_fetch_assoc($run_cats)) {
        $cats_name = $row_cats['cat_title'];
        echo "<li ><a href=\"home.php?cats=$cats_name\">$cats_name</a></li>";
    }
}

function optcategories(){
    global $bookconn;
    $get_cats = "SELECT cat_title FROM bookstore.category ORDER BY cat_title";
    $run_cats = mysqli_query($bookconn, $get_cats);
    while ($row_cats = mysqli_fetch_assoc($run_cats)) {
        $cats_name = $row_cats['cat_title'];
        echo "<option>$cats_name</option>";
    }
}

function getCountries(){
     global $bookconn;
    $get_countries = "SELECT DISTINCT(country) FROM  bookstore.books order by country";
    $run_countries = mysqli_query($bookconn, $get_countries);
    while ($row_countries = mysqli_fetch_assoc($run_countries)) {
        $countries_name = $row_countries['country'];
        echo "<li ><a href=\"home.php?country=$countries_name\">$countries_name</a></li>";
    }
 }

function optCountries(){
    global $bookconn;
    $get_countries = "SELECT DISTINCT(country) FROM  bookstore.books order by country";
    $run_countries = mysqli_query($bookconn, $get_countries);
    while ($row_countries = mysqli_fetch_assoc($run_countries)) {
        $countries_name = $row_countries['country'];
        echo "<option>$countries_name</option>";
    }
}

function getAuthors(){
    global $bookconn;
    $get_authors = "SELECT DISTINCT(author_name) FROM  bookstore.books order by author_name";
    $run_authors = mysqli_query($bookconn, $get_authors);
    while ($row_authors = mysqli_fetch_assoc($run_authors)) {
        $authors_name = $row_authors['author_name'];
        echo "<li ><a href=\"home.php?author=$authors_name\">$authors_name</a></li>";
    }
}

function optAuthors(){
    global $bookconn;
    $get_authors = "SELECT DISTINCT(author_name) FROM  bookstore.books order by author_name";
    $run_authors = mysqli_query($bookconn, $get_authors);
    while ($row_authors = mysqli_fetch_assoc($run_authors)) {
        $authors_name = $row_authors['author_name'];
        echo "<option>$authors_name</option>";
    }
}

function getYears(){
    global $bookconn;
    $get_year = "SELECT DISTINCT(release_year) FROM bookstore.books order by release_year";
    $run_year = mysqli_query($bookconn, $get_year);
    while ($row_year = mysqli_fetch_assoc($run_year)) {
        $year = $row_year['release_year'];
        echo "<li ><a href=\"home.php?year=$year\">$year</a></li>";
    }
}
?>