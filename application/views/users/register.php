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
            <?php echo form_open('user/register') ?>
              <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name" name = "name" value="<?php echo set_value('name');  ?>" >
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email" name = "email" value="<?php echo set_value('email');  ?>" >

  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="exampleFormControlInput1" name = "password" >

  </div>  
  <div class="form-group">
    <label for="exampleFormControlInput1">Password Confirmation</label>
    <input type="password" class="form-control" id="exampleFormControlInput1" name = "passconf" >

  </div>
  <div class="form-group">
    <label for="submit"></label>
    <input type="submit" class="btn btn-primary" id="exampleFormControlInput1" name = "submit" value="register" >

  </div>



            </form>       
          </div><!-- /.blog-post -->
          </div>
          </div>
</main>