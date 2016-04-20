<!doctype html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
