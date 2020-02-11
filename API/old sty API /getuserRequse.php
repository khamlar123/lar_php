<?php 
    include('connect.php');
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
                $sub['phone'] = $row["phone"]; 
                $sub['create'] = $row["create"]; 
                $sub['img'] = $row["img"]; 
                $sub['role'] = $row["role"]; 
                $sub['village'] = $row["village"]; 
                $sub['city'] = $row["City"];
                $sub['province'] = $row["Province"];
                $sub['password'] = $row["password"];
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
?>