<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskBlog</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/style.css">
    <style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
  /*font-size: 18px;*/
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 20px;
}

.card {
  /*box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);*/
  margin: 8px;
}



.container {
  padding: 0 16px;
  display: block;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<body>

<!-- header hiisesi  -->

<header class="header">

    <a href="<?php echo base_url() ?>Homepage" class="logo"><span style="font-size: 25px;">t</span>askblog</a>

    <nav class="navbar">
            <!-- <a href="#elaqe">Əlaqə</a> -->
    </nav>

    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <i class="fas fa-search" id="search-icon"></i>
    </div>

    <form action="" class="search-form">
        <input type="search" name="" placeholder="search here..." id="search-box">
        <label for="search-box" class="fas fa-search"></label>
    </form>

</header>

<!-- header hisse end:) -->

<!-- banner hisse   -->

<section class="banner" id="banner">
   
    <div class="content">
        <h3>Haqqimizda</h3>
        <p>Birincisi Salam</p>
    </div>
       

</section>
<div class="containerr" style="padding:100px;">
    <h2 style="text-align:center;font-size: 25px; font-weight:500;">Our Team</h2><br><br>
    <div class="row">
        <?php foreach ($admins as $admin): ?>
            <?php if ($admin->mission != 'siravi'): ?>
              <div class="column">
            <div class="card">
                <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);border-radius: 50%;">
                 <img src="<?php echo base_url()."/images/".$admin->pp ?>" alt="Jane" style="width:100%;height: 300px; border-radius: 50%; " >     
                </div>
                  
              
              <div class="container" style="padding:15px;margin-top:15px; border-radius:4%;">
                <h2 style="font-size:22px;"><?php echo $admin->fname." ".$admin->lname ?></h2>
                <p style="font-size:17px;" class="title"><?php echo $admin->mission ?></p><br>
                <p style="font-size:17px;">Curabitur commodo est non finibus interdum. Nulla tempor vel risus in blandit. Sed at sapien eget lacus dictum posuere. Phasellus non magna sed nisl pulvinar bibendum sit amet et nibh. Proin nec nisi ac nunc efficitur ullamcorper sit amet id nisl. </p>
                <br>
               
               <a style="font-size:20px;" class="button" href="mailto:<?php echo $admin->email; ?>">Contact <i class="fas fa-envelope"></i></a>
              </div>
            </div>
          </div>   
            <?php endif ?>
           

    <?php endforeach ?>
    </div> 

</div>



<section class="footer">

    <div class="follow">
        <a href="https://www.facebook.com/" class="fab fa-facebook-f"></a>
        <a href="https://www.twitter.com/" class="fab fa-twitter"></a>
        <a href="https://www.instagram.com/" class="fab fa-instagram"></a>
        <a href="https://www.linkedin.com/" class="fab fa-linkedin"></a>
    </div>

    <div class="credit">Design by<span>FISH company</span></div>

</section>

<!-- custom js file link  -->

<script src="<?php echo base_url();?>assets/front/js/script.js"></script>
    
</body>
</html>