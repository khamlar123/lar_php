<?php 
    include('connect.php');
   
    $data = array(); //get input data
    $dataRe = array(); //send result data
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
                $dataRe['id'] = $row["adminid"];
                $dataRe['name'] = $row["adminname"];
                $pass = $row["password"];
                $id = $row["adminid"];   
           
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
   
                                    $dataRe['historyid'] = $row["id"];    
                                    if($id !=""){
                                        $token = password_hash($password.$email, PASSWORD_DEFAULT);
                                        $sqlt = "UPDATE `tb_admin` SET `token`='$token' WHERE `adminid`= $id";
                                        $rest = mysqli_query($conn, $sqlt);
                                        $dataRe['token'] = $token;
                                        // $_SESSION['token']=$token;
                                        // header('location:../view/home.php');
                                    }
                                }
                                $output['code'] = '200';
                                $output['msg'] = $dataRe;
                                echo json_encode($output);
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
            }
        }
    }else{
        $output['code'] = '201';
        $output['msg'] = 'plzz endter your email!!';
        echo json_encode($output);
    }
?>