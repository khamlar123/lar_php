<?php 
    include('connect.php');
    $data = array();
    $json = file_get_contents('php://input');
    $data = json_decode($json, TRUE);

//    echo json_encode($data);
//     die;

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
        // echo $name;
        // die;
        $sql = "INSERT INTO `tb_user`(`name`, `lastname`, `email`, `passowrd`, `phone`, `create`, `modifydate`, `img`, `token`, `role`, `adminApprovedDate`, `village`, `City`, `Province`, `adminApproved`)
         VALUES ('$name', '$lname', '$email', '$p', '$phone', '$create', '$modifydate', '$img', '$token', '$role', '$adminapp', '$village', '$city', '$province', '$adminname')";
        if(mysqli_query($conn, $sql)){
            $sql ="DELETE FROM `tb_userReques` WHERE `id`= $id";
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
?>