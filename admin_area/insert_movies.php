<!DOCTYPE html>
<html lang="en">
<head>
    <title>Insert Movie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script>
        function addCountry(str) {
            document.getElementById("countries").innerHTML = "<option>" + str + "</option>"
            //console.log(str);
        }
        function addDirector(str) {
            document.getElementById("directors").innerHTML = "<option>" + str + "</option>"
            //console.log(str);
        }

        function addGenre(str) {
            console.log(str);
            if (str.length == 0) {
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "insertmovie.php?add_Genre=" + str, true);
                xmlhttp.send();
                window.location.reload();
            }
        }
        function _reset() {
            window.location.href = "insert_movies.php";
        }
    </script>
</head>
<body>

<?php
include("../movies/includes/movieDatabase.php");
include("../movies/functions/functions.php");

?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">My Website</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../books/home.php">Books</a></li>
            <li><a href="../movies/home.php">Movies</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="jumbotron" style="background-image: url('../movies/images/background_image.jpg')">
        <h1 style="color: lightcyan">Insert Movies</h1>
    </div>

    <form action="insert_movies.php" method="get" enctype="multipart/form-data">
        <div class="form-group">
            <label>Movie Name</label>
            <input type="text" name="movieName" class="form-control" placeholder="Enter Movie Name" required>
        </div>

        <table class="table ">
            <tr>
                <div class="form-group">
                    <label>Genre</label>
                    <td style="width:50%">
                        <select class="form-control" multiple name="__genres[]" class="input-lg" style="width:50%"
                                required>
                            <?php
                            optgenres();
                            ?>
                        </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info btn-md" style="width:50%" data-toggle="collapse"
                                data-target="#genre">Add Genre
                        </button>
                        <div id="genre" class="collapse">
                            <input type="text" id="genreT" name="genreT" class="form-control" placeholder="Enter Genre">
                            <input type="button" name="addG" class="btn btn-info" value="Add"
                                   onclick="addGenre(document.getElementById('genreT').value)">
                        </div>
                    </td>
                </div>
            </tr>
        </table>

        <table class="table ">
            <tr>
                <div class="form-group">
                    <label>Director</label>

                    <td style="width:50%">
                        <select class="form-control" id="directors" name="directors" class="input-lg" style="width:50%" required>
                            <?php
                            optdirectors();
                            ?>
                        </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info btn-md" style="width:50%" data-toggle="collapse"
                                data-target="#director">Add Director
                        </button>
                        <div id="director" class="collapse">
                            <input type="text" id="directorT" name="directorT" class="form-control"
                                   placeholder="Enter Director Name">
                            <input type="button" name="addD" class="btn btn-info" value="Add"
                                   onclick="addDirector(document.getElementById('directorT').value)">
                        </div>
                    </td>
                </div>
            </tr>
        </table>

        <div class="form-group">
            <label>Release Year</label>
            <input type="number" name="releaseDate" class="form-control" placeholder="Enter Release Year" required/>
        </div>

        <table class="table ">
            <tr>
                <div class="form-group">
                    <label>Country</label>
                    <td style="width:50%">
                        <select class="form-control" id="countries" name="countries" class="input-lg" style="width:50%"
                                required>
                            <?php
                            optCountries();
                            ?>
                        </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info btn-md" style="width:50%" data-toggle="collapse"
                                data-target="#country">Add Country
                        </button>
                        <div id="country" class="collapse">
                            <input type="text" id="countryT" name="countryT" class="form-control"
                                   placeholder="Enter Country Name"
                                   data-target="#addCn">
                            <input type="button" name="addCn" class="btn btn-info" value="Add"
                                   onclick="addCountry(document.getElementById('countryT').value)">
                        </div>
                    </td>
            </tr>
</div>
</table>

<div>
    <button type="submit" name="submit" class="btn btn-success" style="width:30%">Submit</button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="reset" name="reset" class="btn btn-warning" style="width:30%" onclick="_reset()">Reset</button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="../movies/home.php" class="btn btn-danger" style="width:30%"/>Cancel</a>
</div>
<br/>
</form>
</div>

</body>
</html>

<?php
global $conn;
if (isset($_GET['genreT'])) {
    $catT = $_GET['genreT'];
    //echo $catT;
}
if (isset($_GET['directorT'])) {
    $directorT = $_GET['directorT'];
    //echo $authorT;
}
if (isset($_GET['countryT'])) {
    $countryT = $_GET['countryT'];
    //echo $countryT;
}

//getting values
if (isset($_GET['submit'])) {
    //echo "<h2>Your Input:</h2>";

    $movieName = $_GET['movieName'];
    //echo $bookName;

    if (isset($_GET['directors'])) {
        $director = $_GET['directors'];
        //echo $author;
    }
    $releaseDate = $_GET['releaseDate'];

    if (isset($_GET['countries'])) {
        $country = $_GET['countries'];
        //echo $country;
    }

    $sql = "INSERT INTO moviedb.films (`_title`, `director`, `release_year`, `country`) VALUES ('$movieName', '$director' , '$releaseDate', '$country')";
//    echo $sql;
    if (mysqli_query($conn, $sql)) {
        //echo "New record created successfully";
    } else {
        echo "Error";
    }
    $outputsql = "INSERT INTO moviedb.genre_film_relationship (film_id, genre_id) 
                    VALUES ( (select _id from moviedb.films where _title='$movieName'),
                    (SELECT _id FROM moviedb.genre where _title='";
    if (isset($_GET['__genres'])) {
        $a = 1;
        foreach ($_GET['__genres'] as $gen) {

            $gen_rel = $outputsql . $gen . "'))";
            //echo $gen_rel;
            if (mysqli_query($conn, $gen_rel)) {
                //echo "New record created successfully";
            } else {
                echo "Error";
            }
        }
    }
}

?>


