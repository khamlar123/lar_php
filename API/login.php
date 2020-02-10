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
                                    }
                                }
                                $output['code'] = '200';
                                $output['msg'] = $dataRe;
                                echo json_encode($output);
                                die;
                            } 
                        }
                        //end get history id
                    }else{
                        $output['code'] = '201';
                        $output['msg'] = 'login error';
                        echo json_encode($output);
                        die;
                    }
                    //end save date in to hitory
                }else{
                    $output['code'] = '201';
                    $output['msg'] = 'check your password';
                    echo json_encode($output);
                    die;
                }
                //end check password
            }
        }
        if($email !=""){
            $sql = "SELECT * FROM `tb_user` WHERE `email`='$email'" ;
            $res = mysqli_query($conn,$sql);
            if(mysqli_query($conn,$sql)){
                while($row = mysqli_fetch_array($res)){
                    $dataRe['userid'] = $row["userid"];
                    $dataRe['username'] = $row["name"];
                    $pass = $row["password"];
                    $userid = $row["userid"];

                    // echo $userid;
                    if (password_verify($password, $pass)) {
                        $sql = "INSERT INTO `tb_hitory`(`loginDate`, `logoutDate`, `text`, `userId`, `adminId`) 
                        VALUES ('$login', '00:00:00', 'null', '$userid', '0')";
                        if(mysqli_query($conn, $sql)){

                            if($login!=""){
                                $sql = "SELECT * FROM `tb_hitory` WHERE `loginDate`='$login'" ;
                                $res = mysqli_query($conn,$sql);
                                if(mysqli_query($conn, $sql)){
                                    while($row = mysqli_fetch_array($res)){
                                        $dataRe['historyid'] = $row["id"];    
                                        if($userid !=""){
                                            $token = password_hash($password.$email, PASSWORD_DEFAULT);
                                            $sqlt = "UPDATE `tb_user` SET `token`='$token' WHERE `userid`= $userid";
                                            $rest = mysqli_query($conn, $sqlt);
                                            $dataRe['token'] = $token;
                                        }
                                    }
                                    $output['code'] = '200 user';
                                    $output['msg'] = $dataRe;
                                    echo json_encode($output);
                                    die;
                                } 
                            }
                        }
                    }

                    die;  
                }
            }else{
                echo 'xxx';
            }
           
        }

        // $output['code'] = '201';
        // $output['msg'] = 'plz check your email';
        // echo json_encode($output);
        // die;
    }
    $output['code'] = '201';
    $output['msg'] = 'error no have email';
    echo json_encode($output);
    die;
?>