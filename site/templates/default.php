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

  </div>
</div>


<?php snippet('rightbar') ?>
<?php snippet('footer') ?>
