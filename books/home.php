<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book DataBase</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script>
        function showBook(str) {
            if (str.length == 0) {
                document.getElementById("data").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("data").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "functions/fetch.php?search=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">My Website</a>
        </div>
        <ul class="nav navbar-nav">
            <li ><a href="../index.php">Home</a></li>
            <li class="active"><a href="./home.php">Books</a></li>
            <li ><a href="../movies/home.php">Movies</a></li>
        </ul>
    </div>
</nav>

<?php
include("./includes/bookDatabase.php");
include("./functions/functions.php");
include("./functions/getbook.php");
function get_result(){
    if (isset($_GET['cats'])){
        $result = $_GET['cats'];
        //echo $q;
        get_films($result);
    }
    if (isset($_GET['country'])){
        $result = $_GET['country'];
        //echo $q;
        get_country($result);
    }
    if (isset($_GET['author'])){
        $result = $_GET['author'];
        //echo $q;
        get_author($result);
    }
    if (isset($_GET['year'])){
        $result = $_GET['year'];
        //echo $q;
        get_year($result);
    }
}
?>

<div class="container">
    <div class="jumbotron" style="background-image: url('./images/background_image.jpg')">
        <h1 style="color: lightcyan">My Books</h1>
    </div>
</div>
<div class="container">
    <ul class="nav nav-pills">
        <li class="active"><a href="home.php">Book Collection</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">By Categories
                <span class="caret"></span></a>
                <ul class="dropdown-menu" name="users" onchange="showUser(this.value)">
                    <?php
                    getcategories();
                    ?>
                </ul>
        </li>


        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">By Authors
                <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <?php
                getAuthors();
                ?>
            </ul>
        </li>

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">By Years
                <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <?php
                getYears();
                ?>
            </ul>
        </li>

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">By Countries
                <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <?php
                getCountries();
                ?>
            </ul>
        </li>

        <li><a href="../admin_area/insert_books.php">Add Book</a></li>
    </ul>
    <br>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">Search</span>
            <input type="text" name="searchText" class="form-control" id="searchText"
                   placeholder="Enter Book Name" onkeyup="showBook(this.value)">

        </div>
        <p> <span id="data"></span></p>
        <br>

    </div>

    <div class="panel-group">
        <div class="panel panel-info">
            <div class="panel-heading"><b>Books</b></div>
            <div class="panel-body"><b>Books will be listed here...</b></div>
            <div id="result"><?php get_result()?></div>
        </div>

    </div>
</div>



</body>
</html>


