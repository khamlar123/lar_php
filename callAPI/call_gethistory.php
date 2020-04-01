 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>HR</title>
    <link href="../view/css/bootstrap.min.css" rel="stylesheet">
    <link href="../view/css/font-awesome.min.css" rel="stylesheet">
    <link href="../view/css/prettyPhoto.css" rel="stylesheet"> 
    <link href="../view/css/animate.min.css" rel="stylesheet"> 
	<link href="../view/css/main.css" rel="stylesheet">
	<link href="../view/css/responsive.css" rel="stylesheet">     
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../view/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../view/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../view/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../view/images/ico/apple-touch-icon-57-precomposed.png">

    <script>
		function printContent(el){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML =restorepage;
        }
    </script>
</head><!--/head-->

<header id="header">      
    <a id="printbtn" href="../view/history.php" style="text-align: left; margin-left:10px;" ><span class="glyphicon glyphicon-home"></span class="fa fa-search" ></a>
    <div class="search">
        <a id="printbtn" onclick="printContent('prin')" style=" margin-right:10px;"><span class="glyphicon glyphicon-print"></span > </a>
    </div>
</header>

<?php 
    if(isset($_POST['userid'])==""){
    }else{
        $api = "gethistory";
        $userid = $_POST['userid'];
        $y = $_POST['year'];
        $m = $_POST['months'];
        $d = $_POST['day'];
        $data = array(
            "api"=>$api,
            "year"=>$y,
            "months"=>$m,
            "day"=>$d,
            "userid"=>$userid
        );
    }
        $ch = curl_init( 'http://localhost/my_project/API/API.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $return = curl_exec($ch);
        $json_his = json_decode($return, true);
        $curl_error = curl_error($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if($json_his ['code'] !=="200"){
	
                    echo "<center><h3>ກະລູນາເລືອກລາຍຊື່ພະນັກງານກ່ອນ</h3></center>";
                    die;
                } 
                else{
                    $number = 1;
                    foreach($json_his['msg']as $str => $data):
                        if(is_array($data)){
                             echo "<body id='prin'>
                                        <div class='col-sm-6 col-md-3'> 
                                            <div class='panel panel-info'>
                                                <div class='panel-heading'><h2>".$json_his['msg']['username']."</h2></div>
                                                    <div class='panel-body'>
                                                        <ul>
                                                            <li>ລໍາດັບ:".$number++."</li>
                                                            <li>ວັນທີ:".$data['logindate'] = date('F j, Y')."</li>
                                                            <li>".$data['logindate'] ."<span><i class='fa fa-check'></i></span></li>
                                                            <li>".$data['logoutdate'] ."<span><i class='fa fa-times'></i></span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </body>";
                            }
                    endforeach; 
                }
               
?>
