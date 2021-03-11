<?php
    $con = mysqli_connect("localhost","root","","ajaxcrud");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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
            <form role="form" action="backend1.php" method="post" enctype="multipart/form-data" id="form">
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
                    <!-- <input type="text" name="city" id="city" class="form-control"> -->
                    <select name="city" id="city">
                        <option value=''>--Select City--</option>
                        <option value="surat">surat</option>
                        <option value="ahmedabad">Ahmedabad</option>
                        <option value="palanpur">Palanpur</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Password:</label>
                    <input type="text" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password:</label>
                    <input type="text" name="cnf_password" id="cnf_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Image:</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
               
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" id="btn_add" class="btn btn-primary" onclick="ValidateData()">Add</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
</form>
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
                <form action="backend1.php" method="post">
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
                    <!-- <input type="text" name="" id="update_city" class="form-control"> -->
                    <select name="update_city" id="update_city">
                    
            <option value="surat">surat</option>
            <option value="ahmedabad">Ahmedabad</option>
            <option value="palanpur">Palanpur</option>
                    </select>
                </div>
                <!-- <div class="form-group">
                    <label for="">Password:</label>
                    <input type="text" name="" id="update_password" class="form-control">
                </div> -->
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


    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

        <script type="text/javascript" src="js/dist/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/dist/jquery.validate.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script>

        $(document).ready(function(){
            readRecords();
        });

        // function insertSuccess(){
        //     // alert("data is added");
        // }
          //validate the data and insert the data
          function ValidateData()
        {
           if($(document).on('click','#btn_add')) 
            {
                $("#form").validate({
        rules: {
            firstname: {
                required: true
            },
            lastname:{
                required: true
            },
            email:{
                required: true
            },
            mobile:{
                required: true
            },
            city:{
                required: true
            },
            password:{
                required: true
            },
            cnf_password:{
                required: true,
                equalTo:"#password"
            },
            image:{
                required: true,
                extension: "jpg,jpeg, png"
            }
                
        },
            messages:
                    {
                        firstname:{
                            required: 'plz enter first name'
                        },
                        lastname:{
                            required: 'plz enter last name'
                        },
                        email:{
                            required: 'plz enter email'
                        },
                        mobile:{
                            required: 'plz enter mobile number'
                        },
                        city:{
                            required: 'plz enter city'
                        },
                        password:{
                            required: 'plz enter password'
                        },
                        cnf_password:{
                            required: 'plz enter confirm password',
                            equalTo:'Password did not match'
                        },
                        image:{
                            required:'Please upload your image',
                            extension: "You're only allowed to upload jpg or png images."
                        }
                    },
                 submitHandler: function()
                 {
                    var firstname = $('#firstname').val();
                    var lastname = $('#lastname').val();
                    var email = $('#email').val();
                    var mobile = $('#mobile').val();
                    var city = $('#city').val();
                    var password = $('#cnf_password').val();
                    var image = $('#image').val();
            
                    $.ajax({
                        url: "backend1.php",
                        type: "post",
                        data: { firstname : firstname,
                        lastname : lastname,
                        email : email,
                        mobile: mobile,
                        city: city,
                        password: password,
                        image: image },
                        success: function(data,staus){
                            // $('#form').modal("hide");
                            // $('#myModal').append('data-dismiss="modal"');
                            $('#message').append('<div class="alert alert-success"> <strong> Registration Done!</strong> . </div>');
                            $("#form").trigger("reset");
                            readRecords();   
                        }
                    });
          
                // addRecord();
                 }       
        
                });
            }
            
        }
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
                // $('#update_password').val(user.password);
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
            // var passwordupd = $('#update_password').val();

            var hidden_user_idupd = $('#hidden_user_id').val();

            $.post("backend1.php",{
                hidden_user_idupd:hidden_user_idupd,
                firstnameupd:firstnameupd,
                lastnameupd:lastnameupd,
                emailupd:emailupd,
                mobileupd:mobileupd,
                cityupd: cityupd,
                // passwordupd: passwordupd
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