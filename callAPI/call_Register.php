<?php 
       $api = "adduser";
        $name = $_POST['name'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];

        $p =$_FILES['fileToUpload']['name'];
        $target_dir = "../img/";
        $target_file = $target_dir. basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_dir.$p)) {
            // print "Uploaded successfully!";
         }
        $village = $_POST['village'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $role = 'user';

      

       $data = array(
           "api" => $api,
           "name" =>$name,
           "lname"=>$lname,
           "email"=>$email,
           "password"=>$password,
           "phone"=>$phone,
           "img"=>$p,
           "village"=>$village,
           "city"=>$city,
           "province"=>$province,
           "role" =>$role,
          
       );
    //    var_dump ($data);
    //    die;
    $ch = curl_init( 'http://localhost/my_project/API/API.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $return = curl_exec($ch);
        $json_data = json_decode($return, true);
        $curl_error = curl_error($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //  echo json_encode($json_data);
        //  echo  $json_data['code'];
        //  die;
        if($json_data['code']==200){
            echo "<script>
             alert('Register user comple plz Wait admin check information ');location='../index.php';</script>";
        }else{
            echo "<script>
            alert('Register user error');location='../view/register.php';</script>";
        }
        
        //      
        //  die;
?>