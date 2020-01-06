<?php
//creating error message
$error_message="";
if(isset($_GET['error'])){
    if ($_GET['error'] == "no_file") {
        $error_message = "Please upload a file.";
    }elseif($_GET['error'] == 'not_csv'){
        $error_message = "The file isn't a csv file.";
    }elseif($_GET['error'] == 'f_exst'){
        $error_message = "This file already exists.";
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Optional CSS -->
        <link rel="stylesheet" href="style.css">

        <title>CSVs exercice</title>
    </head>
    <body>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/templates/header.php');?>
        <div class="row justify-content-center">
            <div class="col-8 col-lg-10 bg-light shadow">
                <div class="row justify-content-center align-items-center">
                    <div class="col-6">
                        <div class=" border border-dark rounded-lg p-5">
                            <form enctype="multipart/form-data" action="make/" method="POST" >
                                <p class="text-danger" id="error"><?php /* echo error message*/echo $error_message; ?></p>
                                <input type="file" name="csv_file" id="csv_file">

                                <div class="mt-3">
                                    <label for="create_url">Create a sharable URL</label>
                                    <input type="checkbox" name="create_url" id="create_url">
                                </div>
                                <input type="submit" class="btn btn-primary mt-3" value="upload">
                            </form>
                        </div>
                        <h3 class="mt-4">or paste in a provided link</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>