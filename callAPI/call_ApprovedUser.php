<?php 
    include('../API/connect.php');
    $api = 'approveduser';
    $id = $_POST['id'];
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $create = $_POST['create'];
    $village = $_POST['village'];
    $city = $_POST['city'];
    $img = $_POST['img'];
    $province = $_POST['province'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $adminname = $_POST['adminname'];
    $adminid = $_POST['adminid'];
    $token = $_POST['token'];

    //check token//
    if($token!=""){
            $sql = "SELECT * FROM `tb_admin` where `adminid`= $adminid" ;
            $res = mysqli_query($conn,$sql);
            if(mysqli_query($conn, $sql)){
                while($row = mysqli_fetch_array($res)){
                    $checkToken = $row["token"];  
                    if($checkToken !=  $token){
                        echo 'check'.$checkToken;
                        echo 'token'.$token;
                        die;
                    }
                }
            }
    }
    //end check token//

    $data = array(
        "api" => $api,
        "id" => $id,
        "name" => $name,
        "lname" => $lname,
        "email" => $email,
        "phone" => $phone,
        "create" => $create,
        "village" => $village,
        "city" => $city,
        "img"=> $img,
        "province" => $province,
        "password" => $password,
        "role" =>$role,
        "adminname" => $adminname,
        "token"=>$token,
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
           echo "alert('Approved User comple');location='../view/home.php'";
        echo"</script>";
    }else{
        echo "<script>
        alert('Approved User Error');location='../view/home.php'
       </script>";
    }

?>