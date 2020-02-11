<?php 
    include('connect.php');
    $data = array();
    $dataRe = array();
    $json = file_get_contents('php://input');
    $data = json_decode($json, TRUE);

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

    // echo $sql;
    if(mysqli_query($conn, $sql)){
        // echo 'ok';
        $output['code'] = '200';
        $output['msg'] = $data;
        echo json_encode($output);
    }else{
        $output['code'] = '201';
        $output['msg'] = 'add user error';
        echo json_encode($output);
    }

?>