<?php 
    include('connect.php');
    $data = array();
    $dataRe = array();
    $json = file_get_contents('php://input');
    $data = json_decode($json, TRUE);

    $name = $data['name'];
    $lname = $data['lname'];
    $email = $data['email'];
    $phone = $data['phone'];
    $address = $data['address'];
    date_default_timezone_set("Asia/Bangkok");
    $create=date("Y-m-d H:i:s");
    $modifydate = $data['modifydata'];
    $img = $data['img'];
    $role = $data['role'];

    $sql ="INSERT INTO `tb_userReques`(`name`, `lname`, `email`, `phone`, `address`, `create`, `modifydate`, `img`, `role`)
             VALUES ('$name', '$lname', '$email', '$phone', '$address', '$create', '$modifydate', '$img', '$role')";

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