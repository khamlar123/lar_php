<?php 
    include('../API/connect.php');
	session_start();
    @$adminid=$_SESSION['adminid'];
    // echo'adminid'. $adminid;
    @$historyid=$_SESSION['hisId'];
    // echo 'historyid'. $historyid;
    @$token=$_SESSION['token'];
    // echo 'token'. $token."</br>";

    if($token ==""){
        echo "<script>
        alert('ກະລຸນາ login ກ່ອນເພື່ອເຂົ້າສູລຸບົບ');location='../API/login.php';</script>";
    }else{   
        $sql = "SELECT * FROM `tb_admin`" ;
        $res = mysqli_query($conn,$sql);
        if(mysqli_query($conn, $sql)){
            while($row = mysqli_fetch_array($res)){
                // $data['token'] = $row["token"];
                $checkToken = $row["token"];  
            }
            if($token != $checkToken){
                echo "<script>
                alert('ກະລຸນາ login ກ່ອນເພື່ອເຂົ້າສູລຸບົບ');location='../API/login.php';</script>";
            }else{	
                echo 'login now';
            }
        }
  
?>

<h1>HALO</h1>

<?php 
    }
?>


