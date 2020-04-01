<?php 
    include('../API/connect.php');
    // session_start();   
        $api = 'login';
        $email =$_POST['email'];
        $password =$_POST['password'];
        date_default_timezone_set("Asia/Bangkok");
        $date=date("Y-m-d H:i:s");


        if($email !=""){
    	$data = array(
            "api" => $api,
            "email" => $email,
            "password" => $password,

        );
        // echo json_encode($data);
        // die;
        $ch = curl_init( 'http://localhost/my_project/API/API.php' );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $return = curl_exec($ch);
        $json_data = json_decode($return, true);
        $curl_error = curl_error($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // echo json_encode($json_data);
            //  echo  $json_data['msg']['telegramid'];
            // die;

           
            
        //     echo $_SESSION['token'];
       
            if($json_data['code'] == '200'){
                setcookie("adminid", $json_data['msg']['id'], time()+ (86400 * 30), "/","", 0);
                setcookie("adminname", $json_data['msg']['name'], time()+ (86400 * 30), "/","", 0);
                setcookie("token", $json_data['msg']['token'], time()+ (86400 * 30), "/","", 0); 
                setcookie("hisid", $json_data['msg']['historyid'], time()+ (86400 * 30), "/","", 0);
                setcookie("telegamtoken", $json_data['msg']['telegramToken'], time()+ (86400 * 30), "/","", 0); 
                setcookie("telegamidid", $json_data['msg']['telegramid'], time()+ (86400 * 30), "/","", 0);
                $telegamtoken = $json_data['msg']['telegramToken'];
                $telegamid = $json_data['msg']['telegramid'];
                if($telegamtoken =="" && $telegamid ==""){
                    header('location:../view/home.php');
                }else{
                    $tokentelegram = $telegamtoken;
                    $user_id = $telegamid;
                    $mesg = 'ທ່ານເຂົ້າສູລະບົບ'.$date;
                    $data =[
                        'chat_id' => $user_id,
                        'text' => $mesg
                    ]; 
                    $url = 'https://api.telegram.org/bot'.$tokentelegram.'/sendMessage?'. http_build_query($data);
                    file_get_contents($url);
                    // echo $url;
                    // die;
                    header('location:../view/home.php');
                }
                //end send message to telegram//
               
            }elseif($json_data['code']=='200 user'){
                setcookie("userid", $json_data['msg']['userid'], time()+ (86400 * 30), "/","", 0);
                setcookie("username", $json_data['msg']['username'], time()+ (86400 * 30), "/","", 0);
                setcookie("token", $json_data['msg']['token'], time()+ (86400 * 30), "/","", 0); 
                setcookie("hisid", $json_data['msg']['historyid'], time()+ (86400 * 30), "/","", 0);

                // $token = "1059536392:AAFGBhW9h7dXHPbH-nbzmr7PIzsowBvRYXc";
                // $user_id= 1020975496;
                // $mesg = 'have login';
                // $request_params =[
                //     'chat_id' => $user_id,
                //     'text' => $mesg
                // ]; 
                // $request_url = 'https://api.telegram.org/bot'.$token.'/sendMessage?'. http_build_query($request_params);
                // file_get_contents($request_url);

                header('location:../view/homeuser.php');
            }else{
                echo "<script>
                alert('ກະລຸນາກວດສອບ email ຫຼື passowrd!!');location='../view/index.php';
                </script>";
                // $_SESSION['token']=$json_data['msg']['token'];
                // $_SESSION['hisid']=$json_data['msg']['historyid'];
                // $_SESSION['adminid']=$json_data['msg']['adminid'];
            }
              // echo $json_data['msg']['pass'];
              die;
        }else{
                echo "<script>
                alert('ກະລຸນາປ້ແນ email!!');location='../view/index.php';
                </script>";
        }
//    mysqli_close();
        
            
?>



