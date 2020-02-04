<?php 
    include('connect.php');
    $token=$_COOKIE["token"];
    $historyid=$_COOKIE["hisid"];
    $adminid= $_COOKIE["adminid"];
    	// session_start();
        // $_SESSION['token'];
        // @$historyid=$_SESSION['hisid'];
        // echo $historyid;
        // die;
        // @$adminid=$_SESSION['adminid'];
        date_default_timezone_set("Asia/Bangkok");
        $logout=date("Y-m-d H:i:s");
        $sql ="UPDATE `tb_hitory` SET `logoutDate`='$logout' WHERE `id`=$historyid";
        // echo $sql;
        if(mysqli_query($conn, $sql)){
            // session_unset();//ໃຫ້ລືມ session ຫຼື ຊື່ ທີ່ມານຳໃຊ້ໃນເວບຂອງເຮົາ
            setcookie( "token", "", time()- 60, "/","", 0);
            setcookie( "hisid", "", time()- 60, "/","", 0);
            setcookie( "adminid", "", time()- 60, "/","", 0);
            header("location:../view/index.php");

            // function isMobile () {
            //     return is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"));
            //   }
            //   echo isMobile() ? "You are using a mobile device." : "You are on a desktop or laptop." ;
            //   /* If you are redirecting the user to a mobile page, it is as simple as*/
            //   if (isMobile()) {
            //     header("Location: ../view/index.php");
            //   } 
        }else{
            echo 'logout error';
            header("location:../view/404.php");
        }

    
?>