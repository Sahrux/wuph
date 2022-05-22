<?php $this->load->view('admin/include/headlbar') ?>
<?php $this->load->view('admin/include/topbar') ?>
<div class="container-xl">
                <div class="table-responsive col-md-12" >
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Kateqoriylari <b>İdarə Et</b></h2>
                                </div>
                                  <div class="col-sm-6" style="">
                                    <a href="#addEmployeeModal" class="btn btn-success float-right" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Yeni Kateqoriya Əlavə Et</span></a>
                                                         
                                </div>  
                                
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kateqoriya</th>
                                    <th>Count</th>
                                    
                                </tr>
                            </thead>
                            <?php foreach ($rows as $row): ?>
                            <tbody>
                                <tr>

                                    <td name='id'><?php echo $row->cid;  ?> </td>   
                                    <td name="name"><?php echo $row->name;  ?> </td>
                                     <td name="name"><?php echo $row->count;?>  </td> 
                                    
                                    <td>
                                         <a href="#editEmployeeModal<?php echo $row->cid ?>" class="edit emeliyyat" id="<?php echo $row->cid;?>" data-toggle="modal"  > <i class="material-icons" data-toggle="tooltip" title="Edit" style="color:orange;">&#xE254;</i></a>
                                       <a  href="#deleteEmployeeModal" id="<?php echo $row->cid;?>" class="delete emeliyyat" data-toggle="modal" ><i class="material-icons" data-toggle="tooltip"  title="Delete" style="color:red;">&#xE872;</i></a>
                                        
                                    </td>
                                </tr>
                                
                            </tbody>
                            <?php endforeach ?>
                        </table>
                        <div class="clearfix" >
                            <!-- <?php echo $links;?> -->
                        </div>
                    </div>
                </div>        
            </div>
                  <div id="addEmployeeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="<?= base_url() ?>Category/addcategory">
                                
                                <div class="modal-header">                      
                                    <h4 class="modal-title">Kateqoriya Əlavə Et</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                 <div class="form-group">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    </div>                    
                                    <div class="form-group">
                                        <label>Kategoriya Adi </label>
                                        <input type="text" name="name" class="form-control" placeholder="Katqoriya adi daxil edin" >
                                    </div>
                                                  
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="İmtina">
                                    <input type="submit" class="btn btn-success" value="Tamamla">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>  
            	
                 <!-- Delete Modal HTML -->
                <div id="deleteEmployeeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="<?php echo base_url()?>/Category/delete">
                                <div class="modal-header">                      
                                    <h4 class="modal-title">Kateqoriyani sil</h4>
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
               <!-- Edit Modal HTML -->
                <?php foreach ($rows as  $row): ?>
                <div id="editEmployeeModal<?php echo $row->cid ?>" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="<?php echo base_url();?>Category/update">
                                <div class="modal-header">                      
                                    <h4 class="modal-title">Redəktə Et</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">                    
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control"placeholder="Kateqoriya Adi.. " value="<?php echo $row->name ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    </div>
                                                     
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="editedid" id="editedid" value="<?php echo $row->cid ?>">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Imtina">
                                    <input type="submit" class="btn btn-info" value="Saxla">
                                </div>
                            </form>
                        </div>
                    </div>
                 </div>
                <?php endforeach ?>
<?php $this->load->view('admin/include/footer') ?>
<script>
    $(document).ready(function(){
     var isadmin="<?php echo $this->session->userdata('isadmin'); ?>";
     if (isadmin) {
        alert(isadmin);
        }
        var deleted="<?php echo $this->session->userdata('deleted'); ?>";
     if (deleted) {
        alert(deleted);
        }
    $(".emeliyyat").click(function(){
        var id = $(this).attr('id');
        $("#editedid").val(id);
        $("#deletedid").val(id);
    });
    }); 
</script>

</html>
