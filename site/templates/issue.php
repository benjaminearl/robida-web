<?php snippet('header') ?>

<?php snippet('header') ?>

<?php snippet('nav') ?>
<div id="center">
  <div id="left">
    <div class="parent">
      <a href="<?= $page->parent()->url() ?>"><< <?= $page->parent()->title() ?></a>
    </div>

    <h1><?= $page->title() ?></h1>

    <p>
      <?= $page->Theme() ?>
    </p>
    <p><?= $page->Text() ?></p>

    <?php

    $items = $page->colophon()->toStructure();

    foreach ($items as $item): ?>

      <p><?= $item->role()->html() ?></p>

        <?php $people = $item->person()->toPages();
        foreach ($people as $person): ?>
          <p><?= $person->title() ?></p>
        <?php endforeach ?>

    <?php endforeach ?>
  </div>
  <div id="right">
    <?php if($image = $page->cover()->toFile()): ?>
         <img src="<?= $image->url() ?>" alt="">
    <?php endif ?>
  </div>
</div>


<?php snippet('rightbar') ?>
<?php snippet('footer') ?>
