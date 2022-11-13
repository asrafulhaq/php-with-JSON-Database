<?php 

    include_once "./app/functions.php";
    include_once "./app/models.php";

    if( isset($_GET['id']) ){
        // get all users
        $id = $_GET['id'];
        $data = readData('./db.json');

        $edit_data = [];
        foreach( $data as $d ){

            if( $d -> id == $id ){
                $edit_data = $d;
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
    <title>Document</title>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>


    <?php 


        
        /**
         * Register Form Submit  
         */
        if( isset($_POST['edit']) ){
            // get data 
            $name = $_POST['name'];
            $email = $_POST['email'];
            $cell = $_POST['cell'];
            $skill = $_POST['skill'];

            $id = $_GET['id'];
            $data = readData('./db.json');       
            
            $data[findIndex($data, 'id',  $id)] = [
                'id'        => uniqueID(),
                'name'      => $name,
                'email'      => $email,
                'cell'      => $cell,
                'skill'     => $skill,
                'photo'     => $edit_data -> photo
            ];

            file_put_contents('./db.json', json_encode($data));

            header("location:index.php");

        }
    
    
    
    ?>
    

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <a class="btn btn-primary" href="./index.php">All users</a>
                <br>
                <br>
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2 class="card-title">User Edit Form</h2>
                        <?php echo $message ?? '' ?>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input name="name" type="text" value="<?php echo $edit_data -> name ?>" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input name="email" type="text" value="<?php echo $edit_data -> email ?>" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Cell</label>
                                <input name="cell" type="text" value="<?php echo $edit_data -> cell ?>" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Skill</label>
                                <select name="skill" id="" class="form-control">
                                    <option value="">-select-</option>
                                    <option value="MERN Stack">MERN Stack</option>
                                    <option value="JAMS Stack">JAMS Stack</option>
                                    <option value="Django">Django</option>
                                    <option value="WP">WP</option>
                                    <option value="DSA">DSA</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Photo</label>
                                <input name="photo" type="file" class="form-control">
                            </div>

                            <div class="form-group">
                                <button name="edit" class="btn btn-primary">update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>