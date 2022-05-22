<?php $this->load->view('admin/include/headlbar') ?>
<?php $this->load->view('admin/include/topbar') ?>
<div class="container-xl">
                <div class="table-responsive col-md-12" >
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>İstifadəçiləri <b>İdarə Et</b></h2>
                                </div>
                                <div class="col-sm-6" style="">
                                    <input type="hidden" id="srcsrf" name="<?php $this->load->security->get_csrf_hash() ?>" value="<?php $this->load->security->get_csrf_hash() ?>">
                                    <a href="<?php echo base_url('Admin/newuserpage') ?> " class="btn btn-success float-right"><i class="material-icons" style="margin-right:2px;">&#xE147;</i><span style="display: ;"> Yeni User</span></a>         
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Şəkil</th>
                                    <th>Ad</th>
                                    <th>Soyad</th>
                                    <th>Istifadəçi Adı</th>
                                    <th>E-Mail</th>
                                    <th>Status</th>
                                    <th>Rol</th>
                                </tr>
                            </thead>
                            <?php foreach ($rows as $row): ?>
                            <tbody>
                                <tr>
                                    <td name='id'><?php echo $row->uid;  ?> </td>   
                                    <td name="pp"><img src="<?=base_url()."/images/".$row->pp;?>" width="100" ></td>
                                    <td name="fname"><?php echo $row->fname;  ?> </td>
                                    <td name="lname"><?php echo $row->lname;  ?> </td>
                                    <td name="uname"><?php echo $row->uname;  ?> </td>
                                    <td name="email"><?php echo $row->email;  ?> </td>
                                    <td name="status">
                                     <input 
                                        class="checked" 
                                        type="checkbox"
                                         data-toggle="toggle" 
                                         data-on="Aktiv" 
                                         data-off="Passiv" 
                                         data-onstyle="success" 
                                         data-offstyle="danger" 
                                         id="<?php echo $row->uid;?>"
                                         <?php echo ($row->status==1) ? "checked" : "";?>
                                     >
                                    </td>
                                    <td name="role"><?php echo ($row->role==0) ? "user" : "admin";  ?> </td>
                                    <form action="<?php echo base_url('Users/edituserpage/') ?><?php echo $row->uid; ?>" method="post">
                                    <td>
                                        <input type="hidden" name="editedid" value="<?php echo $row->uid; ?>">
                                        <input type="hidden" name="pp" value="<?php echo $row->pp; ?>">
                                        <input type="hidden" name="fname" value="<?php echo $row->fname; ?>">
                                        <input type="hidden" name="lname" value="<?php echo $row->lname; ?>">
                                        <input type="hidden" name="uname" value="<?php echo $row->uname; ?>">
                                        <input type="hidden" name="email" value="<?php echo $row->email; ?>">
                                        <input type="hidden" name="status" value="<?php echo $row->status; ?>">
                                        <input type="hidden" name="role" value="<?php echo $row->role; ?>">
                                        
                                        <button style="border:none; background: transparent;" type="submit" href="#editEmployeeModal" name="edit"  > <i class="material-icons" data-toggle="tooltip" title="Edit" style="color: orange;">&#xE254;</i></button>
                                        </form>
                                        <form action="<?php echo base_url().'Users/deleteuser' ?>" method="post">
                                            <input type="hidden" name="id" value="<?php echo $row->uid ?>">
                                            <button style="border:none; background:transparent;" type="submit"  href="#deleteEmployeeModal" id="idd" class="delete emeliyyat" data-toggle="modal" ><i class="material-icons" data-toggle="tooltip"  title="Delete" style="color:red;">&#xE872; </i></button> 
                                        </form>
                                        
                                        
                                    </td>
                                </tr>

                            </tbody>
                            <?php endforeach ?>
                        </table>
                        <div class="clearfix" >
                            <?php echo $links;?>
                        </div>
                    </div>
                </div>        
            </div>
<?php $this->load->view('admin/include/footer') ?>
<script>
    $(document).ready(function(){
        var isadmin="<?php echo $this->session->userdata('isadmin'); ?>";
        if (isadmin) {
            alert(isadmin);
        }
        var boss="<?php echo $this->session->userdata('boss'); ?>";
        if (boss) {
            alert(boss);
        } 
        var bosss="<?php echo $this->session->userdata('bosss'); ?>";
        if (bosss) {
            alert(bosss);
        }
        var updatedu="<?php echo $this->session->userdata('updatedu'); ?>";
        if (updatedu) {
            alert(updatedu);
        } 
        var deleted="<?php echo $this->session->userdata('deleted'); ?>";
        if (deleted) {
            alert(deleted);
        }
    })
</script>