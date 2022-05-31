<?php?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital@0;1&display=swap" rel="stylesheet">

  <?php?><title><?= $site->title() ?> | <?= $page->title() ?></title>

  <?php?>
  <?= css([
    'assets/css/style.css',
    '@auto'
  ]) ?>

  <?php?>
  <link rel="shortcut icon" type="image/x-icon" href="<?= url('favicon.ico') ?>">
</head>
<body>

  <header>
    <img id="logo" src="https://robidacollective.com/assets/images/robida_logo_vector.png" alt="Robida" onclick="location.href='<?= $site->url() ?>';">
  </header>
