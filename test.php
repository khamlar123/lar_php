
<?php
include('API/connect.php');
    $data = array();
    $dataRe= array();
    $json = file_get_contents('php://input');
    $data = json_decode($json, TRUE);

    $adminid = $data['adminid'];
    $year =$data['year'];
    $m = $data['months'];
    $date = $year."-".$m;

    // echo $date;
    // die;


        $sql = "SELECT * FROM `tb_hitory` where `adminid`= $adminid and `loginDate` like '$date%'";
        echo $sql;
        die;
        $res = (mysqli_query($conn, $sql));
        if(mysqli_query($conn, $sql)){
            while($row = mysqli_fetch_array($res)){
                $sup = array();
                $sup['hisid'] = $row["id"];
                $sup['logindate'] = $row["loginDate"];
                $sup['logoutdate'] = $row["logoutDate"];
                $sup['admin'] = $row["adminid"];
                $dataRe[] = $sup;
               
            }
            $output['code'] = '200';
            $output['msg'] = $dataRe;
            echo json_encode($output);
         

        }


// $target_dir = "/img";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// // echo $target_file;
// // $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//     if($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//         $uploadOk = 1;
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }


    // $lar = 2;
    
    // $var1 = 'test';
    // var_dump(isset($var1));

    
// class foo
// {
   
//     function do_foo()
//     {
//         $lar =$_POST['lar'];
//         // echo "Doing foo."; 
//         if($lar == "2"){
//             echo 'fuck';
//         }else{
//             echo 'sk';
//         }
//     }

//     function lol()
//     {
//         $kk = $_POST['kk'];
//         if($kk = "3"){
//             echo 'kkkk';
//         }else{
//             echo 'lllll';
//         }
//     }
// }

// $bar = new foo;
// $bar->do_foo();
// $l = new foo;
// $l->lol();

//test mobile or desktop play boawser//
// function isMobile () {
//   return is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"));
// }
// echo isMobile() ? "You are using a mobile device." : "You are on a desktop or laptop." ;
//end test mobile or desktop play boawser//

?>
