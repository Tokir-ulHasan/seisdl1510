<?php

include_once '../lib/formatData.php';
include_once '../lib/Database.php';

$db = new Database();
$fm = new Formate();

?>

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
        <style>
            .tbl{}
            .tbl tbody tr {
            padding: 0px; 
           
            border: none;
            }
            .tbl tbody tr td{
            padding: 5px; 
            line-height: 1.42857143; 

            border-top: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
           <div class="d-flex justify-content-center mt-5 text-info"><h2>Public Library</h2></div>
            
           <h5  class="d-flex justify-content-center mt-5 text-secondary">Search Your Book</h5>
           <?php
              
           ?>
           <form action="" method="post">
            <div class="input-group mt-3">

            
                <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" placeholder="Search by Author ,ISBN And Title" name="txt">
                <div class="input-group-append">
                     <button type="submit" class="btn btn-outline-secondary" type="button" name="search">Search</button>
                </div>
           
            </div>
            </form>
            <?php
                                          if(isset($_POST['borrow'])){
                                            $b_id   = $fm->validation($_POST['b_id']);
                                           
                                            $m_id      = $fm->validation($_POST['m_id']);
                                           
                                            $rerentDate   = $fm->validation($_POST['r_date']);
                                          
                                            if($b_id == "" || $m_id == "" || $rerentDate == ""  )
                                            {
                                                echo '<div class="alert alert-danger alert-dismissible">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>warning!</strong> Filled must not be empty.
                                              </div>';
                                            }
                                            else{
                                                $ins_q = "INSERT INTO `borrow`(`b_id`, `m_id`,  `r_date`) VALUES ('$b_id',' $m_id',' $rerentDate')";
                                                $res = $db->QueryExcute($ins_q);
                                                if($res){
                                                  /*  $s_Q = "SELECT * FROM `tbl_book` WHERE `ISBN` = '$b_id'";
                                                    $s_res = $db->QueryExcute($s_Q);
                                                    $Tcop = 0;
                                                    if($s_res && $s_res->num_rows > 0)
                                                    {
                                                        $data=$s_res->fetch_assoc();
                                                        $Tcop = $data['noCopies'];
                                                        $Tcop = $Tcop - 1;
                                                    }
                                                    $U_q = "UPDATE `tbl_book` SET `noCopies`=' $Tcop', WHERE `ISBN` = '$b_id'";
                                                    $U_res = $db->QueryExcute($U_q);
                                                    if($U_res){*/
                                                        echo '<div class="alert alert-success alert-dismissible">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong>success!</strong>  Successfully Borrow.
                                                      </div>';
                                                    /*}*/

                                                    
                                                }
                                                else{
                                                    echo '<div class="alert alert-danger alert-dismissible">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>warning!</strong>Borrow Failed .
                                                  </div>';
                                                }
                                            }
                                        }
                                        ///Return

                                        if(isset($_POST['return'])){
                                            $b_id   = $fm->validation($_POST['b_id']);
                                           
                                            $m_id      = $fm->validation($_POST['m_id']);
                                           
                                            $amount   = $fm->validation($_POST['amount']);
                                          
                                            if($b_id == "" || $m_id == "" || $amount == ""  )
                                            {
                                                echo '<div class="alert alert-danger alert-dismissible">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>warning!</strong> Filled must not be empty.
                                              </div>';
                                            }
                                            else{
                                                $ins_qr = "INSERT INTO `return`( `b_id`, `m_id`, `f_amount`) VALUES ('$b_id','$m_id','$amount')";
                                                $resr = $db->QueryExcute($ins_qr);
                                                if($resr){
                                                    echo '<div class="alert alert-success alert-dismissible">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>success!</strong>  Successfully Return Please Login.
                                              </div>';
                                                }
                                              
                                            }
                                        }
                            
                                    
                                    ?>
            <div class="table-responsive mt-5 text-center">          
                <table class="table ">
                    <thead class="table-bordered">
                        <tr>
                        <th>Sl</th>
                        <th>Book Name</th>
                        <th>Description</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <?php
               if(isset($_POST['search'])){
                  $txt = $_POST['txt'];
                
                  $search_q = "SELECT * FROM `tbl_book` WHERE `title` like '%$txt%' or `author` like '%$txt%' or `ISBN` like '%$txt%'"; 
                  $search_res = $db->QueryExcute($search_q);
                  if($search_res &&  $search_res->num_rows > 0){
                      $i = 0;
                     while($data=$search_res->fetch_assoc()){
                     $i++;
                     
            
                 ?>
                    <tbody class="table-bordered">
                    <tr>
                         <td class="pt-5"><?php echo $i?></td>
                       
                        <td class="pt-5"><?php echo $data['title']?></td>
                        <td>
                            <div class="table-responsive">          
                                <table class="table tbl table-borderless ">
                                    <tbody>
                                        <tr>
                                            <td>The Book subject:</td>
                                            <td><?php echo $data['title']?></td>
                                        </tr>
                                        <tr>
                                            <td>The name of the Author(s):</td>
                                            <td><?php echo $data['author']?></td>
                                        </tr>
                                        <tr>
                                            <td>The name of the Publisher:</td>
                                            <td><?php echo $data['publisher']?></td>
                                        </tr>
                                        <tr>
                                            <td>Copyright for the book:</td>
                                            <td><?php echo $data['copyroght']?></td>
                                        </tr>
                                        <tr>
                                            <td>The edditon number: </td>
                                            <td><?php echo $data['eddition']?></td>
                                        </tr>
                                        <tr>
                                            <td>The number of Pages:</td>
                                            <td><?php echo $data['pages']?></td>
                                        </tr>
                                        <tr>
                                            <td>ISBN for the book:</td>
                                            <td><?php echo $data['ISBN']?></td>
                                        </tr>
                                        <tr>
                                            <td>The number of copies:</td>
                                            <td><?php echo $data['noCopies']?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                        <td class="pt-5">
                          <button type="button" class="btn btn-primary"    data-toggle="modal" data-target="#brr">Borrow</button>
                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#rent">Return</button>
                            <div class="modal" id="brr">
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
                                                <td>Book Id:</td>
                                                <td><input type="text" name="b_id"></td>
                                                </tr>
                                                <tr>
                                                <td>Member Id:</td>
                                                <td><input type="text" name="m_id"></td>
                                                </tr>
                                                <td>Curent Date:</td>
                                                <td><input type="text" readonly>
                                                </tr>
                                                <td>Return Date:</td>
                                                <td><input type="text" name="r_date"></td>
                                                </tr>
                                                <tr>
                                                <td></td>
                                                <td><button type="sybmit" name="borrow" class="btn">Borrow</button></td>
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
                <!-- The reg -->
                <div class="modal" id="rent">
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
                                                <td>Book Id:</td>
                                                <td><input type="text" name="b_id"></td>
                                                </tr>
                                                <tr>
                                                <td>Member Id:</td>
                                                <td><input type="text" name="m_id"></td>
                                                </tr>
                                                <td>Fine Date:</td>
                                                <td><input type="text" id="f_date" readonly>
                                                </tr>
                                                <td>Total fine amount:</td>
                                                <td><input type="text" name="amount"></td>
                                                </tr>
                                                
                                                <tr>
                                                <td></td>
                                                <td><button type="sybmit" name="return" class="btn">Retutn</button></td>
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
                        </td>
                         <!-- The Login -->
              
                    </tr>
                    </tbody>
                    <?php
              }
            }
         } ?>
                </table>
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
    <script>
    $("#datetime").datetimepicker({
        format: 'yyyy-mm-dd hh:ii'
    });
</script>
</html>