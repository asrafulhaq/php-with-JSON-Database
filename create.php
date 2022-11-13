<?php 

    include_once "./app/functions.php";
    include_once "./app/models.php";

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
                
                header('location:index.php');

            }


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
                        <h2 class="card-title">User Register</h2>
                        <?php echo $message ?? '' ?>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input name="name" type="text" value="<?php old('name'); ?>" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input name="email" type="text" value="<?php old('email'); ?>" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Cell</label>
                                <input name="cell" type="text" value="<?php old('cell'); ?>" class="form-control">
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
                                <button name="register" class="btn btn-primary">Register</button>
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