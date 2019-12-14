<?php
session_start();
session_destroy();
?>

<!DOCTYPE <!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <style>
        .tombol1 {
            padding: 10px 35px;
            background: black;
            transition: .3s ease-in;
            color: white;
            border: 1px solid white;
          }
        
          .tombol1:hover {
           background: #191919;
           color: white;
          }
        </style>

    </head>
    <body>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            Launch demo modal
    </button>
                     
                   <!-- Modal -->
                   <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">LogOut</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">
                           ...
                       </div>
                       <div class="modal-footer">
                        <p class="text-center" style="float: left; padding-right: 20px; padding-top: 3px;"><a  href="index2.php" class="tombol1">Yes</a></p>
                        <p class="text-center"><a  href="checkout.html" class="tombol1">No</a></p>
                       </div>
                       </div>
                   </div>
                   </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>