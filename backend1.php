<?php
    $con = mysqli_connect("localhost","root","","ajaxcrud");

    extract($_POST);
    extract($_FILES);
    
    

    //read the data
    if(isset($_POST['readrecord'])){
        $data = '<table class="table table-bordered table-striped">
                    <tr>
                    <th>No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>City</th>
                    <th>Password</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </tr>';
           $dispque = "SELECT * FROM `student`";
           $result = mysqli_query($con,$dispque); 
           
           if(mysqli_num_rows($result)>0){
              $number = 1;
              while($row = mysqli_fetch_array($result)){
                  $data .= '<tr>
                  <td>'.$number.'</td>
                  <td>'.$row['firstname'].'</td>
                  <td>'.$row['lastname'].'</td>
                  <td>'.$row['email'].'</td>
                  <td>'.$row['mobile'].'</td>
                  <td>'.$row['city'].'</td>
                  <td>'.$row['password'].'</td>
                  <td>
                      <button onclick="GetUserDetails('.$row['id'].')" class="btn btn-primary">Edit</button>
                  </td>
                  <td>
                      <button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
                  </td>
              </tr>';
              $number++;
              }
           }
           else{
               echo"<h3 class='text-center text-warning'>No Records available</h3>";
           }
           $data .= '</table>';
        echo $data;
        
    }

    //insert the data
    if(!empty($_POST['firstname']) || !empty($_POST['lastname']) || !empty($_POST['email']) || !empty($_POST['mobile']) || !empty($_POST['city']) || !empty($_POST['password']) || !empty($_FILES['image']['name'])){
        // $img = $_FILES['image']['name'];
        // $tmp = $_FILES['image']['tmp_name'];
        // $path = 'uploads/';
        // $final_image = rand(1000,1000000).$img;
        // $path = $path.strtolower($final_image);
        $image = $_FILES["image"]["name"];
        
        $q = "INSERT INTO `student`(`firstname`, `lastname`, `email`, `mobile`,`city`,`password`,`image`) VALUES ('".$firstname."','".$lastname."','".$email."','".$mobile."','".$city."','".$password."','".$image."')";
       $run = mysqli_query($con,$q);
       
       if($run){
        move_uploaded_file($_FILES['image']['tmp_name'],'images/'.$_FILES['image']['name']);
       }
    }


    //delete user
    if(isset($_POST['deleteid'])){
        $userid = $_POST['deleteid'];
        $delque = "DELETE FROM `student` WHERE id = '$userid'";
        $run = mysqli_query($con,$delque);
    }

    //get user id for update
    if(isset($_POST['id']) && isset($_POST['id']) != "")
    {
        $user_id = $_POST['id'];
        $que = "SELECT * FROM `student` WHERE id = '$user_id'";
        if(!$result = mysqli_query($con,$que)){
            exit;
        }

        $response = array();

        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $response = $row;
            }
        }else{
            $response['status'] = 200;
            $response['message'] = "data not found";
        }

        echo json_encode($response);
    }
    else{
        $response['status'] = 400;
        $response['message'] = "invalid request";
    }   

    //update table
    if(isset($_POST['hidden_user_idupd'])){
        $hidden_user_idupd = $_POST['hidden_user_idupd'];
        $firstnameupd = $_POST['firstnameupd'];
        $lastnameupd = $_POST['lastnameupd'];
        $emailupd = $_POST['emailupd'];
        $mobileupd = $_POST['mobileupd'];
        $cityupd = $_POST['cityupd'];
        // $passwordupd = $_POST['passwordupd'];

        $updateque = "UPDATE `student` SET `firstname`='".$firstnameupd."',`lastname`='".$lastnameupd."',`email`='".$emailupd."',`mobile`='".$mobileupd."',`city`='".$cityupd."' WHERE id = '$hidden_user_idupd' ";
        $run = mysqli_query($con,$updateque);
     }
?>