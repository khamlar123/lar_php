<?php  
include('connect.php');
$data = array();
$json = file_get_contents('php://input');
$data = json_decode($json, TRUE);


    if($data['api']=="getuserreques"){
        $data = array();
        // $dataRe = arrary();
        $json = file_get_contents('php://input');
        $data = json_decode($json, TRUE);

        $sql = "SELECT * FROM `tb_userReques`";
        $res = mysqli_query($conn, $sql);
        if(mysqli_query($conn, $sql)){
            while($row = mysqli_fetch_Array($res)){
                $sub = array();
                $sub['id'] = $row["id"]; 
                $sub['name'] = $row["name"]; 
                $sub['lname'] = $row["lname"]; 
                $sub['email'] = $row["email"]; 
                $sub['password'] = $row["password"];
                $sub['phone'] = $row["phone"]; 
                $sub['create'] = $row["create"]; 
                $sub['img'] = $row["img"]; 
                $sub['role'] = $row["role"]; 
                $sub['village'] = $row["village"]; 
                $sub['city'] = $row["City"];
                $sub['province'] = $row["Province"];
               
                $data[] = $sub;               
            }
            $output['code'] = '200';
            $output['msg'] = $data;
            echo json_encode($output);
            die;
        }else{
        $output['code'] = '201';
        $output['msg'] = 'error';
        echo json_encode($output);
        }
    }

    if($data['api']=="rejectuser"){
        $data = array();
        $json = file_get_contents('php://input');
        $data = json_decode($json, TRUE);
    
        $id = $data['id'];
    
        if($id!=""){
            $sql ="DELETE FROM `tb_userReques` WHERE `id`= $id";
                if(mysqli_query($conn, $sql)){
                    $output['code'] = '200';
                    $output['msg'] = $data;
                    echo json_encode($output);
                    die;
                }else{
                $output['code'] = '201';
                $output['msg'] = 'error';
                echo json_encode($output);
                die;
            }
        }
    }

    if($data['api']=="approveduser"){
        $data = array();
        $json = file_get_contents('php://input');
        $data = json_decode($json, TRUE);
    
            $id = $data['id'];
            $name = $data['name'];
            $lname = $data['lname'];
            $email = $data['email'];
            $password = $data['password'];
            $p = password_hash($password, PASSWORD_DEFAULT);
            $phone = $data['phone'];
            $create = $data['create'];
            $modifydate = '00:00:00';
            $img = $data['img'];
            $role = $data['role'];
            date_default_timezone_set("Asia/Bangkok");
            $adminapp=date("Y-m-d H:i:s");
            $village = $data['village'];
            $city = $data['city'];
            $province = $data['province'];
            $adminname = $data['adminname'];
            $token = '';
    
            $sql = "INSERT INTO `tb_user`(`name`, `lastname`, `email`, `password`, `phone`, `create`, `modifydate`, `img`, `token`, `role`, `adminApprovedDate`, `village`, `City`, `Province`, `adminApproved`)
             VALUES ('$name', '$lname', '$email', '$p', '$phone', '$create', '$modifydate', '$img', '$token', '$role', '$adminapp', '$village', '$city', '$province', '$adminname')";

            if(mysqli_query($conn, $sql)){
                $sql ="DELETE FROM `tb_userReques` WHERE `id`= $id";
                if(mysqli_query($conn, $sql)){
                    $output['code'] = '200';
                    $output['msg'] = $data;
                    echo json_encode($output);
                    die;
                }
                
            }else{
                $output['code'] = '201';
                $output['msg'] = 'approved user error';
                echo json_encode($output);
                die;
            }
    }

    if($data['api']=="getprofileadmin"){
        $dataRe = array();
        $data = array();
        $json = file_get_contents('php://input');
        $data = json_decode($json, TRUE);

        $adminId = $data['adminid'];
        $sql = "SELECT * FROM `tb_admin` WHERE `adminid` = $adminId";
        // echo $sql;
        // die;
        $res = mysqli_query($conn, $sql);
        if(mysqli_query($conn, $sql)){
            while($row = mysqli_fetch_array($res)){
                $dataRe['id'] = $row['adminid'];
                $dataRe['name'] = $row['adminname'];
                $dataRe['lname'] = $row['adminlastname'];
                $dataRe['email'] = $row['email'];
                $dataRe['createDate'] = $row['createDate'];
                $dataRe['phone'] = $row['phone'];
                $dataRe['img'] = $row['img'];
                $dataRe['Village'] = $row['village'];
                $dataRe['City'] = $row['City'];
                $dataRe['Province'] = $row['Province'];
            
            }
            $output['code'] = '200';
            $output['msg'] = $dataRe;
            echo json_encode($output);
            die;
        }else{
            $output['code'] = '201';
            $output['msg'] = 'errer show';
            echo json_encode($output);
            die;
        }
    }

    if($data['api']=="login"){
        $data = array(); //get input data
        $dataRe = array(); //send result data
        $json = file_get_contents('php://input');
        $data = json_decode($json, TRUE);
    
        $password = $data['password'];
        $email = $data['email'];
        date_default_timezone_set("Asia/Bangkok");
        $login=date("Y-m-d H:i:s");
    
        if($email!=""){
            // $sql = "SELECT * FROM `tb_admin` WHERE `email`='$email' or `adminname`='$email'" ; user email or user name  for login
            $sql = "SELECT * FROM `tb_admin` WHERE `email`='$email'" ;
            $res = mysqli_query($conn,$sql);
            if(mysqli_query($conn, $sql)){
                while($row = mysqli_fetch_array($res)){
                    $dataRe['id'] = $row["adminid"];
                    $dataRe['name'] = $row["adminname"];
                    $dataRe['telegramToken'] = $row["telegramtoken"];
                    $dataRe['telegramid'] = $row["telegramid"];
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
                      
                    }
                }else{
                    $output['code'] = '201';
                    $output['msg'] = 'error no have email';
                    echo json_encode($output);
                    die;
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
    }

    if($data['api'] == "register"){
        $data = array();
        $dataRe = array();
        $json = file_get_contents('php://input');
        $data = json_decode($json, TRUE);

        // var_dump($data);
        // die;
        $name = $data['name'];
        $lname = $data['lname'];
        $email = $data['email'];
        $password = $data['password'];
        $phone = $data['phone'];
        date_default_timezone_set("Asia/Bangkok");
        $create=date("Y-m-d H:i:s");
    
        $img = $data['img'];
        $role = $data['role'];
        $village = $data['village'];
        $city = $data['city'];
        $provice = $data['province'];
        
        $sql ="INSERT INTO `tb_userReques`(`name`, `lname`, `email`, `password`, `phone`,  `create`, `img`, `role`, `Village`, `City`, `Province`)
                 VALUES ('$name', '$lname', '$email', '$password', '$phone',  '$create', '$img', '$role', '$village', '$city', '$provice')";
               
        if(mysqli_query($conn, $sql)){
            // echo 'ok';
            // die;
            $output['code'] = '200';
            $output['msg'] = $data;
            echo json_encode($output);
            // echo 'lol';
            // die;
           
        }else{
            $output['code'] = '201';
            $output['msg'] = 'add user error';
            echo json_encode($output);
        }
    }

    if($data['api'] == "addadminuser"){
        $data = array();
        $json = file_get_contents('php://input');
        $data = json_decode($json, TRUE);

        $aname = $data['adminname'];
        $alname = $data['adminlastname'];
        $email = $data['email'];
        $password = $data['password'];
        $p = password_hash($password, PASSWORD_DEFAULT);
        date_default_timezone_set("Asia/Bangkok");
        $created=date("Y-m-d H:i:s");
        $mdate = '00:00:00';
        $phone = $data['phone'];
        $img = $data['img'];
        $token = '';
        $village = $data['village'];
        $city = $data['city'];
        $province = $data['province'];
        $whatapps = $data['telegramnumber'];
        $telegramtoken = $data['telegramtoken'];
        $telegramid = $data['telegramid'];

        $sql = "INSERT INTO `tb_admin`(`adminname`, `adminlastname`, `email`, `password`, `createDate`, `modifyDate`, `phone`, `img`, `token`, `village`, `city`, `province`, `telegramnumber`,`telegramtoken`,`telegramid`) 
                VALUES ('$aname', '$alname', '$email', '$p', '$created', '$mdate', '$phone', '$img', '$token', '$village', '$city', '$province', '$telegramnumber','$telegramtoken','$telegramid')";

                // echo $sql;

        if(mysqli_query($conn, $sql)){
            $output['code']='200';
            $output['msg']= $data;
            echo json_encode($output);
            die;
        }else{
            $output['code']='201';
            $output['msg']= 'addres ad min user error';
            echo json_encode($output);
            die;
        }
    }   

    if($data['api'] == "gethistory"){
        $data = array();
        $dataRe= array();
        $json = file_get_contents('php://input');
        $data = json_decode($json, TRUE);
    
        $userid = $data['userid'];
        $year =$data['year'];
        $months = $data['months'];
        $day = $data['day'];

        // echo $day;
        // echo json_encode($data);
        // die;
    
            if($userid !== ""){
                $sql = "SELECT `name`, `lastname` FROM `tb_user` WHERE `userid` = $userid ";
                $res = (mysqli_query($conn, $sql));
                if(mysqli_query($conn, $sql)){
                    while($row = mysqli_fetch_array($res)){
                        $dataRe['username'] = $row["name"].$row["lastname"];
                    }
                }
            }
            // year + months + day//
                $ymd = $year."-".$months."-".$day;
                $sql = "SELECT * FROM `tb_hitory` where `userId`= $userid and `loginDate` like '$ymd%'";
                // echo $sql;
                // die;
                $res = (mysqli_query($conn, $sql));
                if(mysqli_query($conn, $sql)){
                    while($row = mysqli_fetch_array($res)){
                        $sup = array();
                        $sup['hisid'] = $row["id"];
                        $sup['logindate'] = $row["loginDate"];
                        $sup['logoutdate'] = $row["logoutDate"];
                        $dataRe[] = $sup;
                  
                    }
                    $output['code'] = '200';
                    $output['msg'] = $dataRe;
                    echo json_encode($output);
                }else{
                    $output['code'] = '201';
                    $output['msg'] = 'error';
                    echo json_encode($output);
                    die;
                }
            //end year + months + day//
    }

    if($data['api']=="getuser"){
        $data = array();
        // $dataRe = arrary();
        $json = file_get_contents('php://input');
        $data = json_decode($json, TRUE);

        $sql = "SELECT * FROM `tb_user`";
        $res = mysqli_query($conn, $sql);
        if(mysqli_query($conn, $sql)){
            while($row = mysqli_fetch_Array($res)){
                $sub = array();
                $sub['id'] = $row["userid"]; 
                $sub['name'] = $row["name"]; 
         
               
                $data[] = $sub;               
            }
            $output['code'] = '200';
            $output['msg'] = $data;
            echo json_encode($output);
            die;
        }else{
        $output['code'] = '201';
        $output['msg'] = 'error';
        echo json_encode($output);
        }
    }

    if($data['api']=="ApproveProject"){
        $data =array();
        $json = file_get_contents('php://input');
        $data = json_decode($json, TRUE);

        $id = $data['id'];
        $adminname =$data['adminName'];
        $name = $data['name'];
        $note = $data['note'];
        $date = $data['date'];
        $user = $data['user'];
        date_default_timezone_set("Asia/Bangkok");
        $created=date("Y-m-d H:i:s");




        $sql = "INSERT INTO `tb_project`(`p_id`, `p_name`, `p_note`, `username`, `createDate`, `approveBy`, `approveDate`)
         VALUES ($id,'$name','$note','$user','$date','$adminname','$created')";
        if(mysqli_query($conn, $sql)){
            $sql = "DELETE FROM `tb_projectReques` WHERE `p_id`= $id";
            if(mysqli_query($conn, $sql)){
                $output['code'] = '200';
                $output['msg'] = $data;
                echo json_encode($output);
            }
         
           
        }else{
            $output['code'] = '201';
            $output['msg'] = 'error';
            echo json_encode($output);
        }

        // $sql = "UPDATE `tb_project` SET `status`=1,`approveBy`='$adminname' WHERE `p_id`=$id";
        // // $sql = "UPDATE `tb_project` SET `status`=1 WHERE `p_id`=$id";
        // $res = (mysqli_query($conn, $sql));
        // if(mysqli_query($conn, $sql)){
        //     $output['code'] = '200';
        //     $output['msg'] = $data;
        //     echo json_encode($output);
        // }else{
        //     $output['code'] = '201';
        //     $output['msg'] = 'error';
        //     echo json_encode($output);
        // }
    }

    if($data['api']== "getProjectReques"){
        $data = array();
        $json = file_get_contents('php://input');
        $data = json_decode($json, TRUE);

        $sql ="SELECT * FROM tb_projectReques";
        $res = mysqli_query($conn, $sql);
        if(mysqli_query($conn, $sql)){
            while($row = mysqli_fetch_Array($res)){
                $sub = array();
                $sub['p_id'] = $row[0]; 
                $sub['p_name'] = $row[1];
                $sub['p_note'] = $row[2];
                $sub['username'] = $row[3];
                $sub['createDate'] = $row[4];
            
                $data[] = $sub;   
                // echo 'subbbbb',$sub;
                // die;            
            }
            $output['code'] = '200';
            $output['msg'] = $data;
            echo json_encode($output);
            die;
        }else{
            $output['code'] = '201';
            $output['msg'] = 'error';
            echo json_encode($output);
        }
    }

    if($data['api']== "RejecProject"){
        $data = array();
        $json = file_get_contents('php://input');
        $data = json_decode($json, TRUE);
    
        $id = $data['id'];
    
        if($id!=""){
            $sql ="DELETE FROM `tb_project` WHERE `p_id`= $id";
                if(mysqli_query($conn, $sql)){
                    $output['code'] = '200';
                    $output['msg'] = $data;
                    echo json_encode($output);
                    die;
                }else{
                $output['code'] = '201';
                $output['msg'] = 'error';
                echo json_encode($output);
                die;
            }
        }
    }

    if($data['api']== "addProject"){
        $data = array();
        $json = file_get_contents('php://input');
        $data = json_decode($json, TRUE);

        $p_name = $data['p_name'];
        $p_note = $data['p_note'];
        $username = $data['username'];
        date_default_timezone_set("Asia/Bangkok");
        $created=date("Y-m-d H:i:s");
        
            $sql ="INSERT INTO `tb_projectReques`( `p_name`, `p_note`, `username`, `createDate`) 
            VALUES ('$p_name','$p_note','$username','$created')";
     if(mysqli_query($conn,$sql)){
        $output['code'] = '200';
        $output['msg'] = $data;
        echo json_encode($output);
        die;
     }else{
        $output['code'] = '201';
        $output['msg'] = 'error';
        echo json_encode($output);
        die;
     }

    }
?>
