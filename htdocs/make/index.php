<?php
    //defining new file function 
    function create_new_file(){
        global $data_arr;
        if ($data_arr['name']!=""){
        // Where the file is going to be stored
         $target_dir = $_SERVER['DOCUMENT_ROOT']."/csvs/";
         $file = $data_arr['name'];
         $path = pathinfo($file);
         $filename = $path['filename'];
         $ext = $path['extension'];
         $temp_name = $data_arr['tmp_name'];
         $path_filename_ext = $target_dir.$filename.".".$ext;
         
        // Check if file already exists
        if (file_exists($path_filename_ext)) {
            return true;
         }else{
         move_uploaded_file($temp_name,$path_filename_ext);
            return false;
         }
        }
    }


    // if name is in the path (GET)
    if (isset($_GET['name'])){
        // cheking if file exists
        if(file_exists($_SERVER['DOCUMENT_ROOT'].'/csvs/'.$_GET['name'].'.csv')){
            $csv_file = fopen($_SERVER['DOCUMENT_ROOT'].'/csvs/'.$_GET['name'].'.csv','r');

            $csv_file_name = $_GET['name'];
        }
        else{
            //if not 404
            header("HTTP/1.0 404 Not Found");
            exit();
        }
    }
    else {
        //checking csv file
        if(!is_uploaded_file($_FILES['csv_file']['tmp_name'])){
            header('Location:/?error=no_file');
        }
        elseif(!in_array(pathinfo($_FILES['csv_file']['name'], PATHINFO_EXTENSION), array('csv'))){
            header('Location:/?error=not_csv');
        }
        else {// no error
            // data is the file as an array
            $data_arr = $_FILES['csv_file'];
            $csv_file =fopen($data_arr['tmp_name'],'r');

            $csv_file_name = htmlspecialchars($data_arr['name']);


            // creating new file if checkboxe value on
            if(isset($_POST['create_url'])){
                $f_exst = create_new_file();
            }
            // if file exists ,do not and redirect
            if ($f_exst){
                header('Location:/?error=f_exst');
            }
        }
    }
    
    


    //////////////////////////////////////
    session_start();


    $_SESSION['csv_arr'] = [];
    $_SESSION['csv_name'] = $csv_file_name;
    while (($data = fgetcsv($csv_file,10000)) !== FALSE) 
    {
      // Each individual array is being pushed into the nested array
      $_SESSION['csv_arr'][] = $data;		
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
                <form action="check.php" class="container p-5" method="POST">
                    <h1 class="display-4 text-center mb-4"><?php echo $_SESSION['csv_name'];?></h1>
                    <?php $i = 0 ; foreach ($_SESSION['csv_arr'] as $line) { ?>
                        <div class="my-3 form-inline">
                            <label for='<?php echo $i; ?>'><?php echo $line[0].': '; ?></label>
                            <input class="ml-3 form-control" type="text" name="<?php echo $i; ?>" id="<?php echo $i; ?>">
                        </div>
                    <?php $i++;} ?>
                    <input type="submit" name="submit_form" class="btn btn-success btn-lg mt-4">
                </form>
            </div>
        </div>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>