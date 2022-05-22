<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskBlog</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/style.css">

</head>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<body>

<!-- header hiisesi  -->

<header class="header">

    <a href="<?php echo base_url() ?>Homepage" class="logo"><span>t</span>askblog</a>

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
	<?php if ($currentcat): ?>
		<?php foreach ($currentcat as $post): ?>
	<div class="content">
        <h3><?php echo $post->name ?></h3>
        <p>Kateqoriyası üzrə  <bold><?php echo $post->count ?></bold> kontent tapıldı</p>
    </div>
	<?php endforeach ?>
	<?php else: ?>
		<div class="content">
		<h3><?php echo @$byid->name ?></h3>
		<p>Kateqoriyası üzrə  <bold>0</bold> kontent tapıldı</p>
	</div>	
	<?php endif ?>

    

</section>

<!-- banner hisse ends -->

<!-- post hisseye baslangic -->

<section class="container" id="posts">

    <div class="posts-container">
    	<?php if ($posts): ?>
    		<?php foreach ($posts as  $post): ?>
    	<div class="post">
            <img src="<?php echo base_url()."/images/".$post->image ?>" alt="" class="image" style="object-fit:contain;">
            <div class="date">
                <i class="far fa-clock"></i>
                <span><?php echo $post->created_at ?></span>
            </div>
            <h3 class="title"><?php echo $post->title ?></h3>
            <h4 class="text"><?php echo substr( $post->post, 0,100)."..." ?></h4>
           
            <div class="links">
                <a href="#" class="user">
                    <i class="far fa-user"></i>
                    <span> <?php echo $post->uname ?></span>
                </a>
                	<a style="background: transparent; cursor: pointer;" type="submit" href="<?php echo base_url();?>Homepage/readmore/<?php echo $post->id ?>"> DAHA ƏTRAFLI</a>
            </div>
               
                
        </div>	
    	<?php endforeach ?>
    	<?php if (count($posts)>$per_page): ?>
	    	<div class="clearfix">
	       	<?php echo $links; ?>	
	       	</div>
	       
    	<?php endif ?>
    	<?php endif ?>
    	
       
    	
        

    </div>

    <div class="sidebar">

       
        <div class="box">
            <h3 class="title">Kategoriyalar</h3>
            <div class="category">
                <?php foreach ($categories as $category): ?>
                    <a href="<?php echo base_url()."Frontcategory/category/".$category->cid ?>"> <?php echo $category->name ?> <span><?php echo $category->count ?></span></a>

                <?php endforeach ?>
                
               
            </div>
        </div>
    </div>

</section>

<!-- post hissenin sonu -->

<!-- elaqe hissesine baslangic  -->

<section class="contact" id="contact">
 
    <form action="<?php echo base_url() ?>Homepage/contactus" method="post">
        <h3>BİZİMLƏ ƏLAQƏ</h3>
        <div class="inputBox">
            <input type="text" name="name" placeholder="<?php echo (form_error('name')) ?form_error('name') : "Adinizi daxil edin";  ?>">
            <input type="email" name="email" placeholder="<?php echo (form_error('email')) ?form_error('email') : "Emailinizi daxil edin";  ?>">
        </div>
        <div class="inputBox">
            <input type="number" name="number" placeholder="<?php echo (form_error('number')) ?form_error('number') : "Nomrenizi daxil edin";  ?>">
            <input type="text" name="topic" placeholder="<?php echo (form_error('topic')) ?form_error('topic') : "Movzu";  ?>">
        </div>
        <textarea name="message" placeholder="<?php echo (form_error('message')) ?form_error('message') : "Mesajiniz";  ?>" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="Gondər" class="btn">
    </form>

</section>

<!-- elaqe hiisesinin sonu -->

<!-- footer hissey ve sosial media bolumu  -->

<section class="footer">

    <div class="follow">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
    </div>

    <div class="credit">Design by<span>FISH company</span></div>

</section>

<!-- footer hissenin sonu -->


<!-- custom js file link  -->
<script src="<?php echo base_url();?>assets/front/js/script.js"></script>
    <script>
    	$(document).ready(function(){
    		messaged="<?php echo $this->session->messaged ?>";
            notmessaged="<?php echo $this->session->notmessaged ?>";
    		if (messaged) {
    			alert(messaged)
    		}else if(notmessaged ){
    			alert(notmessaged)
    		} 
    	})
    </script>
</body>
</html>