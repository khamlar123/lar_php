<?php 
    // include('../API/connect.php');
    // session_start();    
        // $adminid =$_POST['adminid'];
        // $token = $_POST['token'];

        $adminid = 3;

        // if($adminid && $token != ""){
        if($adminid != ""){
    	$data = array(
            "adminid" => $adminid
      
        );
        $ch = curl_init( 'http://localhost/my_project/API/getprofileadmin.php' );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $return = curl_exec($ch);
        $json_data = json_decode($return, true);
        $curl_error = curl_error($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // echo json_encode($json_data);

            // echo json_encode($data);
            // die;
            // echo $json_data['msg']['name'];


        }
//    mysqli_close();        
?>



