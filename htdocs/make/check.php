<?php
    session_start();
    $verifyed = [];
    for ($i=0; $i < sizeof($_SESSION['csv_arr']) ; $i++) {
        if ($_SESSION['csv_arr'][$i][1] == $_POST["{$i}"]){
            array_push($verifyed,TRUE);
        }
        else{
            array_push($verifyed,FALSE);
        } 
    }
    print_r($verifyed);
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
                <div class="container p-5">
                    <h1 class="display-4 text-center mb-4"><?php echo $_SESSION['csv_name'];?></h1>
                    <?php for ($i=0; $i < sizeof($_SESSION['csv_arr']); $i++) { ?>
                        <label for='<?php echo $i; ?>'><?php echo $_SESSION['csv_arr'][$i][0].': '; ?></label>
                        <input type="text" name="<?php echo $i; ?>" id="<?php echo $i; ?>" redo>
                </div>
            </div>
        </div>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>