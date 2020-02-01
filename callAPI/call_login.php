<?php 
    include('../API/connect.php');
    session_start();    
        $email =$_POST['email'];
        $password =$_POST['password'];

        if($email !=""){
    	$data = array(
            "email" => $email,
            "password" => $password,
        );
        $ch = curl_init( 'http://localhost/my_project/API/login.php' );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $return = curl_exec($ch);
        $json_data = json_decode($return, true);
        $curl_error = curl_error($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //     echo json_encode($json_data);
        //     echo $_SESSION['token'];
            if($json_data['code'] != 200){
                echo "<script>
                alert('Incorrect email or passowrd!!');location='../view/index.php';
                </script>";
            }else{
                header('location:../view/home.php');
                $_SESSION['token']=$json_data['msg']['token'];
                $_SESSION['hisid']=$json_data['msg']['historyid'];
                $_SESSION['adminid']=$json_data['msg']['adminid'];
            }
              // echo $json_data['msg']['pass'];
              die;
        }else{
                echo "<script>
                alert('plzz enter your email!!');location='../view/index.php';
                </script>";
        }
   mysqli_close();
        
            
?>



