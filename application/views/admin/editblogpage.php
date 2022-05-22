<?php $this->load->view('admin/include/headlbar') ?>
<?php $this->load->view('admin/include/topbar') ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      
      <h2>Redaktə </h2>
      
      <form enctype="multipart/form-data" action="<?= base_url().'blog/editblog' ?>" method="post" enctype="multipart/form-data">
        
        <div class="form-group">
          <input type="hidden" class="form-control" name="id" value="<?=$id?>">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="title" placeholder="Title" value="<?=$title?>">
        </div>
        <div class="form-group">
          <textarea rows="7" class="form-control" id="post" name="post" placeholder="Blog Desc"><?=$post?></textarea>
        </div>
        <div class="form-group">
          <input type="file" class="form-control" name="image" placeholder="Image Url" value="<?=base_url()."/images/".$image?>">
        </div>
        <div class="form-group">
        <select name="category" id="catsel" class="form-select" aria-label="Default select example">
          <option value="Choose Category">Choose Category</option>
          <?php foreach ($categories as $category): ?>
          <option value="<?php echo $category->name ?>"><?php echo $category->name ?></option>
          <?php endforeach ?>
          
        </select>
        <select name="author" id="autsel" class="form-select" aria-label="Default select example">
          <option value="Choose Author">Choose Author</option>
          <?php foreach ($authors as $author): ?>
          <option value="<?php echo $author->uname ?>"><?php echo $author->uname ?></option>
          <?php endforeach ?>
          
        </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Blog</button>


      </form>
      <input type="hidden" id="updtd" value="<?php echo $this->session->updated ?>">
      <input type="hidden" id="catselected" value="<?php echo $categoryname ?>">
      <input type="hidden" id="autselected" value="<?php echo $authorname ?>">
    </main> 
<?php $this->load->view('admin/include/footer') ?>
<script>
  
  $(document).ready(function(){
    category=$('#catselected').val();
    author=$('#autselected').val();
    $('#catsel').val(category).change();
    $('#autsel').val(author).change();
    var updated=$("updtd").val();
    if(updated=="no"){
    console.log('Succesfully failed to update')
  } 
  })
</script>
<script>
  ClassicEditor
  .create(document.querySelector('#post'));
</script>