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
            // die;
    if(mysqli_query($conn, $sql)){
        echo 'ok';
    }else{
        echo 'no';
    }
?>