<?php 
    include('../API/connect.php');
    // echo $_COOKIE["token"];
	// session_start();
    // @$adminid=$_SESSION['adminid'];
    // echo'adminid'. $adminid;
    // @$historyid=$_SESSION['hisid'];
    // echo 'historyid'. $historyid;
    // @$token=$_SESSION['token'];
    // echo 'token'. $token."</br>";

    // setcookie( "token", "", time()- 60, "/","", 0);
    // die;
    // echo $_COOKIE["token"];
    // echo $_COOKIE["hisid"];
    // echo $_COOKIE["adminid"];
    // die;

    if($_COOKIE["token"]==""){

        echo "<script>
        alert('plzz login!!');location='index.php';</script>";
    }else{   
        $sql = "SELECT * FROM `tb_admin`" ;
        $res = mysqli_query($conn,$sql);
        if(mysqli_query($conn, $sql)){
            while($row = mysqli_fetch_array($res)){
                // $data['token'] = $row["token"];
                $checkToken = $row["token"];  
            }
            if($_COOKIE["token"] != $checkToken){
                echo "<script>
                alert('plaa login');location='index.php';</script>"; 
            }else{	
                echo 'login now';
            }
        }
  

?>

<h1>HALO</h1>
<form action="../API/logout.php" method="POST">
<input type="submit" value="logOut">
 </form>
<!-- <a href="http://localhost/my_project/API/logout.php">logout</a> -->

<?php 
    }
?>


