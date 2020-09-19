<?php 
    include('../API/connect.php');
    $api = 'ApproveProject';
    $id = $_GET['id'];
    $name = $_GET['p_name'];
    $note = $_GET['p_note'];
    $user = $_GET['username'];
    $date = $_GET['createDate'];
    $token = $_COOKIE["token"];
    $adminName =  $_COOKIE["adminname"];
    $adminid = $_COOKIE["adminid"];
    // echo $adminid;
    // die;

    //check token//
    if($token!=""){
        $sql = "SELECT * FROM `tb_admin` where `adminid`= $adminid";
        $res = mysqli_query($conn,$sql);
        if(mysqli_query($conn, $sql)){
            while($row = mysqli_fetch_array($res)){
                $checkToken = $row["token"];  
                if($checkToken !=  $token){
                    echo "<script>
                            alert('Approved User Error');location='../view/home.php'
                          </script>";
                    die;
                }
            }
        }
}
//end check token//

    $data = array(
        "api" => $api,
        "id" => $id,
        "adminName" => $adminName,
        "name" => $name,
        "note" =>$note,
        "user" => $user,
        "date" => $date,
     
    );

    // var_dump ($data);
    // die;

    $ch = curl_init( 'http://localhost/my_project/API/API.php' );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    $return = curl_exec($ch);
    $json_AP = json_decode($return, true);
    $curl_error = curl_error($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    // echo json_encode($json_AP);
    // echo $json_AP ;
    if($json_AP['code']=="200"){
        echo "<script>";
        echo "alert('Approved Project comple');location='../view/project.php'";
     echo"</script>";
 }else{
     echo "<script>
     alert('Approved Project Error');location='../view/project.php'
    </script>";
 }
?>