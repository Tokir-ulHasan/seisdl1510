<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SEISDL</title>
        <!-----------Css File------------>
        <link rel='stylesheet' type='text/css' media='screen' href='../css/bootstrap.min.css'>
        <link href="../css/animate.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/owl.carousel.min.css" rel="stylesheet">
        <link href="../css/jquery.rateyo.min.css" rel="stylesheet">
        <link href="../css/owl.theme.default.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
        <?php
          
            include_once '../lib/formatData.php';
            include_once '../lib/Database.php';
            
            $db = new Database();
            $fm = new Formate();
            if(isset($_POST['regis'])){
                $id   = $fm->validation($_POST['id']);
                $Name     = $fm->validation($_POST['Name']);
                $Address    = $fm->validation($_POST['Address']);
                $Street = $fm->validation($_POST['Street']);
                $City = $fm->validation($_POST['City']);
                $Age  = $fm->validation($_POST['Age']);
                $Phone     = $fm->validation($_POST['Phone']);
                $Email      = $fm->validation($_POST['Email']);
                $Password  = $fm->validation($_POST['Password']);
                $Confirm   = $fm->validation($_POST['Confirm']);
              
                if($id == "" || $Name == "" || $Address == "" || $Address == "" ||  $Street == "" || $City == "" || $Age == "" || $Phone == "" || $Email == "" ||  $Password == "" || $Confirm == ""  )
                {
                    echo '<div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>warning!</strong> Filled must not be empty.
                  </div>';
                }
                if( $Confirm != $Password ){
                    echo '<div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>warning!</strong> Password are not Match.
                  </div>';
                }
                else{
                    $ins_q = "INSERT INTO `users`( `m_id`, `name`, `address`, `street`, `city`, `phone`, `email`, `pass`,  `age`) VALUES ('$id','$Name','$Address','$Street','$City','$Phone','$Email', $Password,'$Age')";
                    $ins_res = $db->QueryExcute($ins_q);
                    if($ins_res){
                        echo '<div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>success!</strong>  Successfully Rgistration Please Login.
                  </div>';
                    }
                    else{
                        echo '<div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>warning!</strong>Rgistration Failed .
                      </div>';
                    }
                }
            }

            if(isset($_POST['login'])){
                $id   = $fm->validation($_POST['id']);
                $Password  = $fm->validation($_POST['Password']);
                
                if($id == "" || $Password == ""  )
                {
                    echo '<div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>warning!</strong> Filled must not be empty.
                  </div>';
                }
                else{
                    $ins_q = "SELECT * FROM `users` WHERE `m_id` = '$id'  and `pass` = '$Password' ";
                    $ins_res = $db->QueryExcute($ins_q);
                    if($ins_res){
                       
                        header('Location:index.php');
                    }
                    else{
                        echo '<div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>warning!</strong>Invalid PassWord or Member Id .
                      </div>';
                    }
    
                }
              
                
            }
            
        
        ?>
          <div class="text-info" style="padding:30% 35%" >
                  <div>  <h2>Public Library</h2> </div>
               
                 <div>
                   
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login">Login</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#regis">Registration</button>
                 </div>
                
          </div>  
                <!-- The Login -->
                <div class="modal" id="login">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                        <form action="#" method="post">
                                    <div class="table-responsive">          
                                        <table class="table tbl">
                                            <tbody>
                                                <tr>
                                                    <td>Member Id:</td>
                                                    <td><input type="text" name="id"></td>
                                                </tr>
                                                <tr>
                                                    <td>Password:</td>
                                                    <td><input type="password" name="Password"></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><button type="sybmit" name="login" class="btn">Login</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div> 
                <!-- The reg -->
                <div class="modal" id="regis">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="post">
                                    <div class="table-responsive">          
                                        <table class="table tbl">
                                            <tbody>
                                                <tr>
                                                    <td>Member Id:</td>
                                                    <td><input type="text" name="id"></td>
                                                </tr>
                                                <tr>
                                                    <td>Name:</td>
                                                    <td><input type="text" name="Name"></td>
                                                </tr>
                                                <tr>
                                                    <td>Address:</td>
                                                    <td><input type="text" name="Address"></td>
                                                </tr>
                                                <tr>
                                                    <td>Street:</td>
                                                    <td><input type="text" name="Street"></td>
                                                </tr>
                                                <tr>
                                                    <td>City:</td>
                                                    <td><input type="text" name="City"></td>
                                                </tr>
                                                <tr>
                                                    <td>Phone number: </td>
                                                    <td><input type="text" name="Phone"></td>
                                                </tr>
                                                <tr>
                                                    <td>Age:</td>
                                                    <td><input type="text" name="Age"></td>
                                                </tr>
                                                <tr>
                                                    <td>Email:</td>
                                                    <td><input type="text" name="Email"></td>
                                                </tr>
                                                <tr>
                                                    <td>Password:</td>
                                                    <td><input type="password" name="Password"></td>
                                                </tr>
                                                <tr>
                                                    <td>Confirm Password:</td>
                                                    <td><input type="password" name="Confirm"></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><button type="sybmit" name="regis" class="btn">Insert the Information</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn " data-dismiss="modal">Exit</button>
                        </div>
                        </div>
                    </div>
                </div> 
        </div>
    </body>
    <!-----------Script File------------>
    <script  src="../asset/js/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/wow.min.js" ></script>
    <script src="../js/popper.min.js" ></script>
    <script src="../js/bootstrap.min.js" ></script>
    <script src="../js/owl.carousel.min.js" ></script>
    <script src="../js/bootstrap-input-spinner.min.js" ></script>
</html>