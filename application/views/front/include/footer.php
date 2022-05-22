<section class="footer">

    <div class="follow">
        <a href="https://www.facebook.com/" class="fab fa-facebook-f"></a>
        <a href="https://www.twitter.com/" class="fab fa-twitter"></a>
        <a href="https://www.instagram.com/" class="fab fa-instagram"></a>
        <a href="https://www.linkedin.com/" class="fab fa-linkedin"></a>
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