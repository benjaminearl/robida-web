<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital@0;1&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ka215/jquery.timeline@main/dist/jquery.timeline.min.css">

  <?php ?><title><?= $site->title() ?> | <?= $page->title() ?></title>

  <?php ?>
  <?= css([
    'assets/css/style.css',
    '@auto'
  ]) ?>

  <?php ?>
  <link rel="shortcut icon" type="image/x-icon" href="<?= url('favicon.ico') ?>">
</head>
<body data-barba="wrapper">

  <header>
    <div class="logo">
      <a href="<?= $site->url() ?>"><img id="logo" src="https://robidacollective.com/assets/images/robida_logo_vector.png" alt="Robida"></a>
    </div>
    <div class="audio green-audio-player">
    <p style="display:inline-block; padding-right: 1em;">Radio Robida</p>
      <div class="play-pause-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 18 24">
          <path fill="#000000" fill-rule="evenodd" d="M18 12L0 24V0" class="play-pause-icon" id="playPause"/>
        </svg>
      </div>
      <div class="controls">
        <span class="current-time">0:00</span>
        <div class="slider" data-direction="horizontal" style="display:none">
          <div class="progress">
          </div>
        </div>
      </div>
      <div class="volume">
        <div class="volume-btn">
        </div>
        <div class="volume-controls hidden">
          <div class="slider" data-direction="vertical">
          </div>
        </div>
      </div>
      <audio crossorigin>
        <source src="https://radio.goodtimesbadtimes.club/radio/8060/radio.mp3" type="audio/mpeg">
      </audio>
    </div>



     </div>
  </header>
  <script src="https://cdn.jsdelivr.net/npm/@barba/core"></script>
  <main data-barba="container" data-barba-namespace="home">
