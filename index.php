<?php

include 'admin/connect.php';
$msg='';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feetAffairs</title>
    <link rel="stylesheet" href="addfeetaffairs.css">
     <!---------site icons----------->
   <link rel="shortcut icon" href="faviconME.png" type="image/x-icon">
   <link rel="me-touch-icon" href="me-touch-icon.png" >
   
    <link rel="stylesheet" type="text/css" href="bootstrap1/css/bootstrap.min.css">
<script src="bootstrap/jquery/1.11.3/jquery.min.js"></script>
<script src="bootstrap1/js/bootstrap.min.js"></script>

</head>
<body> 
<?php 
   include 'headers.php' ;

   ?>

      <!-------------------navbar ends here-------------------------------->
      
      
        <!-------------------homepage starts here-------------------------------->
     <div class="account-page">
        
         <?php

// contact response msg pop up option for our contact page when sent  
if(ISSET($_SESSION['status'])){
  if($_SESSION['status'] == "ok"){
?>
  <div class="alert alert-info alert-dismissible " style=" text-align: center; font-weight=bolder;"><a href='' class='close' 
  data-dismiss='alert' aria-label='close'>&times;</a><?php echo $_SESSION['result']?></div>
<?php
  }else{
?>
    <div class="alert alert-danger"><?php echo $_SESSION['result']?></div>
<?php
  }
  
  unset($_SESSION['result']);
  unset($_SESSION['status']);
}
?>
<?php 
//inserting code to dispaly message that to logged user

if (isset($_SESSION['message'])): 
?>

<div style = " bottom:20px; margin:20px;" class ="alert alert-info alert-dismissible " style=" text-align: center;">
<a href='#' class='close' data-dismiss = "alert" aria-label = "close">&times;</a>
<strong><?php echo strtoupper($username,) . ' ' . $_SESSION['message']; ?> </strong>

<?php 
   unset($_SESSION['message']);
?>

</div>

<?php endif; ?>

         <div class="container">
         <div class="row">
          <div class="col-2">
              <h1 style="font size"> Step Up Your style.</h1>
              <p>A lady can carry a bag, but it's the shoe that carries the lady!<br>Get 30% off on our luxury footwears.</p>
              <a href="shop.html" class="btn " >Explore now</a>
          </div>
          <div class="col-2">
              <img src="home.png" alt=""> 
          </div>
        </div>
       </div>
    </div>

      <!-------------------home ends here-------------------------------->


<!---------------------------categories starts---------------------------------->
    <div class="categories">
      <div class="small-container">
        <div class="row">
          <div class="col-3">
            <img src="cart7.jpg" alt="" width="100%">
          </div>
          <div class="col-3">
            <img src="cart19.jpg" alt="" width="100%">
          </div>
          <div class="col-3">
            <img src="cart10.jpg" alt=""width="100%">
          </div>
        </div> 
      </div>
     </div>
     <!---------------------------categories ends---------------------------------->


       <!----------------------featured products------------------------->
       <div class="small-container">
      <h2 class="title">Featured Products</h2>
     <center><strong>CLICK ON THE PRODUCT TO PROCEED TO ADD TO CART.</strong></center> 
      <div class="row">
      <?php 
              $select = "SELECT * FROM products limit 8";
              $query = mysqli_query($con,$select);
              $count = mysqli_num_rows($query);
              if($count >0){
                while ($row = mysqli_fetch_array($query)){
                  $id= $row['id'];
                  $big = $row['big'];
                  $small_a = $row['small_a'];
                  $small_b = $row['small_b'];
                  $small_c = $row['small_c'];
                  $small_d = $row['small_d'];
                  $category = $row ['category'];
                  $brand = $row['brand'];
                  $price = $row['price'];
                  $detail = $row['detail'];
               

              ?>
        <div class="col-4">
          <a href="single1.php?p_id=<?php echo $id ;?>&&category=<?php echo $category ;?>"><img src="admin/control/uploads/<?php echo $big ;?>" alt="" width="100%"></a>
          <a href="single1.php?p_id=<?php echo $id ;?>&&category=<?php echo $category ;?>"><h4><?php echo $brand;?></h4></a>
          <div class="rating">
            <span class="glyphicon glyphicon-star" style="color:rgb(243,181,25);"></span>
            <span class="glyphicon glyphicon-star " style="color:rgb(243,181,25);"></span>
            <span class="glyphicon glyphicon-star " style="color:rgb(243,181,25);"></span>
            <span class="glyphicon glyphicon-star " style="color:rgb(243,181,25);"></span>
            <span class="glyphicon glyphicon-star-empty " style="color:rgb(243,181,25);"></span>
          </div>
          <p>₦<?php echo $price ;?>.00</p> 
        </div>
      
     <?php }
              }
     ?>      
     </div>
    </div>
    <!---------------------------featured products ends---------------------------------->

    

    <!------------------------contact page starts here------------------------------>
    <div class="row">
    
      <div class="all">
      <div class="big">
          <div class="contain">
              <div class="left-side">
                  <div class="address details">
                      <span class="glyphicon glyphicon-map-marker" style="color: red;"></span>
                   <div class="topic">Address</div>
                   <div class="text-one">No 44, New heaven junction sheghian estate,independence layout</div>
                   <div class="text-two">Enugu State, Nigeria</div>
                  </div>
                  
                  <div class="phone details">
                      <span class="glyphicon glyphicon-earphone" style="color: red;"></span>
                      <div class="topic">Phone</div>
                      <div class="text-one">+2349057406032</div>
                      <div class="text-two">+2348168786111</div>
                     </div>
                     <div class="email details">
                      <span class="glyphicon glyphicon-envelope" style="color: red;"></span>
                      <div class="topic">Email</div>
                      <div class="text-one">feetaffairs@gmail.com</div>
                      <div class="text-two">info.feetaffairs.net</div>
                     </div>
                  </div>
              <div class="right-side">
                      
                  <div class="topic-text">Send us a message</div>
                  <p>Feel free to write to us anytime about any issues regarding your shopping. 
                    It is our pleasure to always be at your service.</p>
                    <form action="send_email.php" method="post">
                       <div class="input-box1">
                        <input type="text" name="contactname" id="contactname" placeholder="Enter your name" required>
                       </div>
                       <div class="input-box1">
                        <input type="email" name="contactemail" id="contactemail" placeholder="Enter your Email" required>
                       </div>
                       <div class="input-box1">
                        <input type="text" name="subject" id="subject" placeholder="Subject" required>
                       </div>
                       <div class="input-box1 message-box">
                        <textarea placeholder="write message here" name = "message" id = "message"></textarea>
                       </div>
                       <div class="sendnow">
                        <input type="submit" id="send" name = "send"  value="Send Now">
                       </div>
                 </form>
          </div>
      </div>
  </div>
  </div>
  <!------------------------contact page ends here------------------------------>
   

   
   <!------------------------footer starts here------------------------------>
   <?php
 include "footer.php";

 ?>

  <!------------------------------footer ends here-------------------------------------->
 <script>
   var menuItems = document.getElementById("menuItems");
menuItems.style.maxHeight ="0px";

function menutoggle(){
    if(menuItems.style.maxHeight =="0px")
    {
        menuItems.style.maxHeight = "200px";
    }
    else
    {
        menuItems.style.maxHeight = "0px";
    }
}
 </script>

<script src="feetaffairs.js"></script>
<script src="js/script.js"></script>
</body>
</html>