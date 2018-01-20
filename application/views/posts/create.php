    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Hello, world!</h1>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
      </div>
      <div class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
<?php
if(!empty(validation_errors())):
echo '<div class="alert alert-danger" role="alert">';
echo validation_errors();
echo "</div>";
endif;  ?>

            <?php echo form_open('posts/create') ?>
              <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" name = "title" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Select Category</label>
    <select class="form-control" name="category_id" >
        <?php foreach($categories as $category): ?>
        <option value="<?php echo $category->category_id;  ?>"><?php echo $category->name; ?></option>
<?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="mytext" name="content" rows="6"></textarea>
  </div>

    <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <input type="submit" class="btn btn-primary" name="submit" value="create post" >
  </div>



            </form>       
          </div><!-- /.blog-post -->
          </div>
          </div>
</main>