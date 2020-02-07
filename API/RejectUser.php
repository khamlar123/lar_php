<?php 
    include('connect.php');
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
            }else{
            $output['code'] = '201';
            $output['msg'] = 'error';
            echo json_encode($output);
        }
    }
?>