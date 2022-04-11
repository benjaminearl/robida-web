<?php snippet('header') ?>

<h1><?= $page->title() ?></h1>
<?php if($image = $page->cover()->toFile()): ?>
     <img src="<?= $image->url() ?>" alt="">
<?php endif ?>
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



<?php snippet('footer') ?>
