<?php
    include("callAPI/call_getuserRequse.php");
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>HR</title>
    <link href="view/css/bootstrap.min.css" rel="stylesheet">
    <link href="view/css/font-awesome.min.css" rel="stylesheet">
    <link href="view/css/lightbox.css" rel="stylesheet"> 
    <link href="view/css/animate.min.css" rel="stylesheet"> 
	<link href="view/css/main.css" rel="stylesheet">
	<link href="view/css/responsive.css" rel="stylesheet">


    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="view/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="view/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="view/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="view/images/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>
	<header id="header">      
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div> 
                </div>
             </div>
        </div>
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="index.html">
                        <h1><img src="images/logo.png" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="home.php">ໜ້າຫຼັກ</a></li>
                        <li class="dropdown"><a href="#">ຈັດການຂໍ້ມູນພະນັກງານ<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="history.php">ກວດສອບການເຂົ້າວຽກ</a></li>
                                <li><a href="aboutus2.html">About 2</a></li>
                                <li><a href="service.html">Services</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="contact.html">Contact us</a></li>
                                <li><a href="contact2.html">Contact us 2</a></li>
                                <li><a href="404.html">404 error</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                            </ul>
                        </li>                    
                        <li class="dropdown active"><a href="blog.html">Blog <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a class="active" href="blog.html">Blog Default</a></li>
                                <li><a href="blogtwo.html">Timeline Blog</a></li>
                                <li><a href="blogone.html">2 Columns + Right Sidebar</a></li>
                                <li><a href="blogthree.html">1 Column + Left Sidebar</a></li>
                                <li><a href="blogfour.html">Blog Masonary</a></li>
                                <li><a href="blogdetails.html">Blog Details</a></li>
                            </ul>
                        </li>                      
                        <!-- <li><a href="shortcodes.html ">Shortcodes</a></li>   -->
                        <li><form action="../callAPI/call_logout.php" method="POST">
                         <input type="submit" value="ອອກຈາກລະບົບ" class="btn btn-common">  
                         </form> </li>                
                    </ul>
                </div>
                <div class="search">
                    <form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Search" name="Sname" id="myInput">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">ຄໍາຮ້ອງຂໍຂອງຜູ້ໃຊ້</h1>
                            <!-- <p>Blog with right sidebar</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>

<script src="view/js/jquery.min.js"></script>
<script type="text/javascript" src="view/js/jquery.dataTables.min.js"></script>



<table id="myTable" class="table table-striped" >  
        <thead>  
          <tr>  
            <tr><th><h3>ລະຫັດ</h3></th>
            <th><h3>ຮູບ</h3></th>
            <th><h3>ຊື່</h3></th>
            <th><h3>ນາມສະກຸນ</h3></th>
            <th><h3>ເມສ</h3></th>
            <th><h3>ລະຫັດ</h3></th>
            <th><h3>ເບີໂທະສັບ</h3></th>
            <th><h3>ວັນທີສະໝັກ</h3></th>
            <th><h3>ບ້ານ<h3></th>
            <th><h3>ເມືອງ</h3></th>
            <th><h3>ແຂວງ<h3></th>
            <th><h3>ສິດທິ</h3></th>
            <th><h3>ຄໍາເຫັນ</h3></th>
          </tr>  
        </thead>  
        <tbody> 
        <?php 
          foreach($json_userRequse['msg'] as $str => $data){ 
              if(is_array($data)){
        ?> 
          <tr>  
          <td> <?php echo $data['id'] ?></td>
                <td><?php echo "<a href='../img/".$data['img']."'  target='_blank'><img src='../img/".$data['img']."' style='width:50px; height:50px;'></a>" ?></td>
                <td><?php echo $data['name'] ?></td>
                <td><?php echo $data['lname'] ?></td>
                <td><?php echo $data['email'] ?></td>
                <td><?php echo $data['password'] ?></td>
                <td><?php echo $data['phone'] ?></td>
                <td><?php echo $data['create'] ?></td>
                <td><?php echo $data['village'] ?></td>
                <td><?php echo $data['city'] ?></td>
                <td><?php echo $data['province'] ?></td>
                <td><?php echo $data['role'] ?></td>
                <td><a href="../callAPI/call_ApprovedUser.php?id=<?php echo $data['id'] ?>&&name=<?php echo $data['name'] ?>&&img=<?php echo $data['img'] ?>&&
                &&lname=<?php echo $data['lname'] ?>&&email=<?php echo $data['email'] ?>&&password=<?php echo $data['password'] ?>&&phone=<?php echo $data['phone'] ?>
                &&create=<?php echo $data['create'] ?>&&village=<?php echo $data['village'] ?>&&city=<?php echo $data['city'] ?>&&province=<?php echo $data['province'] ?>
                &&role=<?php echo $data['role'] ?>&&adminname=<?php echo $_COOKIE["adminname"] ?>&&adminid=<?php echo $_COOKIE["adminid"] ?>
                &&token=<?php echo $_COOKIE["token"] ?>">ອານຸມັດ</a> |
                <a href="../callAPI/call_RejectUser.php?id=<?php echo $data['id'] ?>">ປະຕິເສດ</a></td>
          </tr>  
          <?php }}?>
        </tbody>  
      </table>  
</body>  
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>


<footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="images/home/under.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="testimonial bottom">
                        <h2>ຂໍ້ມູນແອັດມີນ</h2>
                        <div class="media">
                            <div class="pull-left">
                                <img src="../img/<?php echo $json_data['msg']['img']; ?>" style="width:100px; height:100px;"></a>
                            </div>
                            <div class="media-body">
                              Name:  <?php echo $json_data['msg']['name']; ?><br>
                               lastName: <?php echo $json_data['msg']['lname']; ?><br>
                             Create: <?php echo $json_data['msg']['createDate']; ?>
                                <h3><a href="#">Edit Profile</a></h3>
                            </div>
                        </div>   
                    </div> 
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="contact-info bottom">
                        <h2>ຂໍ້ມູນຕິດຕໍ່</h2>
                        <address>
                        E-mail: <a href="https://<?php echo $json_data['msg']['email'];?>"><?php echo $json_data['msg']['email'];  ?></a> <br> 
                        Phone: <?php echo $json_data['msg']['phone'];  ?><br> 
                   
                        </address>

                       
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-12">
                    <div class="contact-form bottom">
                    <h2>ທີຢູ່</h2>
                        <address>
                      <l> Provice:<l> <?php echo $json_data['msg']['Province'];?></br>
                      <l> City:<l> <?php echo $json_data['msg']['City'];?></br>
                       <l> Village:<l>  <?php echo $json_data['msg']['Village'];?>
                        </address>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p>&copy; Freeland All Rights Reserved.</p>
                        <p>Designed by <a target="_blank" href="https://www.facebook.com/kham.chanthavong.96?ref=bookmarks">Khamlar CHANTHAVONF</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->
    <script type="text/javascript" src="view/js/validation.js"></script>
    <script type="text/javascript" src="view/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="view/js/lightbox.min.js"></script>
    <script type="text/javascript" src="view/js/wow.min.js"></script>
    <script type="text/javascript" src="view/js/main.js"></script>   