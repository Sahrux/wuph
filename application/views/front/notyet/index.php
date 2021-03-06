 <?php $this->load->view('front/include/header') ?>

        <!-- Top News Start-->
        <div class="top-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 tn-left">
                        <div class="row tn-slider">
                            <?php foreach ($posts as $post): ?>
                             <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/news-450x350-2.jpg" />
                                    <div class="tn-title">
                                        <a  href=""><?php echo $post->title ?></a>
                                    </div>
                                </div>
                            </div>   
                            <?php endforeach ?>
                            
                        </div>
                    </div>
                    <div class="col-md-6 tn-right">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/news-350x223-1.jpg" />
                                    <div class="tn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/news-350x223-2.jpg" />
                                    <div class="tn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/news-350x223-3.jpg" />
                                    <div class="tn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/news-350x223-4.jpg" />
                                    <div class="tn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top News End-->

        <!-- Category News Start-->
        <div class="cat-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>T??B????T</h2>
                        <div class="row cn-slider">
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/xbr2.jpg" />
                                    <div class="cn-title">
                                        <a href="readmore.html">T??bi??ti sevin</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/tby2.jpg" />
                                    <div class="cn-title">
                                        <a href="">T??bi??ti sevin </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/news-350x223-3.jpg" />
                                    <div class="cn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>TEXNOLOJ??</h2>
                        <div class="row cn-slider">
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/news-350x223-4.jpg" />
                                    <div class="cn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                        
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/texnoloji.jpg" />
                                    <div class="cn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/news-350x223-1.jpg" />
                                    <div class="cn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category News End-->

        <!-- Category News Start-->
        <div class="cat-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>M??D??N??YY??T</h2>
                        <div class="row cn-slider">
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/medeniyyet1.jpg" />
                                    <div class="cn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/medeniyyet2.jpg" />
                                    <div class="cn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/news-350x223-3.jpg" />
                                    <div class="cn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>S??YAS??T</h2>
                        <div class="row cn-slider">
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/siyaset1.jpg" />
                                    <div class="cn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/siyaset2.jpg" />
                                    <div class="cn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/news-350x223-3.jpg" />
                                    <div class="cn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category News End-->
        
       

        <!-- Main News Start-->
        <div class="main-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/news-350x223-1.jpg" />
                                    <div class="mn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/news-350x223-2.jpg" />
                                    <div class="mn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/news-350x223-3.jpg" />
                                    <div class="mn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/news-350x223-4.jpg" />
                                    <div class="mn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/news-350x223-5.jpg" />
                                    <div class="mn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/news-350x223-1.jpg" />
                                    <div class="mn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/news-350x223-2.jpg" />
                                    <div class="mn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/news-350x223-3.jpg" />
                                    <div class="mn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="<?php echo base_url() ?>/assets/front/img/news-350x223-4.jpg" />
                                    <div class="mn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mn-list">
                            <h2>KATEQOR??YALAR</h2>
                            <ul>
                                <li><a href="">M??D??N??YY??T</a></li>
                                <li><a href="">??DMAN</a></li>
                                <li><a href="">TEXNOLOG??YA</a></li>
                                <li><a href="">S??YAH??T</a></li>
                                <li><a href="">FOTOQRAF??YA</a></li>
                                <li><a href="">TAR??X</a></li>
                                <li><a href="">S??YAS??</a></li>
                                <li><a href="">MODA</a></li>
                                <li><a href="">ELM??</a></li>
                                <li><a href="">D??G??RL??R??</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main News End-->

      <?php $this->load->view('front/include/footer') ?>
