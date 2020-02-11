<?php 
        $api = 'getprofileadmin';
        $adminid = $_COOKIE["adminid"];
        $token = $_COOKIE["token"];
        if($adminid && $token != ""){
    	$data = array(
            "api" => $api,
            "adminid" => $adminid
        );
        $ch = curl_init( 'http://localhost/my_project/API/API.php' );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $return = curl_exec($ch);
        $json_data = json_decode($return, true);
        $curl_error = curl_error($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // echo json_encode($json_data)
            // echo json_encode($data);
            // die;
            // echo $json_data['msg']['name'];
        }else{
            echo "<script>
                alert('plzz login!!');location='../view/index.php';</script>";
        } 
?>



