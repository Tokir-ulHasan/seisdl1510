<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SEISDL</title>
        <!-----------Css File------------>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      
       <style>
         
       .tbl{}
       .tbl tbody tr td{
            padding: 0px; 
            line-height: 1.42857143; 
          
            border-top: 0px solid #ddd;
       }
       .line{
            display: flex; 
            flex-direction: row; 
       }
       .line:after{
      
            content: ""; 
            flex: 1 1; 
            border-bottom: 1px solid gray; 
            margin: auto; 
       }
       </style>
    </head>
    <body>
       <div class="container">
        <nav class="navbar navbar-default">
                <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Library Borrowing  Sysytem</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><button type="button" class="btn btn-light btn-lg" data-toggle="modal" data-target="#adbook">Add Book</button></li>
                        <li><button type="button" class="btn btn-light btn-lg" data-toggle="modal" data-target="#adcopy">Add Copy</button></li>
                    </ul>
                </div>
        </nav>
        <div id="adcopy" class="modal fade" role="dialog">
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
                               <?php
                                  $query ="SELECT `ISBN` FROM `tbl_book` ";
                                  $res = $db->QueryExcute($query);
                               ?>
                                    <tr>
                                        <td>ISBN</td>

                                        <td>
                                         <select name="ISBN" id="">
                                           <option value="-1">Select</option>
                                           <?php
                                            if($res && $res->num_rows){
                                                while($data=$res->fetch_assoc())
                                                {
                                                    echo '<option value="'.$data['ISBN'].'" >'.$data['ISBN'].'</option>';
                                                }
                                            }
                                           
                                           
                                           ?>
                                         </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Add Copy:</td>
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