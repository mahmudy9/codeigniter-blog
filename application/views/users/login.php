<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


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
            <?php echo form_open('user/login') ?>
              <div class="form-group">
    <label for="exampleFormControlInput1">email</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="email" name = "email" value="<?php echo set_value('email');  ?>">
  </div>
              <div class="form-group">
    <label for="exampleFormControlInput1">password</label>
    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="password" name = "password" >
  </div>

              <div class="form-group">
    <label for="exampleFormControlInput1"></label>
    <input type="submit" class="btn btn-primary" id="exampleFormControlInput1"  name = "submit" value="Log In" >
  </div>

        <?php echo form_close(); ?>
          </div><!-- /.blog-post -->
          </div>
          </div>
</main>