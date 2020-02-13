
<?php

$target_dir = "/img";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// echo $target_file;
// $uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}


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
