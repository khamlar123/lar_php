<?php 
    include('connect.php');
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
                $dataRe['whatapps'] =$row['whatapps'];
            }
            $output['code'] = '200';
            $output['msg'] = $dataRe;
            echo json_encode($output);
            die;
        }else{
            $output['code'] = '201';
            $output['msg'] = 'errer show';
            echo json_encode($output);
        }
?>