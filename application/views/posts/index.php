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
        <!-- Example row of columns -->
        <div class="row">
        <?php foreach($posts as $post): ?>
          <div class="col-sm-12">
            <h2><?php echo $post->title; ?></h2>
            <p class="blog-post-meta"><?=$post->created_at ?> by <a href="#">Mark</a></p>
            <p class="blog-post-meta">category : <?php echo $this->category_model->get_category($post->category_id);?> </p>
            <p><?php echo substr($post->content , 0 , 200); ?></p>
            <p><a class="btn btn-secondary" href="<?php echo base_url('posts/'.$post->post_id.'/'.$post->slug); ?>" role="button">View details &raquo;</a></p>
          </div>
<?php endforeach; ?>
        </div>

        <hr>

<div class="pagination-links">
		<?php echo $this->pagination->create_links(); ?>
</div>
      </div> <!-- /container -->


    </main>