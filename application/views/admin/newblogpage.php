<?php $this->load->view('admin/include/headlbar') ?>
<?php $this->load->view('admin/include/topbar') ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      
      <h2>Add Blog</h2>
      
      <form enctype="multipart/form-data" action="<?= base_url().'blog/addblog' ?>" method="post">
        
        <div class="form-group">
          <input type="text" class="form-control" name="title" placeholder="Title">
        </div>
        <div class="form-group">
          <textarea rows="7" class="form-control" id="post" name="post" placeholder="Blog Desc"></textarea>
        </div>
        <div class="form-group">
          <input type="file" class="form-control" name="image" placeholder="Image Url">
        </div>
        <div class="form-group">
        <select name="category" class="form-select" aria-label="Default select example">
          <option value="Choose Category">Choose Category</option>
          <?php foreach ($categories as $category): ?>
          <option value="<?php echo $category->name ?>"><?php echo $category->name ?></option>
          <?php endforeach ?>
          
        </select>
        <select name="author" class="form-select" aria-label="Default select example">
          <option value="Choose Author">Choose Author</option>
          <?php foreach ($authors as $author): ?>
          <option value="<?php echo $author->uname ?>"><?php echo $author->uname ?></option>
          <?php endforeach ?>
          
        </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Blog</button>


      </form>

    </main> 
<?php $this->load->view('admin/include/footer') ?>
<script>
  ClassicEditor
  .create(document.querySelector('#post'));
</script>