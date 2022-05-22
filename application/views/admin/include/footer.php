
     <!-- fooder -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; fish 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Çıxmaq istəyirsiz?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Əgər hazırki sessiyanı sonlandırmaq istəyirsizsə "çıxış" butonuna klikləyin</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">İmtina</button>
                    <a class="btn btn-primary" href="<?php echo base_url()?>Login/logout">Çıxış</a>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" class="deyishdi" value="nope">
     <!-- endoffooder -->
     
<!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url()?>/assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url()?>/assets/admin/js/popper.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url()?>/assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url()?>/assets/admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url()?>/assets/admin/vendor/chart.js/Chart.min.js"></script>
 
    <!-- Page level custom scripts -->
    
    <script src="<?php echo base_url()?>/assets/admin/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url()?>/assets/admin/js/demo/chart-pie-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</body>
<script>
    $(document).ready(function(){
    $(".dropdown-toggle").dropdown();
    $(".emeliyyat").click(function(){
        var id = $(this).attr('id');
        $("#editedid").val(id);
        $("#deletedid").val(id);
    });
    }); 
    $('.checked').change(function() {
        var status=$(this).prop('checked');
        var id=$(this).attr('id');
        var csrfname=$("#srcsrf").attr('name');
        var token=$('#srcsrf').val();
        if (status) {
           var sts=1;
        }else{
            var sts=0;
        }
      $.ajax({
         type: "post",
         url: "<?=base_url()?>/Users/switch/id", 
         dataType: "json",
         data: {"status":sts,"id":id,[csrfname]: token},
         success: 
              function(data){
                $('.deyishdi').val(data.deyishdi);
                alert(data.success)
                console.log(data.deyishdi)
                if (data.token) {
                  $("#srcsrf").val(data.token);  
                  
                } 

              }
          });

        
      setTimeout(function(){
        var elem=$('.deyishdi').val();  
        if(elem=='nope'){
         alert('ahahahaha')   
        }
        
      },1000)
        setTimeout(function(){
        var elem=$('.deyishdi').val();    
        if (elem=="nope") {
        alert("Elə bilirsən dəyişdi?? refresh elə səhifəni :DDD");

        }
        },1001)
      
     
    });
</script>

</html>