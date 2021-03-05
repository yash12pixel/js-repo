<?php
    $con = mysqli_connect("localhost","root","","ajaxcrud");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container">
        <h1 class="text-primary text-center">Ajax Crud</h1>
            <div class="d-flex justify-content-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Add User
                </button>
            </div><br>
        <div id="message">
        
        </div><br>
        <h2 class="text-success">All Records</h2>

        <div id="records_contant">

        </div>

        <!-- The Modal -->
        <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ajax Crud</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="post">
                <div class="form-group">
                    <label for="">FirstName:</label>
                    <input type="text" name="firstname" id="firstname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">LastName:</label>
                    <input type="text" name="lastname" id="lastname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email:</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Mobile:</label>
                    <input type="text" name="mobile" id="mobile" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">City:</label>
                    <input type="text" name="city" id="city" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password:</label>
                    <input type="text" name="password" id="password" class="form-control">
                </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="addRecord()">Add</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
        </div>


        <!-- update model -->

         <!-- The Modal -->
         <div class="modal" id="update_user_modal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ajax Crud</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form  method="post" id="form">
                <div class="form-group">
                    <label for="">FirstName:</label>
                    <input type="text" name="" id="update_firstname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">LastName:</label>
                    <input type="text" name="" id="update_lastname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email:</label>
                    <input type="text" name="" id="update_email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Mobile:</label>
                    <input type="text" name="" id="update_mobile" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">City:</label>
                    <input type="text" name="" id="update_city" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password:</label>
                    <input type="text" name="" id="update_password" class="form-control">
                </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="updateuserdetail()">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <input type="hidden" id="hidden_user_id">
            </div>

            </div>
        </div>
        </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="val.js"></script>
    <script>

        $(document).ready(function(){
            readRecords(); 
        });

        // function insertSuccess(){
        //     // alert("data is added");
        // }
        
        //read records
        function readRecords(){
            var readrecord = "readrecord";
            $.ajax({
                url: "backend1.php",
                type: "post",
                data: { readrecord : readrecord },
                success: function(data,status){
                    $('#records_contant').html(data);
                }
            });
        }

        //insert/add records
        function addRecord(){
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var email = $('#email').val();
            var mobile = $('#mobile').val();
            var city = $('#city').val();
            var password = $('#password').val();

            $.ajax({
                url: "backend1.php",
                type: "post",
                data: { firstname : firstname,
                lastname : lastname,
                email : email,
                mobile: mobile,
                city: city,
                password: password },
                success: function(data,staus){
                    $('#message').append('<div class="alert alert-success"> <strong> Registration Done!</strong> . </div>');
                     readRecords();   
                }
            });
        }   

        //delete records
        function DeleteUser(deleteid){
            var conf = confirm("Are You sure ?");
            if(conf==true){
                $.ajax({
                    url: "backend1.php",
                    type: "post",
                    data: { deleteid : deleteid },
                    success: function(data,status){
                        $('#message').append('<div class="alert alert-danger"> <strong> Data Deleted!</strong> . </div>');
                        readRecords();
                    }   
                });
            } 
        }

        //get user details
        function GetUserDetails(id){
            $('#hidden_user_id').val(id);
            $.post("backend1.php",{
                id:id
            },function(data,status){
                var user = JSON.parse(data);
                $('#update_firstname').val(user.firstname);
                $('#update_lastname').val(user.lastname);
                $('#update_email').val(user.email);
                $('#update_mobile').val(user.mobile);
                $('#update_city').val(user.city);
                $('#update_password').val(user.password);
            }

            );

            $('#update_user_modal').modal("show");
        }

        //update user data
        function updateuserdetail(){
            var firstnameupd = $('#update_firstname').val();
            var lastnameupd = $('#update_lastname').val();
            var emailupd = $('#update_email').val();
            var mobileupd = $('#update_mobile').val();
            var cityupd = $('#update_city').val();
            var passwordupd = $('#update_password').val();

            var hidden_user_idupd = $('#hidden_user_id').val();

            $.post("backend1.php",{
                hidden_user_idupd:hidden_user_idupd,
                firstnameupd:firstnameupd,
                lastnameupd:lastnameupd,
                emailupd:emailupd,
                mobileupd:mobileupd,
                cityupd: cityupd,
                passwordupd: passwordupd
            },
            function(data,status){
                $('#update_user_modal').modal("hide");
                $('#message').append('<div class="alert alert-info"> <strong> Data Updated!</strong> . </div>');
                readRecords();
            }
                
            );
        }

    </script>

</body>
</html>