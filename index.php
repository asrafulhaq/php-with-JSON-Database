<?php 

    include_once "./app/functions.php";
    include_once "./app/models.php";

    if( isset($_GET['delete_id']) ){

        $delete_id = $_GET['delete_id'];
        $data_arr = json_decode(file_get_contents('./db.json'));
        
        $data_final = [];
        foreach( $data_arr as $value ){

            if( $value -> id != $delete_id ){
                array_push($data_final, $value);
            }

        }

        file_put_contents('./db.json', json_encode($data_final));
        
        header('location:index.php');


    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>


    <?php 


        
        /**
         * Register Form Submit  
         */
        if( isset($_POST['register']) ){
            // get data 
            $name = $_POST['name'];
            $email = $_POST['email'];
            $cell = $_POST['cell'];
            $skill = $_POST['skill'];

                        
           
            
            // validation 
            if( !$name || !$email || !$cell || !$skill ){
                $message = validate('All fields are requried');
            }else if( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
                $message = validate('Invalid Email Address', 'warning');
            } else if( !isPhone($cell) ){
                $message = validate('Invalid Phone Number', 'warning');
            } else {

                $file_name = saveFile($_FILES['photo'], 'images/');
                $message = validate('Data Stable', 'success');
                clearForm();
                createData('./db.json', [
                    'id'            => uniqueID(20),
                    'name'          => $name,
                    'email'         => $email,
                    'cell'          => $cell,
                    'skill'         => $skill,
                    'photo'         => $file_name
                ]);
                

            }


        }
    
    
    
    ?>
    

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a class="btn btn-primary" href="./create.php">Add new user</a>
                <br>
                <br>
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2 class="card-title">All users</h2>
                        
                    </div>
                    <div class="card-body">
                       <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Cell</th>
                                <th>Skill</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <body>

                            <?php  

                                $users = readData('./db.json');
                                $sl = 1;
                                foreach( $users as $user ) : 
                            ?>
                            <tr class="align-middle">
                                <td><?php echo $sl; $sl++; ?></td>
                                <td><?php echo $user -> name; ?></td>
                                <td><?php echo $user -> email; ?></td>
                                <td><?php echo $user -> cell; ?></td>
                                <td><?php echo $user -> skill; ?></td>
                                <td><img style="width:60px;height:60px;object-fit:cover;" src="./images/<?php echo $user -> photo; ?>" alt=""></td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="./show.php?id=<?php echo $user -> id; ?>">View</a>
                                    <a class="btn btn-sm btn-warning" href="./edit.php?id=<?php echo $user -> id; ?>">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="?delete_id=<?php echo $user -> id; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                        </body>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>