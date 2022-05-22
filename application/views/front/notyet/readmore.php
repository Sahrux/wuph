<?php $this->load->view('front/include/header') ?>

<!-- header hisse end:) -->

<!-- banner hisse   -->



<!-- banner hisse ends -->

<!-- post hisseye baslangic -->

<section class="container" id="posts">

    <div class="posts-container">


        <div class="post">
            <img src="<?php echo $post->image; ?>" alt="" class="image">
            <div class="date">
                <i class="far fa-clock"></i>
                <span><?php echo $post->created_at; ?></span>
            </div>
            <h3 class="title"><?php echo $post->title; ?></h3>
            <h4 class="text"><?php echo $post->post; ?></h4>
            <div class="links">
                <a href="#" class="user">
                    <i class="far fa-user"></i>
                    <span> <?php echo $post->uname; ?></span>
                </a>
                <a href="#" class="icon">
                    <i class="far fa-comment"></i>
                    <span>(2)</span>
                </a>
                <a href="#" class="icon">
                    <i class="far fa-share-square"></i>
                    <span>(2)</span>
                </a>
            </div>
        </div>

    </div>

        

<!-- post hissenin sonu -->

<!-- elaqe hissesine baslangic  -->



<!-- elaqe hiisesinin sonu -->

<!-- footer hissey ve sosial media bolumu  -->



<?php $this->load->view('front/include/footer') ?>