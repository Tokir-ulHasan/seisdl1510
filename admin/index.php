<?php 
include 'header.php';
include_once '../lib/formatData.php';
include_once '../lib/Database.php';

$db = new Database();
$fm = new Formate();
if(isset($_POST['addBook'])){
    $subject   = $fm->validation($_POST['subject']);
    $title     = $fm->validation($_POST['title']);
    $author    = $fm->validation($_POST['author']);
    $publisher = $fm->validation($_POST['publisher']);
    $copyroght = $fm->validation($_POST['coptright']);
    $eddition  = $fm->validation($_POST['eddition']);
    $pages     = $fm->validation($_POST['pages']);
    $ISBN      = $fm->validation($_POST['ISBN']);
    $noCopies  = $fm->validation($_POST['no_copies']);
    $libName   = $fm->validation($_POST['lib_name']);
    $Shelf     = $fm->validation($_POST['shelf']);

    if($subject == "" || $title == "" || $author == "" || $publisher == "" ||  $eddition == "" || $pages == "" || $ISBN == "" || $libName == "" || $Shelf == "")
    {
        echo '<div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>warning!</strong> Filled must not be empty.
      </div>';
    }
    else{
        $ins_q = "INSERT INTO `tbl_book`( `subject`, `title`, `author`, `publisher`, `copyroght`, `eddition`, `pages`, `ISBN`, `noCopies`, `libName`, `shelf_no`) VALUES ('$subject','$title','$author','$publisher','$copyroght','$eddition','$pages','$ISBN','$noCopies','$libName','$Shelf')";
        $ins_res = $db->QueryExcute($ins_q);
        if($ins_res){
            echo '<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>success!</strong> Book Successfully Added.
      </div>';
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>warning!</strong> Failed to add book.
          </div>';
        }
    }
}

?>

        <!-- Add book -->
        <div id="adbook" class="modal fade" role="dialog">
            <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Books</h4>
                </div>
                <div class="modal-body">
                  <h4 class="text-center py-2">BOOk INFORMATION</h4>
                  <h5 class="line">Add a new book:</h5>
                   <form action="#" method="post">
                        <div class="table-responsive">          
                            <table class="table tbl">
                                <tbody>
                                    <tr>
                                        <td>The Book subject:</td>
                                        <td><input type="text" name="subject"></td>
                                    </tr>
                                    <tr>
                                        <td>The Book title:</td>
                                        <td><input type="text" name="title"></td>
                                    </tr>
                                    <tr>
                                        <td>The name of the Author(s):</td>
                                        <td><input type="text" name="author"></td>
                                    </tr>
                                    <tr>
                                        <td>The name of the Publisher:</td>
                                        <td><input type="text" name="publisher"></td>
                                    </tr>
                                    <tr>
                                        <td>Copyright for the book:</td>
                                        <td><input type="text" name="coptright"></td>
                                    </tr>
                                    <tr>
                                        <td>The edditon number: </td>
                                        <td><input type="text" name="eddition"></td>
                                    </tr>
                                    <tr>
                                        <td>The number of Pages:</td>
                                        <td><input type="text" name="pages"></td>
                                    </tr>
                                    <tr>
                                        <td>ISBN for the book:</td>
                                        <td><input type="text" name="ISBN"></td>
                                    </tr>
                                    <tr>
                                        <td>The number of copies:</td>
                                        <td><input type="text" name="no_copies"></td>
                                    </tr>
                                    <tr>
                                        <td>The name of the Library:</td>
                                        <td><input type="text" name="lib_name"></td>
                                    </tr>
                                    <tr>
                                        <td>Shelf No:</td>
                                        <td><input type="text" name="shelf"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><button type="sybmit" name="addBook" class="btn">Insert the Information</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                   </form>
                </div>
               <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
              </div>
        </div>

       </div>
    </body>


 
    <!-----------Script File------------>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>