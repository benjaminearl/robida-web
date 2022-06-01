<?php snippet('header') ?>
<!-- <h1><?= $page->title() ?></h1>
<p><?= $page->Text()->kt() ?></p> -->

<?php snippet('nav') ?>
<div id="center">
  <div id="top">
    <?php
  $HomepageBlocks =  $page->homeBlocks()->toPages();
  foreach($HomepageBlocks as $HomepageBlocks): ?>
    <a href="<?= $HomepageBlocks->url() ?>"><div class="block <?= $HomepageBlocks->title() ?>"><?= $HomepageBlocks->title() ?></div></a>
  <?php endforeach ?>
  </div>
  <div id="middle">

  </div>
  <div id="bottom">
    <div class="block"></div>
    <div class="block"></div>
    <div class="block"></div>
    <div class="block"></div>
    <div class="block"></div>
    <div class="block"></div>
  </div>
</div>


<?php snippet('rightbar') ?>
<?php snippet('footer') ?>
