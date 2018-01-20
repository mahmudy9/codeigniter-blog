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
                    <h2 class="blog-post-title"><?php echo $post->title; ?></h2>
            <p class="blog-post-meta"><?php echo $post->created_at; ?> by <a href="#">Mark</a></p>
            <p class="blog-post-meta">category <a href="#"><?php echo $this->category_model->get_category($post->category_id);?></a></p>

            <p><?php echo $post->content; ?></p>
          </div><!-- /.blog-post -->
          </div>
          </div>
</main>