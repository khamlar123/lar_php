<?php 
    include('../API/connect.php');
        $data = array(

        );
        $ch = curl_init( 'http://localhost/my_project/API/getuserRequse.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $return = curl_exec($ch);
        $json_userRequse = json_decode($return, true);
        $curl_error = curl_error($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // echo json_encode($json_userRequse);
            // echo $json_userRequse['msg']['0']['name'];
?>



