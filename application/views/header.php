<!DOCTYPE html>
<head>
  <base href="<?php echo $this->config->base_url(); ?>">
  <title>
    <?php if (!empty($head_title)): ?>
      <?php print $head_title; ?> | Test Site
    <?php else: ?>
      Test Site
    <?php endif; ?>
  </title>
</head>
<body>
  <div class="wrapper">

    <header>
      <h1>Test Site</h1>
      <h2><?php print $page_title; ?></h2>
    </header>
