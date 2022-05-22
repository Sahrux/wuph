<?php $this->load->view('admin/include/headlbar') ?>
<?php $this->load->view('admin/include/topbar') ?>
<div class="container-xl">
                <div class="table-responsive col-md-12" >
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Mesajlar <!-- <b>İdarə Et</b> --></h2>
                                </div>
                             </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                   <!--  <th>ID</th>
                                    <th>AD</th>
                                    <th>Kontent</th> -->
                                </tr>
                            </thead>

                            <tbody>
                            	<?php foreach ($messages as  $message): ?>
                                <tr>
                                    <!-- <td name='id'><?php echo $message->coid; ?></td>    -->
                                    <td name="img"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8lCCz3naP8eDnFr476DeuRV8FvxmratoD6q-yuxjKsMu-0DQCKMzH5PeTAk6qB7UyxmE&usqp=CAU" width="30" style="
									border-radius:50%;" ></td>
                                    <td name="title"><?php echo html_entity_decode($message->coname); ?></td>
                                    <td name="post"><?php echo html_entity_decode(substr($message->comessage ,0,70)); ?></td>
                                    <td>
                                            <a  href="#deleteEmployeeModal" id="<?php echo $message->coid;?>" class="delete emeliyyat" data-toggle="modal" ><i class="material-icons" data-toggle="tooltip"  title="Delete" style="color:red;">&#xE872;</i></a>
                                        
                                    </td>
                                    
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                        <!-- <div class="clearfix" >
                            <?php echo $links;?>
                        </div> -->
                    </div>
                </div>        
            </div>
            <div id="deleteEmployeeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="<?php echo base_url()?>/Messages/delete">
                                <div class="modal-header">                      
                                    <h4 class="modal-title">Mesaji sil</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <input type="hidden" id="deletedid" name="deletedid" value="hello">
                                <div class="modal-body">                    
                                    <p>Silmək istədiyinizdən əminsiniz?</p>
                                    <p class="text-warning"><small>Sildikdən sonra datanı geri qaytara bilməzsiniz</small></p>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
<input type="hidden" value=" <?php echo $this->session->inserted ?>">
<?php $this->load->view('admin/include/footer') ?>
<script>
    $(document).ready(function(){
        var isadmin="<?php echo $this->session->userdata('isadmin'); ?>";
        if (isadmin) {
            alert(isadmin);
        }
        $(".emeliyyat").click(function(){
        var id = $(this).attr('id');
        $("#editedid").val(id);
        $("#deletedid").val(id);
    });
        var deleted="<?php echo $this->session->userdata('deleted'); ?>";
        if (deleted) {
            alert(deleted);
        }
         var notdeleted="<?php echo $this->session->userdata('notdeleted'); ?>";
        if (notdeleted) {
            alert(notdeleted);
        } 

    })
</script>