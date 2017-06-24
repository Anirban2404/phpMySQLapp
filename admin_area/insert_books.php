<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Insert Book</title>
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
        function addAuthor(str) {
            document.getElementById("authors").innerHTML = "<option>" + str + "</option>"
            //console.log(str);
        }

        function addCat(str) {
            if (str.length == 0) {
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "insertbook.php?add_Cat=" + str, true);
                xmlhttp.send();
                window.location.reload();
            }
        }
        function _reset() {
            window.location.href = "insert_books.php";
        }
    </script>
</head>
<body>

<?php
include("../books/includes/bookDatabase.php");
include("../books/functions/functions.php");

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
    <div class="jumbotron" style="background-image: url('../books/images/background_image.jpg')">
        <h1 style="color: lightcyan">Insert Books</h1>
    </div>

    <form action="insert_books.php" method="get" enctype="multipart/form-data">
        <div class="form-group">
            <label>Book Name</label>
            <input type="text" name="bookName" class="form-control" placeholder="Enter Book Name" required>
        </div>

        <table class="table ">
            <tr>
                <div class="form-group">
                    <label>Category</label>
                    <td style="width:50%">
                        <select class="form-control" name="__cats[]" class="input-lg" style="width:50%" multiple
                                required>
                            <?php
                            optcategories();
                            ?>
                        </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info btn-md" style="width:50%" data-toggle="collapse"
                                data-target="#cat">Add Category
                        </button>
                        <div id="cat" class="collapse">
                            <input type="text" id="catT" name="catT" class="form-control" placeholder="Enter Category">
                            <input type="button" name="addC" class="btn btn-info" value="Add"
                                   onclick="addCat(document.getElementById('catT').value)">
                        </div>
                    </td>
                </div>
            </tr>
        </table>

        <table class="table ">
            <tr>
                <div class="form-group">
                    <label>Author</label>
                    <td style="width:50%">
                        <select class="form-control" id="authors" name="authors" class="input-lg" style="width:50%"
                                required>
                            <?php
                            optAuthors();
                            ?>
                        </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info btn-md" style="width:50%" data-toggle="collapse"
                                data-target="#author">Add Author
                        </button>
                        <div id="author" class="collapse">
                            <input type="text" id="authorT" name="authorT" class="form-control"
                                   placeholder="Enter Author Name">
                            <input type="button" name="addA" class="btn btn-info" value="Add"
                                   onclick="addAuthor(document.getElementById('authorT').value)">
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
    <a href="../books/home.php" class="btn btn-danger" style="width:30%"/>Cancel</a>
</div>
<br/>
</form>
</div>

</body>
</html>

<?php
global $bookconn;
if (isset($_GET['catT'])) {
    $catT = $_GET['catT'];
    //echo $catT;
}
if (isset($_GET['authorT'])) {
    $authorT = $_GET['authorT'];
    //echo $authorT;
}
if (isset($_GET['countryT'])) {
    $countryT = $_GET['countryT'];
    //echo $countryT;
}

//getting values
if (isset($_GET['submit'])) {
    //echo "<h2>Your Input:</h2>";

    $bookName = $_GET['bookName'];
    //echo $bookName;

    if (isset($_GET['authors'])) {
        $author = $_GET['authors'];
        //echo $author;
    }
    $releaseDate = $_GET['releaseDate'];

    if (isset($_GET['countries'])) {
        $country = $_GET['countries'];
        //echo $country;
    }

    $sql = "INSERT INTO `bookstore`.`books` (`_title`, `author_name`, `country`, `release_year`) VALUES ('$bookName', '$author' , '$country', '$releaseDate')";
    //echo $sql;
    if (mysqli_query($bookconn, $sql)) {
        //echo "New record created successfully";
    } else {
        echo "Error";
    }
    $outputsql = "INSERT INTO bookstore.book_category_relationship (_book_id, _cat_id) 
                    VALUES ( (select _id from bookstore.books where _title='$bookName'),
                    (SELECT cat_id FROM bookstore.category where cat_title='";
    if (isset($_GET['__cats'])) {
        $a = 1;
        foreach ($_GET['__cats'] as $cat) {

            $cat_rel = $outputsql . $cat . "'))";
            //echo $cat_rel;
            if (mysqli_query($bookconn, $cat_rel)) {
                //echo "New record created successfully";
            } else {
                echo "Error";
            }
        }
    }
}

?>


