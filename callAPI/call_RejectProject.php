<?php 
    $api = 'RejecProject';
    $id = $_GET['id'];
    $data = array(
        "api" => $api,
        "id" => $id,
    );
    $ch = curl_init( 'http://localhost/my_project/API/API.php' );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    $return = curl_exec($ch);
    $json_REU = json_decode($return, true);
    $curl_error = curl_error($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    // echo json_encode($json_REU);
    // echo $json_REU['msg']['name'];
    // die;
    if($json_REU['code']=="200"){
        echo "<script>";
           echo "alert('Reject Project comple');location='../view/project.php'";
        echo"</script>";
    }else{
        echo "<script>
        alert('Reject Project Error');location='../view/project.php'
       </script>";
    }
?>