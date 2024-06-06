<?php
session_start();
include "connect.php";

$email=$_SESSION["email"];
$stmt = $pdo->prepare("SELECT SUM(nb_tickets) as nbrs FROM reservations  WHERE id_user=:id");
$stmt->bindParam(':id', $_SESSION["id"]);
$stmt->execute();
$rw = $stmt->fetch(PDO::FETCH_ASSOC);
 $stmt = $pdo->prepare("SELECT * FROM voyage ORDER BY id DESC LIMIT 1");
 $stmt->execute();
 $rowCount = $stmt->rowCount();
 $row1 = $stmt->fetch(PDO::FETCH_ASSOC);
 $quer=$pdo->prepare("SELECT sum(nb_Tickets) as 'nb' FROM reservations WHERE id_voyage=:id");
 $quer->bindParam(':id', $row1["id"]);
 $quer->execute();
 $rox=$quer->fetch(PDO::FETCH_ASSOC);
 $y=$row1["max_visitor"]-$rox["nb"];
 $stmt->execute();
 $stmt = $pdo->prepare("SELECT * FROM voyage");
 $stmt->execute();
?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Eforlad travel</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style1.css">
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>

         <!-- header inner -->
         <div class="header">
            <div class="header_white_section">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="header_information">
                           <ul>
                              <li><img src="images/1.png" alt="#"/>6012, cite el amal gabes</li>
                              <li><img src="images/2.png" alt="#"/> +216 50 630 942</li>
                              <li><img src="images/3.png" alt="#"/> Travel@gmail.com</li>
                              <li class="nbrs"><img src="images/ticket-512.png" alt="#" width="30" height="30"/><?php echo $rw["nbrs"] ; ?></li>
                            
                           </ul>
                           <div class="trvls"><div class="list_title">Booking Liste</div> 
                           <div class="trvlees">
                        <?php if($rw["nbrs"]==0 ){
?> 
<p>There is no travles booked</p>

  <?php                      } else {
   ?><table border="0">
   <tr><th></th><th>Travel Booked</th><th>Number of Tickets</th><tr><?php
 $quer1=$pdo->prepare("SELECT * FROM reservations r,voyage v WHERE id_user=:id and r.id_voyage=v.id");
 $quer1->bindParam(':id', $_SESSION["id"]);
 $quer1->execute();
 while ($line = $quer1->fetch(PDO::FETCH_ASSOC)) { 
?>
<tr><td> <img src="data:image/png;base64,<?php echo $line["poster"]; ?>" alt="#" width="30" height="30"/></td><td><?php echo $line["titre"]; ?></td><td><?php echo $line["nb_Tickets"]; ?></td></tr>
<?php
 }
?> 
</table>
  <?php 

  }?>
                        </div>
                        
                        </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo"> <a href="index.php"><img src="images/logo.png" alt="#" ></a> </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="menu-area">
                        <div class="limit-box">
                           <nav class="main-menu">
                              <ul class="menu-area-main">
                                 <li class="active"> <a href="#">Home</a> </li>
                                 <li> <a href="#about">About</a> </li>
                                 <li><a href="#travel">Travel</a></li>
                                 <li><a href="#contact">Contact Us</a></li>
                                 <li id="user"><img src="images/user.png" alt="#" width="30" height="30"/><?php  echo ucfirst($_SESSION["name"]);?>
                                    <ul class="user_menu">
                                    <li id="dis">Disconnect</li>
                                
                                 </ul></li>
                              </ul>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
      </header>
      <!-- end header -->
   <div class="rsv">
   <div class="main__cards-container-heading-wrap">
                <div class="quit"><b>X</b></div>
                <h2 class="main__cards-container-heading ss-heading ttr" style="color:#FFD111;">book travel</h2>
               <br>
                <form  method="post" action="reserver.php" id="rsvr" enctype="multipart/form-data">

<div class="item_admin">
                    <label for="">Number of tickets</label>
                  <input type="number" name="nbpr" id="nbpr" min="1" value="1" max="5" required>
                </div>
                <input type="text" name="id_v" style="display:none;" id="voy">
                <div class="cover">
                <img src="images/1.jpg" class="cvr" alt="">
</div>

            <button type="submit" id="bk">Book Now</button>    
            <div class="logo"><img src="images/logo.png" alt="#" ></div>
            </form>
         
              </div>
</div>
      <section >
         <div class="banner-main">
            <div class="main item" id="<?php echo $y ?>">
               <img src="data:image/png;base64,<?php echo $row1["poster"]; ?>"  class ="im" alt="#" width="1500" height="10"/>
               <div class="container">
                  <div class="text-bg">
                     <h1><strong class="white titre"><?php echo $row1["titre"]; ?></strong></h1>
                     <?php
                     $idv= $row1["id"];
                     $id=$_SESSION["id"];
                     $stm=$pdo->prepare("SELECT * FROM reservations WHERE id_user = :id AND id_voyage=:idv");
                     $stm->bindParam(':id', $id);
                     $stm->bindParam(':idv', $idv);
                     $stm->execute();
                     $Count = $stm->rowCount();

                     if($Count==0){?>
                  <button class="reserver"  id="<?php echo $idv ; ?>">Book Now</button>  
                 <?php }
                 else {?>
         <button class="reserved"  id="<?php echo $idv ; ?>" disabled>Booked</button>
            <?php     }?>
                  </div>
            </div>
            </div>
         </div>
      </section>
      <!-- about -->
      <div id="about" class="about">
         <div class="container">
            <div class="row">
               <div class="col-md-12 ">
                  <div class="titlepage">
                     <br>
                     <br>
                     <h2>About  our travel agency</h2>
                     <span> fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="bg">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                     <div class="about-box">
                        <p> <span>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure thereThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there</span></p>
                        <div class="palne-img-area">
                           <img src="images/plane-img.png" alt="images">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        
         </div>
      </div>
      <!-- end about -->
    
      <!--London -->
      <div id="travel">
      <div class="London ">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Weekend in New York, London</h2>
                     <span>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</span> 
                  </div>
               </div>
            </div>
         </div>
         <div class="container-fluid">
            <div class="London-img">
               <figure><img src="images/London.jpg" alt="img"/></figure>
            </div>
         </div>
      </div>
   
      <!-- end London -->
      <!--Tours -->
      <div class="Tours">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Tours</h2>
                     <span>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</span> 
                  </div>
               </div>
            </div>

            <section id="demos">
               <div class="row">
                  <div class="col-md-12">
                     <div class="owl-carousel owl-theme">
                     <?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
   $quer=$pdo->prepare("SELECT sum(nb_Tickets) as 'nb' FROM reservations WHERE id_voyage=:id");
   $quer->bindParam(':id', $row["id"]);
   $quer->execute();
   $rx=$quer->fetch(PDO::FETCH_ASSOC);
   $x=$row["max_visitor"]-$rx["nb"];
   if($x>0){
   ?>
                        <div class="item" id="<?php echo $x; ?>" >
                        <img class="img-responsive im" src="data:image/png;base64,<?php echo $row["poster"]; ?>" >
                           <h3 class="titre"><?php echo ucfirst($row["titre"]); ?></h3>
                           <p><?php echo ucfirst($row["description"]); ?></p>
                           <?php
                     $idv= $row["id"];
                     $id=$_SESSION["id"];
                     $stm=$pdo->prepare("SELECT * FROM reservations WHERE id_user = :id AND id_voyage=:idv");
                     $stm->bindParam(':id', $id);
                     $stm->bindParam(':idv', $idv);
                     $stm->execute();
                     $Count = $stm->rowCount();
                     
                     if($Count==0){
                        
                        ?>

                  <button class="reserver"  id="<?php echo $idv ; ?>">Book Now</button>  
                 <?php }
                 else {?>
         <button class="reserved"  id="<?php echo $idv ; ?>" disabled>Booked</button>
            <?php     }?>
                           
                        </div>
                        <?php }} ?>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
      <!-- end Tours -->
      <!-- Amazing -->
      <div class="amazing">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="amazing-box">
                     <h2>Amazing London Tour</h2>
                     <span>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there</span>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
      <!-- end Amazing -->
  
      <!-- footer -->
      <footer>
         <div id="contact" class="footer">
            <div class="container">
               <div class="row pdn-top-30">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                     <ul class="location_icon">
                        <li> <a href="#"><img src="icon/facebook.png"></a></li>
                        <li> <a href="#"><img src="icon/Twitter.png"></a></li>
                        <li> <a href="#"><img src="icon/linkedin.png"></a></li>
                        <li> <a href="#"><img src="icon/instagram.png"></a></li>
                     </ul>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                     <div class="Follow">
                        <h3>CONTACT US</h3>
                        <span>6012, Cite El Amal<br> Gabes<br>
                        +216 50 630 942</span>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                     <div class="Follow">
                        <h3>ADDITIONAL LINKS</h3>
                        <ul class="link">
                           <li> <a href="#">About us</a></li>
                           <li> <a href="#">Terms and conditions</a></li>
                           <li> <a href="#"> Privacy policy</a></li>
                           <li> <a href="#">News</a></li>
                           <li> <a href="#"> Contact us</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                     <div class="Follow">
                        <h3> Contact</h3>
                        <div class="row">
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                              <input class="Newsletter" placeholder="Name" type="text">
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                              <input class="Newsletter" placeholder="Email" type="text">
                           </div>
                           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                              <textarea class="textarea" placeholder="comment" type="text">Comment</textarea>
                           </div>
                        </div>
                        <button class="Subscribe">Submit</button>
                     </div>
                  </div>
               </div>
    
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script>
         $(document).ready(function() {
           var owl = $('.owl-carousel');
           owl.owlCarousel({
             margin: 10,
             nav: true,
             loop: true,
             responsive: {
               0: {
                 items: 1
               },
               600: {
                 items: 2
               },
               1000: {
                 items: 3
               }
             }
           })
         })
         var dis=document.getElementById("dis");
  
         dis.addEventListener("click",function(){
            window.location.href="index.php";
 

         });
var quit=document.querySelector(".quit");
var rsv=document.querySelector(".rsv");
quit.addEventListener("click",()=>{
rsv.style.opacity="0";
rsv.style.zIndex = "0";
});
var resrv = document.querySelectorAll(".reserver");
var resrv = document.querySelectorAll(".reserver");
var ttr=document.querySelector(".ttr");
var cvr=document.querySelector(".cvr");
var id;
resrv.forEach(function(element) {
    element.addEventListener("click", function() {
document.getElementById("voy").value=this.id;
      var titre = this.closest('.item').querySelector('.titre');
      var im = this.closest('.item').querySelector('.im');
      var nbrx = this.closest('.item').id;
      var nbpr=document.getElementById("nbpr");
      nbpr.setAttribute("max",nbrx);
      nbpr.setAttribute("value",1);
ttr.innerHTML=titre.innerHTML;
cvr.setAttribute("src", im.getAttribute("src"));   
rsv.style.opacity="1";
rsv.style.zIndex = "5";
   });
});
let nbrs = document.querySelector(".nbrs");
let trvls = document.querySelector(".trvls");
var x=0;
nbrs.addEventListener("click", () => {
   if(x==0){
  trvls.style.opacity = "1";
x=1;
}
else{
   trvls.style.opacity = "0";
   x=0;
}
});



 </script>
     
   </body>
</html>