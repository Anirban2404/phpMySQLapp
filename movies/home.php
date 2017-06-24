<!DOCTYPE html>
<html lang="en">
<head>
    <title>Movie DataBase</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script>
        function showFilm(str) {
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
            <li><a href="../books/home.php">Books</a></li>
            <li class="active"><a href="./home.php">Movies</a></li>
        </ul>
    </div>
</nav>

<?php
include("./includes/movieDatabase.php");
include("./functions/functions.php");
include("./functions/getmovie.php");
function get_result(){
    if (isset($_GET['genre'])){
        $result = $_GET['genre'];
        //echo $q;
        get_films($result);
    }
    if (isset($_GET['country'])){
        $result = $_GET['country'];
        //echo $q;
        get_country($result);
    }
    if (isset($_GET['director'])){
        $result = $_GET['director'];
        //echo $q;
        get_director($result);
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
        <h1 style="color: lightcyan">My Movies</h1>
    </div>
</div>
<div class="container">
    <ul class="nav nav-pills">
        <li class="active"><a href="home.php">Movie Collection</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">By Genres
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php
                    getgenres();
                    ?>
                </ul>
        </li>


        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">By Directors
                <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <?php
                getDirectors();
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

        <li><a href="../admin_area/insert_movies.php">Add Movie</a></li>
    </ul>
    <br>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">Search</span>
            <input type="text" name="searchText" class="form-control" id="searchText"
                   placeholder="Enter Movie Name" onkeyup="showFilm(this.value)">

        </div>
        <p> <span id="data"></span></p>
        <br>

    </div>

    <div class="panel-group">
        <div class="panel panel-info">
            <div class="panel-heading"><b>Movies</b></div>
            <div class="panel-body"><b>Movies will be listed here...</b></div>
            <div id="result"><?php get_result()?></div>
        </div>

    </div>
</div>



</body>
</html>


