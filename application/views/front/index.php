<?php $this->load->view('front/include/header') ?>

<!-- header hisse end:) -->

<!-- banner hisse   -->

<section class="banner" id="banner">

    <div class="content">
        <h3>Haqqımızda</h3>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam, laboriosam?</p>
        <a href="<?php echo base_url()?>Homepage/aboutus" class="btn">Daha ətraflı</a>
    </div>

</section>

<!-- banner hisse ends -->

<!-- post hisseye baslangic -->

<section class="container" id="posts">

    <div class="posts-container">
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
       	<div class="clearfix">
       	<?php echo $links; ?>	
       	</div>
    	
        

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
<?php $this->load->view('front/include/footer') ?>