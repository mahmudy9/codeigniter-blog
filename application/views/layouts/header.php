<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Document</title>
            <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>" />
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap-grid.min.css')?>" />
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap-reboot.min.css')?>" />
    <!--script src="<? //base_url('assets/tinymce/tinymce.min.js')?>"> </script-->
          <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>
        tinymce.init({
            selector : "#mytext",
            height   : 400,
            width    : 700,
            //toolbar: 'undo redo | styleselect | bold italic | link image',
            plugins : 'codesample link image hr table textcolor contextmenu lists charmap preview anchor spellchecker searchreplace code textcolor',
            toolbar1  : 'undo redo styleselect bold italic forecolor backcolor alignleft aligncenter alignright charmap preview anchor spellchecker searchreplace ',
             toolbar2 :'bullist numlist outdent indent hr blockquote table tabledelete textcolor codesample code link unlink image source',
        });
    </script>
</head>
  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Blogger</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>categories">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>user/contact">Contact</a>
          </li>
                    <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
          </li>
          <?php if(!empty($this->session->user_id)): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>posts/create">Create Post</a>
          </li>
          <?php endif; ?>
          <?php if(empty($this->session->user_id)): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>user/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>user/register">Register</a>
          </li>
      <?php endif; ?>
      <?php if(!empty($this->session->user_id)): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="<?php echo base_url(); ?>user/profile">Profile</a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>user/settings">Settings</a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>user/logout">Logout</a>
            </div>
          </li>
      <?php endif; ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <?php if(!empty($this->session->flashdata('login_success'))): ?>
        <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('login_success');  ?>
        </div>

      <?php endif; ?>

          <?php if(!empty($this->session->flashdata('error_logging'))): ?>
        <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('error_logging');  ?>
        </div>

      <?php endif; ?>