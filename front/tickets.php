<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<?php       include "../connect.php";


 ?>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/jquery.countdown.css" rel="stylesheet" type="text/css" media="all" />

<link href="../css/w3w.css" rel="stylesheet" type="text/css"  />

<script src="../sm/papa/sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="../sm/papa/sweetalert2.css">



<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="js/jquery.countdown.js"></script>
<script src="js/script.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="SONGLILY Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.useso.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
<script src="js/hover_pack.js"></script>
  <script src="js/jquery.chocolat.js"></script>


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">







    <link rel="stylesheet" href="css/chocolat.css" type="text/css" media="all" />
    <!--light-box-files -->
    <script type="text/javascript" charset="utf-8">
      $(function() {
        $('#example1 a').Chocolat();
      });
    </script>
</head>
<body>
    <div class="w3w-container">
  <div id="id01" class="w3w-modal" style="background-color: rgba(0,0,0,0.9);position: fixed;z-index: 99999;">
    <div class="w3w-modal-content w3w-card-4 w3w-animate-zoom" style="max-width:60%;" >

      <div class="row" style="margin:0px;background-color: #2196F3; color:white;">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3w-button w3w-xlarge w3w-hover-red w3w-display-topright" title="Close Modal">&times;</span>
        <div class="col-md-12"><center><img src="images/logo.png" height="300" width="300" ></center></div>

   <!--      <div class="col-md-8">
        
            <br>
            <br>
            <br><center><h1 >CONCERT</h1></center></div> -->


      </div>

      <form class="w3w-container" action="index.php" method="post">
        <div class="w3w-section">
          <label><b>Username</b></label>
          <input class="w3w-input w3w-border w3w-margin-bottom" type="text" placeholder="Enter Username" name="username" required>
          <label><b>Password</b></label>
          <input class="w3w-input w3w-border" type="password" placeholder="Enter Password" name="password" required>
          <button class="w3w-button w3w-block w3w-blue w3w-section w3w-padding" name="submit" type="submit">Login</button>
  
        </div>
      </form>

   

    </div>
  </div>
</div>


<?php


if(isset($_POST['submit']))

{
$row1=mysqli_query($c1,'SELECT * From `account_tbl` WHERE `user_name`="'.$_POST["username"].'" AND `user_password`="'.$_POST["password"].'" ');

$search=mysqli_fetch_assoc($row1);
  $_SESSION['fn']=$search['user_name'];
  $_SESSION["user_id"] = $search["user_id"];

  if (($search['accessright']==1))
  {




?>

  <script>
 
  var user="<?php echo $search['user_name'] ?>";


swal({

    title: 'Login Successful !',
    text: 'Welcome '+ user

}).then(result => {
  if (result.value) {
 
 window.location.href='index_user.php';

  } else {

  }
})


  </script> 
    <?php

  }

  else
  {
     echo " 

<script type='text/javascript'>
    sweetAlert('LOGIN FAILED !', 'Incorrect Username or Password', 'error');
     window.location.href='index.php';
</script>



 ";

  }
}


?>   
  <!-- header-section-starts -->
  <div class="header">
        <div class="container">
            <div class="logo">
                <a href="index.php"><img src="images/logo.png" width="50" height="30" alt="" /></a>
            </div>
            <div class="top-menu">
      <span class="menu"> </span>
                <ul class="cl-effect-1">
                    <li><a class="active" href="index.php">Home</a></li>
               
                    <li><a  href="registration.html">Contact</a></li>
                       <li><a href="#">Welcome, <?php echo $_SESSION["fn"]; ?></a></li>
                </ul>
            </div>




      <!-- script-for-menu -->
    <script>
      $("span.menu").click(function(){
        $(".top-menu ul").slideToggle("slow" , function(){
        });
      });
    </script>
    <!-- script-for-menu -->
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- header-section-ends -->
    <!-- banner-section -->
    <div class="banner">
            <div class="banner-info text-center">
                <h1>Singing</h1>
                <h2>That comes from the soul</h2>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
               <div class="clearfix"></div>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat                          volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                <a href="registration.php">Get Started</a>
            </div>
    </div>
    <!-- banner-section -->

    <div class="events-section">


<?php


if(isset($_POST["get_ticket"]))


{


echo '

<br><br>

Select your Seat Zone : ( Minimum of 5 seats per seat zone only!)
<select name="get_seat_zone" onChange="getState(this.value);">
';

$zone_id = $_POST["zone_name"];
       $table2 = "SELECT * FROM zone_tbl WHERE event_id = '$zone_id'";
        $run_query2b = mysqli_query($c1,$table2);         
         while ($row=mysqli_fetch_array($run_query2b))
         {
?>

<?php 
echo '



<option value="'.$row[0].'">'.$row[1].' </option> 
















';
}
?>

</select>

<?php

}

 ?>

<br><br>

                        <div id="state-list" >
<BR>

                                <!-- TABLE GOES IN -->
                        

                        </div>

    </div>
    <div id="example1">
    <div id="owl-demo" class="owl-carousel text-center">
      <div class="item">
        <a data-toggle="modal" data-target=".bs-example-modal-md" href="images/pc.jpg" class="b-link-stripe b-animate-go  thickbox" title="Rose"                           rel="title1">
          <img class="img-responsive lot" src="images/pc.jpg" alt="">
                    <div class="b-wrapper">
                         <div class="b-animate b-from-left b-delay03 ">
                            <i class="plus"></i>
                        </div>
                    </div>
                </a>
      </div>
      <div class="item">
        <a data-toggle="modal" data-target=".bs-example-modal-md" href="images/pc1.jpg" class="b-link-stripe b-animate-go  thickbox" title="Rose"                           rel="title1">
          <img class="img-responsive lot" src="images/pc1.jpg" alt="">
                     <div class="b-wrapper">
                         <div class="b-animate b-from-left b-delay03 ">
                             <i class="plus"></i>
                </div>
                    </div>
        </a>
      </div>
      <div class="item">
        <a data-toggle="modal" data-target=".bs-example-modal-md" href="images/pc2.jpg" class="b-link-stripe b-animate-go  thickbox" title="Rose"                           rel="title1">
          <img class="img-responsive lot" src="images/pc2.jpg" alt="">
                     <div class="b-wrapper">
                    <div class="b-animate b-from-left b-delay03 ">
                        <i class="plus"></i>
                </div>
                         </div>

        </a>
      </div>
      <div class="item">
                <a data-toggle="modal" data-target=".bs-example-modal-md" href="images/pc3.jpg" class="b-link-stripe b-animate-go  thickbox" title="Rose"                           rel="title1">
          <img class="img-responsive lot" src="images/pc3.jpg" alt="">
                     <div class="b-wrapper">
                         <div class="b-animate b-from-left b-delay03 ">
                            <i class="plus"></i>
                         </div>
                    </div>
        </a>
            </div>
      <div class="item">
        <a data-toggle="modal" data-target=".bs-example-modal-md" href="images/pc.jpg" class="b-link-stripe b-animate-go  thickbox" title="Rose"                           rel="title1">
          <img class="img-responsive lot" src="images/pc.jpg" alt="">
                    <div class="b-wrapper">
                         <div class="b-animate b-from-left b-delay03 ">
                            <i class="plus"></i>
                        </div>
                    </div>
                </a>
      </div>
      <div class="item">
        <a data-toggle="modal" data-target=".bs-example-modal-md" href="images/pc1.jpg" class="b-link-stripe b-animate-go  thickbox" title="Rose"                           rel="title1">
          <img class="img-responsive lot" src="images/pc1.jpg" alt="">
                     <div class="b-wrapper">
                         <div class="b-animate b-from-left b-delay03 ">
                             <i class="plus"></i>
                </div>
                    </div>
        </a>
      </div>
      <div class="item">
        <a data-toggle="modal" data-target=".bs-example-modal-md" href="images/pc2.jpg" class="b-link-stripe b-animate-go  thickbox" title="Rose"                           rel="title1">
          <img class="img-responsive lot" src="images/pc2.jpg" alt="">
                     <div class="b-wrapper">
                         <div class="b-animate b-from-left b-delay03 ">
                             <i class="plus"></i>
                </div>
                    </div>
        </a>
      </div>
      <div class="item">
        <a data-toggle="modal" data-target=".bs-example-modal-md" href="images/pc3.jpg" class="b-link-stripe b-animate-go  thickbox" title="Rose"                           rel="title1">
          <img class="img-responsive lot" src="images/pc3.jpg" alt="">
                     <div class="b-wrapper">
                         <div class="b-animate b-from-left b-delay03 ">
                            <i class="plus"></i>
                         </div>
                    </div>
        </a>
      </div>
    </div>
    </div>
        <!-- requried-jsfiles-for owl -->
              <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all" />
                  <script src="js/owl.carousel.js"></script>
                    <script>
                  $(document).ready(function() {
                     $("#owl-demo").owlCarousel({
                      items : 4,
                      lazyLoad : true,
                      autoPlay : false,
                      navigation : true,
                      navigationText :  true,
                      pagination : false,
                      });
                  });
                </script>
        <!-- //requried-jsfiles-for owl -->
    <!-- start content_slider -->
    <!--//sreen-gallery-cursual -->
   <!--  <div class="social-network">
        <div class="social-network1">
        <a href="#">
        <i class="facebook"></i>
                <p>like Us On Facebook</p>
        <div class="clearfix"></div>
        </a>
        </div>
        <div class="social-network2">
      <a href="#">
      <i class="twitter"></i>
      <p>Follow us On Twitter</p>
      </a>
        </div>
        <div class="social-network3">
      <a href="#">
      <i class="googlepluse"></i>
      <p>Follow Us On Google+</p>
      </a>
        </div>
        <div class="clearfix"></div>
    </div> -->
    <!-- footer-section-starts -->
  <div class="footer">
    <div class="copy-rights text-center">
      <p>Copyright &copy; 2015.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
    </div>      
  </div>
  <!-- footer-section-ends -->
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
</body>




<script>

function getState(val) {



   $.ajax({
    type: "POST",
    url: "get_zone.php",
    data:'positionname='+val,
    success: function(data){
        $("#state-list").html(data);
    }
   
            
    });
}




</script>


<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
</html>