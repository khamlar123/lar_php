
<?php 
 include('../API/connect.php');
// include('../callAPI/call_getuser.php'); 
  include('../callAPI/call_getprofileadmin.php');
  include('../callAPI/call_getProjectReques.php');

  $adminid = $_COOKIE["adminid"];
  if($_COOKIE["token"]==""){
      echo "<script>
      alert('plzz login!!');location='index.php';</script>";
  }else{   
      $sql = "SELECT * FROM `tb_admin` where `adminid`= $adminid ";
      $res = mysqli_query($conn,$sql);
      if(mysqli_query($conn, $sql)){
          while($row = mysqli_fetch_array($res)){
              $checkToken = $row["token"];  
          }
          if($_COOKIE["token"] != $checkToken){
              echo "<script>
              alert('plaa login');location='index.php';</script>"; 
          }
      }
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>HR</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet"> 
    <link href="css/animate.min.css" rel="stylesheet"> 
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">    
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
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
                        <li><a href="home.php">Home</a></li>
                        <li class="dropdown"><a href="#">Pages <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="history.php">History Login</a></li>
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
                        <li class="dropdown"><a href="portfolio.html">Portfolio <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="portfolio.html">Portfolio Default</a></li>
                                <li><a href="portfoliofour.html">Isotope 3 Columns + Right Sidebar</a></li>
                                <li><a href="portfolioone.html">3 Columns + Right Sidebar</a></li>
                                <li><a href="portfoliotwo.html">3 Columns + Left Sidebar</a></li>
                                <li><a href="portfoliothree.html">2 Columns</a></li>
                                <li><a href="portfolio-details.html">Portfolio Details</a></li>
                            </ul>
                        </li>                         
                        <li><form action="../callAPI/call_logout.php" method="POST">
                         <input type="submit" value="logout" class="btn btn-common">  
                         </form> </li>                
                    </ul>
                </div>
                <div class="search">
                    <form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Search">
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
                            <h1 class="title">ໂປແຈັກ</h1>
                            <!-- <p>Blog with right sidebar</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#page-breadcrumb-->

    <!-- body -->

<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>

<table id="myTable" class="table table-striped" >
        <thead>  
          <tr>  
            <tr><th><h3>ລະຫັດ</h3></th>
            <th><h3>ຊື່</h3></th>
            <th><h3>ລາຍລະອຽດ</h3></th>
            <th><h3>ສະມາຊິກທີມ</h3></th>
            <th><h3>ວັນທີສ້າງ</h3></th>
          </tr>  
        </thead> 
    <tbody> 
        <?php 
            //  var_dump ($json_Pj['msg']);
            //  echo $json_Pj['msg'][0]['p_name'];
            foreach($json_Pj['msg'] as $str => $data){ 
                if(is_array($data)){
        ?>
            <tr> 
                <td> <?php echo $data['p_id'] ?></td>
                <td><?php echo $data['p_name'] ?></td>
                <td><?php echo $data['p_note'] ?></td>
                <td><?php echo $data['username'] ?></td>
                <td><?php echo $data['createDate'] ?></td>
                <td><a href="../callAPI/call_ApproveProject.php?id=<?php echo $data['p_id'] ?>&&p_name=<?php echo $data['p_name'] ?>
                &&p_note=<?php echo $data['p_note'] ?>&&username=<?php echo $data['username'] ?>&&createDate=<?php echo $data['createDate'] ?>">ອານຸມັດ</a> |
                <a href="../callAPI/call_RejectProject.php?id=<?php echo $data['p_id'] ?>">ປະຕິເສດ</a></td>
            </tr>  
            <?php 
                    }}
            ?>
    </tbody>  
</table>  
</body>
    <!-- end body -->
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
                        <h2>Testimonial</h2>
                        <div class="media">
                            <div class="pull-left">
                                <a href="#"><img src="images/home/profile1.png" alt=""></a>
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
                        <h2>Contacts</h2>
                        <address>
                        E-mail: <a href="https://<?php echo $json_data['msg']['email'];?>"><?php echo $json_data['msg']['email'];  ?></a> <br> 
                        Phone: <?php echo $json_data['msg']['phone'];  ?><br> 
                        Whatapps: <?php echo $json_data['msg']['whatapps'];  ?>
                        </address>

                       
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="contact-form bottom">
                    <h2>Address</h2>
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


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>   

</html>

<?php 
    }
?>