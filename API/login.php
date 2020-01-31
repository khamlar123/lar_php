<?php 
    include('connect.php');
    session_start();
    $data = array();
    $json = file_get_contents('php://input');
    $data = json_decode($json, TRUE);

    $password = $data['password'];
    $email = $data['email'];
    date_default_timezone_set("Asia/Bangkok");
    $login=date("Y-m-d H:i:s");

    if($email!=""){
        $sql = "SELECT * FROM `tb_admin` WHERE `email`='$email'" ;
        $res = mysqli_query($conn,$sql);
        if(mysqli_query($conn, $sql)){
            while($row = mysqli_fetch_array($res)){
                $data['id'] = $row["adminid"];
                $data['passowrd'] = $row["password"];
                $pass = $row["password"];
                $id = $row["adminid"];

                $_SESSION['adminid']=$row["adminid"];
                $_SESSION['adminname']=$row["adminname"];
                
                
                //check password
                if (password_verify($password, $pass)) {
                    // save date in to hitory
                    $sql = "INSERT INTO `tb_hitory`(`loginDate`, `logoutDate`, `text`, `userId`, `adminId`) 
                            VALUES ('$login', '00:00:00', 'null', '0', '$id')";
                    if(mysqli_query($conn, $sql)){
                        // get history id
                        if($login!=""){
                            $sql = "SELECT * FROM `tb_hitory` WHERE `loginDate`='$login'" ;
                            $res = mysqli_query($conn,$sql);
                            if(mysqli_query($conn, $sql)){
                                while($row = mysqli_fetch_array($res)){
                                    $data['id'] = $row["id"];
                                    $hitoryId = $row["id"];
                                    $_SESSION['hisId']=$row["id"];      
                                }
                               
                                if($id !=""){
                                    $token = password_hash($password.$email, PASSWORD_DEFAULT);
                                    $sql = "UPDATE `tb_admin` SET `token`='$token' WHERE `adminid`= $id";
                                    $res = mysqli_query($conn, $sql);
                                    $_SESSION['token']=$token;
                                    header('location:../view/index.php');
                                }
                            
                            } 
                        }
                        //end get history id
                    }else{
                        echo 'error login date';
                        die;
                    }
                    //end save date in to hitory
                }else{
                    echo 'check your password';
                    die;
                }
                //end check password
                // echo json_encode($data);
            }
        }
    }else{
        echo 'plzz input your email';
    }
    mysqli_close();
?>