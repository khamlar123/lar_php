
<?php include('callAPI/call_getuser.php'); 
?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>

<button class="open-button" onclick="openForm()">Open Form</button>

<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Login</h1>
    <!-- select name -->
            <label for="psw"><b>User Name</b></label><br>
            <select name='userid' >
				<option value="">-- Select User Name --</option>
                    <?php 
                        foreach($json_user['msg'] as $str => $data){ 
                        if(is_array($data)){?>
                             <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
                    <?php }}?>
            </select><br>
     <!-- end select name -->

   <!-- select yera -->
            <label for="psw"><b>Yera</b></label>
            <select name="year" >
                <option value="">-- Select Year --</option>
                <?php 
                $datey = date("Y"); 
                $d = 2017;
                while($d <= $datey) {?>
                <option value="<?php echo $d;?>"><?php echo $d ;?></option>
                <?php $d++; }?>
            </select>
     <!-- end select yera -->

          <!-- select months -->
          <select name="months" >
                <option value="">-- Select Months --</option>
                <?php 
                $i=0;	
                for($i = 1; $i < 13; $i++) {
                    $i = str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                 <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php } ?>
            </select>
            <!-- end select months -->


            <!-- select day -->
            <select name="day" >
                <option value="">-- Select Months --</option>
                <?php 
                $i=0;	
                for($i = 1; $i < 32; $i++) {
                    $i = str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                 <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php } ?>
            </select>
            <!-- end select day -->

    <button type="submit" class="btn">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>




<?php



// $i=0;	
// for($i = 1; $i < 13; $i++) {
//     $i = str_pad($i, 2, '0', STR_PAD_LEFT);
// echo '<option value="'.$i.'">'.$i.'</option>';
// }

// for($x = 1; $x <= 12; $x++) {
//     $value = str_pad($x,2,"0",STR_PAD_LEFT);
//   echo $select_month_control.= '<option value="'.$value.'">'.$value.'</option>';
//   }

// include('API/connect.php');
//     $data = array();
//     $dataRe= array();
//     $json = file_get_contents('php://input');
//     $data = json_decode($json, TRUE);

//     $userid = $data['userid'];
//     $year =$data['year'];
//     $months = $data['months'];
//     $day = $data['day'];

//         if($userid !== ""){
//             $sql = "SELECT `name`, `lastname` FROM `tb_user` WHERE `userid` = $userid ";
//             $res = (mysqli_query($conn, $sql));
//             if(mysqli_query($conn, $sql)){
//                 while($row = mysqli_fetch_array($res)){
//                     $dataRe['username'] = $row["name"].$row["lastname"];
//                 }
//             }
//         }

// //         // year + months + day//
//             $ymd = $year."-".$months."-".$day;
//             $sql = "SELECT * FROM `tb_hitory` where `userId`= $userid and `loginDate` like '$ymd%'";
//             $res = (mysqli_query($conn, $sql));
//             if(mysqli_query($conn, $sql)){
//                 while($row = mysqli_fetch_array($res)){
//                     $sup = array();
//                     $sup['hisid'] = $row["id"];
//                     $sup['logindate'] = $row["loginDate"];
//                     $sup['logoutdate'] = $row["logoutDate"];
//                     // $sup['user'] = $row["userId"];
//                     $dataRe[] = $sup;
//                 }
//                 $output['code'] = '200';
//                 $output['msg'] = $dataRe;
//                 echo json_encode($output);
//             }else{
//                 $output['code'] = '201';
//                 $output['msg'] = 'error';
//                 echo json_encode($output);
//                 die;
//             }
        //end year + months + day//

        // year + months//
    //     if($s =="ym"){
    //     $ym = $year."-".$months;
    //     $sql = "SELECT * FROM `tb_hitory` where `userId`= $userid and `loginDate` like '$ym%'";
    //     // echo $sql;
    //     // die;
    //     $res = (mysqli_query($conn, $sql));
    //     if(mysqli_query($conn, $sql)){
    //         while($row = mysqli_fetch_array($res)){
    //             $sup = array();
    //             $sup['hisid'] = $row["id"];
    //             $sup['logindate'] = $row["loginDate"];
    //             $sup['logoutdate'] = $row["logoutDate"];
    //             $sup['user'] = $row["userId"];
    //             $dataRe[] = $sup;
               
    //         }
    //         $output['code'] = '200';
    //         $output['msg'] = $dataRe;
    //         echo json_encode($output);
    //     }else{
    //         $output['code'] = '201';
    //         $output['msg'] = 'error';
    //         echo json_encode($output);
    //     }
    // }
    // end  year + months//

    // year //
    // if($s =="y"){
        
    //     $sql = "SELECT * FROM `tb_hitory` where `userid`= $userid and `loginDate` like '$year%'";
    //     $res = (mysqli_query($conn, $sql));
    //     if(mysqli_query($conn, $sql)){
    //         while($row = mysqli_fetch_array($res)){
    //             $sup = array();
    //             $sup['hisid'] = $row["id"];
    //             $sup['logindate'] = $row["loginDate"];
    //             $sup['logoutdate'] = $row["logoutDate"];
    //             $sup['user'] = $row["userId"];
    //             $dataRe[] = $sup;
               
    //         }
    //         $output['code'] = '200';
    //         $output['msg'] = $dataRe;
    //         echo json_encode($output);
    //     }else{
    //         $output['code'] = '201';
    //         $output['msg'] = 'error';
    //         echo json_encode($output);
    //     }
    // }
    //end year//



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
