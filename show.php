<?php 

    include_once "./app/functions.php";
    include_once "./app/models.php";


    if( isset($_GET['id']) ){
        $id = $_GET['id'];

        $data_arr = json_decode(file_get_contents('./db.json'));
        
        $user = [];
        foreach( $data_arr as $value ){

            if( $value -> id == $id ){
                $user =  $value;
            }

        }

    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user -> name; ?></title>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>



    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a class="btn btn-primary" href="./index.php">All users</a>
                <br>
                <br>
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2 class="card-title">All users</h2>
                        
                    </div>
                    <div class="card-body">
                        
                        <img style="width:300px; height:300px;object-fit:cover;" src="./images/<?php echo $user -> photo; ?>" alt="">
                        <h1><?php echo $user -> name; ?></h1>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>