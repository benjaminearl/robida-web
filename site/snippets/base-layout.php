<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital@0;1&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ka215/jquery.timeline@main/dist/jquery.timeline.min.css">
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
  <link rel="manifest" href="/favicon/site.webmanifest">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <?php ?><title><?= $site->title() ?> | <?= $page->title() ?></title>
  <?php ?>
  <?= css([
    'assets/css/style.css',
    'assets/css/style-cleanup.css',
    '@auto'
  ]) ?>
  <?php ?>
  <link rel="shortcut icon" type="image/x-icon" href="<?= url('favicon.ico') ?>">
  <?= $slots->head() ?>
</head>

<body data-barba="wrapper">
    
    <header>
        <a class="site-title" href="<?= $site->url() ?>">
            <img class="site-title__img" src="https://robidacollective.com/assets/images/robida_logo_vector.png" alt="Robida">
        </a>
        <div class="audio green-audio-player">
            <p style="display:inline-block; padding-right: 1em;">
                Radio Robida
            </p>
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
            <?php if ($page->radioStream()->isNotEmpty()) : ?>
                <source src="<?= $page->radioStream()->url() ?>" type="audio/mpeg">
            <?php else: ?>
                <source src="https://radio.goodtimesbadtimes.club/radio/8060/radio.mp3" type="audio/mpeg">
            <?php endif ?>
            </audio>
        </div>

        </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/@barba/core"></script>

    <div data-barba="container" data-barba-namespace="home">
        <div id="left-sidebar" class="sidebar">
            <div id="closeLeft" onclick="closeNav()">
            <<
        </div>
            <div id="openLeft" onclick="openNav()">
            Menu
        </div>
            <nav id="menu">
                <ul>
                    <?php $items = $pages->listed(); ?>
                    <?php foreach($items as $item): ?>
                    <?php if ($item->hasChildren()): ?>
                        <li class="container"><p><a<?php e($item->isOpen(), ' class="active"') ?> href="<?= $item->url() ?>" style="pointer-events: none;"><?= $item->title()->html() ?></a></p>
                        <ul>
                            <?php $children =  $item->children();  foreach($children as $child): ?>
                            <li><p><a<?php e($child->isOpen(), ' class="active"') ?> href="<?= $child->url() ?>"><?= $child->title()->html() ?></a></p></li>
                            <?php endforeach ?>
                        </ul>
                        </li>
                    <?php else: ?>
                        <li><p><a<?php e($item->isOpen(), ' class="active"') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></p></li>
                    <?php endif; ?>
                    <?php endforeach ?>
                </ul>
            </nav>
        </div>
            
        <?= $slot ?>

        <div id="right-sidebar" class="sidebar">
            <span id="openRight" onclick="openGlossary()">ABC</span>
            <div id="glossary-content">
                <div id="glossary-title"><h1><?= page('glossary')->title() ?></h1><span id="closeRight" onclick="closeGlossary()">>></span>
                </div>
                <div class="bodytext" style="padding: 1rem;">
                    <ul>
                    <?php $items = $site->find('glossary')->children()->listed()->sortBy('title', 'asc'); ?>
                    <?php foreach ($items as $item): ?>
                        <h2 class="collapsible"><?= $item->title() ?></h2>
                        <div class="content">
                            <p><?= $item->text()->kt() ?></p>

                        </div>
                        <hr>
                    <?php endforeach ?>
                    <ul>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div id="currently-in-topolo">
            <marquee scrollamount="5">
            <span style="color:lightgrey;">Currently in Topolò:</span>
            <?php foreach($site->find('community')->find('people')->children()->sortBy('num', 'desc')->filterBy('category', 'home') as $person): ?>
            <a class="profile" style="background-color: <?php echo $person->color(); ?>" href="<?= $person->url() ?>"><?= html($person->title()) ?></a>
            <?php endforeach ?>
            </marquee>
        </div>
        <div id="contact">
            <a href="https://www.instagram.com/r_o_b_i_d_a/" target="_blank">IG</a>
        </div>
    </footer>
    


  <?= js([
    'assets/js/jquery.js',
    'assets/js/index.js',
    'assets/js/barbainit.js',
    'assets/js/audio-player.js',
    'assets/js/jquery-timeline.js',
    '@auto'
  ]) ?>


</body>
</html>