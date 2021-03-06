<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="index, follow">
  <!-- seo tags -->
  <meta name="description" content="<?php echo $site_description;?>">
  <meta name="keywords" content="<?php echo $site_keywords;?>">
  <meta name="url" content="<?php echo $site_url;?>">
  <meta name="copyright" content="<?php echo $site_name;?> | <?php echo $site_url;?>">
  <!-- open graph protocol -->
  <meta property="og:title" content="<?php echo $site_name;?> | <?php echo $title;?>">
  <meta property="og:description" content="<?php echo $site_description;?>">
  <meta property="og:url" content="<?php echo $site_url;?>">
  <meta property="og:site_name" content="<?php echo $site_name;?>">
  <!-- favicon -->
  <link rel="shortcut icon" href="<?php echo $site_url;?>public/favicon.ico">
  <meta property="og:image" content="<?php echo $site_url;?>public/img/favicon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $site_url;?>public/img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $site_url;?>public/img/favicon-16x16.png">
  <!-- styles  -->
  <?php if(file_exists('public/css/style-min.css')):?>
  <link rel="stylesheet" type="text/css" href="<?php echo $site_url;?>public/css/style-min.css">
  <?php else:?>
  <link rel="stylesheet" type="text/css" href="<?php echo $site_url;?>public/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $site_url;?>public/css/layout.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $site_url;?>public/css/banner.css">
  <?php endif?>
  
  <title><?php echo $site_name; ?></title>
</head>
<body class="bg-cross">
