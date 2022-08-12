<?php snippet('header') ?>
<?php snippet('nav') ?>

<div id="center">
  <div id="left">
    <h1><?= $page->title() ?></h1>
    <div class="bodytext">
      <p><?= $page->Text()->kt() ?></p>
    </div>
  </div>
  <div id="right">
    <?php if($coverImage = $page->cover()->toFile()): ?>
      <img src="<?= $coverImage->url() ?>" alt="">
    <?php endif ?>

    <?php $images = $page->files()->filterBy('template', 'gallery');
    foreach ($images as $image): ?>
      <img src="<?= $image->url() ?>" alt="">
    <?php endforeach ?>

    <?php if($subpages = $page->children()->listed()): ?>
      <ul><?php foreach ($subpages as $subpage): ?>
        <a href="<?= $subpage->url() ?>"><li><h2>>> <?= $subpage->title() ?></h2></li></a>
        <?php endforeach ?>
      </ul>
    <?php endif ?>

  </div>
</div>


<?php snippet('rightbar') ?>
<?php snippet('footer') ?>
