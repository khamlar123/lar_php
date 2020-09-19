<?php
include('connect.php');
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
            // $output['code'] = '200';
            // $output['msg'] = $data;
            echo json_encode(['data'=>$data]);
            // echo json_encode(['data'=>$cars]);
            // die;
        }else{
          http_response_code(404);
        }

        ?>