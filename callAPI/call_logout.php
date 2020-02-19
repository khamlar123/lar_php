<?php 
    include('../API/connect.php');
     $token=$_COOKIE["token"];
     $historyid=$_COOKIE["hisid"];
    //  $adminid=$_COOKIE["adminid"];
         date_default_timezone_set("Asia/Bangkok");
         $logout=date("Y-m-d H:i:s");

         $sql ="UPDATE `tb_hitory` SET `logoutDate`='$logout' WHERE `id`=$historyid";

        //  echo $sql;
        //  die;
         if(mysqli_query($conn, $sql)){
            $telegamtoken = $_COOKIE["telegamtoken"];
            $telegamid = $_COOKIE["telegamidid"];

            if($telegamtoken =="" && $telegamid ==""){
                echo "<script>
             alert('are you sure logout?');location='../index.php';</script>";
            }else{
                $tokentelegram = $telegamtoken;
                $user_id = $telegamid;
                $mesg = 'ທ່ານອອກຈາກລະບົບ'.$logout;
                $data =[
                    'chat_id' => $user_id,
                    'text' => $mesg
                ]; 
                $url = 'https://api.telegram.org/bot'.$tokentelegram.'/sendMessage?'. http_build_query($data);
                file_get_contents($url);
            }

             setcookie( "token", "", time()- 60, "/","", 0);
             setcookie( "hisid", "", time()- 60, "/","", 0);
             setcookie( "adminid", "", time()- 60, "/","", 0);
             setcookie( "adminname", "", time()- 60, "/","", 0);
             setcookie( "userid", "", time()- 60, "/","", 0);
             setcookie( "username", "", time()- 60, "/","", 0);
             setcookie("telegamtoken", "", time()- 60, "/","", 0);
             setcookie("telegamidid",  "", time()- 60, "/","", 0);

         
          

             echo "<script>
             alert('are you sure logout?');location='../index.php';</script>";
            //  header("location:../view/index.php");
  
         }else{
            $output['code']='201';
            $output['msg']= 'logout error';
            echo json_encode($output);
             header("location:../view/404.php");
         }
?>