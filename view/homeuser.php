<?php 
    include('../API/connect.php');
    $userid = $_COOKIE["userid"];
    if($_COOKIE["token"]==""){

        echo "<script>
        alert('plzz xxx!!');location='index.php';</script>";
    }else{   
        $sql = "SELECT * FROM `tb_user` where `userid`=$userid" ;
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
                // echo 'login now';
            //     echo $_COOKIE["adminid"];
            // echo $_COOKIE["adminname"];
            
            }
        }
?>  
 wellcom to the user home 

    <?php } ?>