<?php 
    include('../API/connect.php');
    // session_start();   
        $api = 'login';
        $email =$_POST['email'];
        $password =$_POST['password'];


        if($email !=""){
    	$data = array(
            "api" => $api,
            "email" => $email,
            "password" => $password,

        );

        // echo json_encode($data);
        // die;
        $ch = curl_init( 'http://localhost/my_project/API/API.php' );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $return = curl_exec($ch);
        $json_data = json_decode($return, true);
        $curl_error = curl_error($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // echo json_encode($json_data);
            //  echo  $json_data['msg']['token'];
            // die;

           
            
        //     echo $_SESSION['token'];
        setcookie("token", $json_data['msg']['token'], time()+3600, "/","", 0); 
        setcookie("hisid", $json_data['msg']['historyid'], time()+3600, "/","", 0);

        if($json_data['code']=='200 user'){
            setcookie("userid", $json_data['msg']['userid'], time()+3600, "/","", 0);
            setcookie("username", $json_data['msg']['username'], time()+3600, "/","", 0);
       
        }else{
            setcookie("adminid", $json_data['msg']['id'], time()+3600, "/","", 0);
            setcookie("adminname", $json_data['msg']['name'], time()+3600, "/","", 0);
        }
            if($json_data['code'] == '200'){
           
                header('location:../view/home.php');
                
            }elseif($json_data['code']=='200 user'){
                header('location:../view/homeuser.php');
            }else{
                echo "<script>
                alert('Incorrect email or passowrd!!');location='../view/index.php';
                </script>";
                // $_SESSION['token']=$json_data['msg']['token'];
                // $_SESSION['hisid']=$json_data['msg']['historyid'];
                // $_SESSION['adminid']=$json_data['msg']['adminid'];
            }
              // echo $json_data['msg']['pass'];
              die;
        }else{
                echo "<script>
                alert('plzz enter your email!!');location='../view/index.php';
                </script>";
        }
//    mysqli_close();
        
            
?>



