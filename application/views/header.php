<!DOCTYPE html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="<?php echo $this->config->base_url(); ?>">
  <title>
    <?php if (!empty($head_title)): ?>
      <?php print $head_title; ?> | Test Wiki
    <?php else: ?>
      Test Wiki
    <?php endif; ?>
  </title>
</head>
<body>
  <div class="wrapper">

    <header>
      <h1>Test Wiki</h1>
      <h2><?php print $page_title; ?></h2>
    </header>
