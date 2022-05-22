<?php $this->load->view('admin/include/headlbar') ?>
<?php $this->load->view('admin/include/topbar') ?>
<div class="container-xl">
                <div class="table-responsive col-md-12" >
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Blogları <b>İdarə Et</b></h2>
                                </div>
                                <div class="col-sm-6" style="">
                                  
                                    <a href="<?php echo base_url('Blog/newblogpage') ?> " class="btn btn-success float-right"><i class="material-icons" style="margin-right:2px;">&#xE147;</i><span style="display: ;"> Yeni Blog</span></a>         
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Şəkil</th>
                                    <th>Başlıq</th>
                                    <th>Kontent</th>
                                    <th>Kateqoriya</th>
                                    <th>Müəllif</th>
                                    <th>Baxış</th>
                                </tr>
                            </thead>

                            <tbody>
                            	<?php foreach ($rows as  $row): ?>
                            		
                            	
                                <tr>
                                    <td name='id'><?php echo $row->id; ?></td>   
                                    <td name="img"><img src="<?=base_url()."/images/".$row->image;?>" width="100" ></td>
                                    <td name="title"><?php echo $row->title; ?></td>
                                    <td name="post"><?php echo html_entity_decode($row->post) ?></td>
                                    <td name="category"><?php echo $row->name; ?></td><td name="author"><?php echo $row->uname; ?></td>
                                    <td name="hit"><?php echo $row->hit; ?></td>
                                    
                                   <form action="<?php echo base_url('Blog/editblogpage') ?>" method="post">

                                    <td>
                                        <input type="hidden" name="editedid" value="<?php echo $row->id; ?>">
                                        <input type="hidden" name="title" value="<?php echo $row->title; ?>">
                                        <input type="hidden" name="image" value="<?php echo $row->image; ?>">
                                        <input type="hidden" name="post" value="<?php echo $row->post; ?>">
                                        <input type="hidden" name="category" value="<?php echo $row->name; ?>">
                                        <input type="hidden" name="author" value="<?php echo $row->uname; ?>">
                                        <button style="border:none; background: transparent;" type="submit" href="#editEmployeeModal" name="edit"  > <i class="material-icons" data-toggle="tooltip" title="Edit" style="color: orange;">&#xE254;</i></button>
                                        </form>
                                        <form action="<?php echo base_url().'Blog/deleteblog' ?>" method="post">
                                            <input type="hidden" name="id" value="<?php echo $row->id ?>">
                                            <button style="border:none; background:transparent;" type="submit"  href="#deleteEmployeeModal" id="idd" class="delete emeliyyat" data-toggle="modal" ><i class="material-icons" data-toggle="tooltip"  title="Delete" style="color:red;">&#xE872; </i></button>
                                        </form>
                                        
                                        
                                    </td>
                                    
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="clearfix" >
                            <?php echo $links;?>
                        </div>
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
        var deleted="<?php echo $this->session->userdata('deleted'); ?>";
        if (deleted) {
            alert(deleted);
        }
    })
</script>