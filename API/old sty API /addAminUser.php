<?php 
    include('connect.php');
    $data = array();
    $json = file_get_contents('php://input');
    $data = json_decode($json, TRUE);

    $aname = $data['adminname'];
    $alname = $data['adminlastname'];
    $email = $data['email'];
    $password = $data['password'];
    $p = password_hash($password, PASSWORD_DEFAULT);
    $address = $data['address'];
    date_default_timezone_set("Asia/Bangkok");
    $created=date("Y-m-d H:i:s");
    $mdate = '00:00:00';
    $phone = $data['phone'];
    $img = '';
    $token = '';

    $sql = "INSERT INTO `tb_admin`(`adminname`, `adminlastname`, `email`, `password`, `address`, `createDate`, `modifyDate`, `phone`, `img`, `token`) 
            VALUES ('$aname', '$alname', '$email', '$p', '$address', '$created', '$mdate', '$phone', '$img', '$token')";

            // echo $sql;

    if(mysqli_query($conn, $sql)){
       $output['code']='200';
       $output['msg']= $data;
       echo json_decode($output);
    }else{
        $output['code']='201';
        $output['msg']= 'addres ad min user error';
        echo json_decode($output);
    }
?>