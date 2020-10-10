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
    