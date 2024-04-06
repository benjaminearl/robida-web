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
    <?php if($image = $page->cover()->toFile()): ?>
      <img src="<?= $image->url() ?>" alt="">
    <?php endif ?>

    <?php if($subpages = $page->children()->listed()): ?>
      <ul><?php foreach ($subpages as $subpage): ?>
        <li><a href="<?= $subpage->url() ?>"><?= $subpage->title() ?></a></li>
      <?php endforeach ?>
    </ul>
    <?php endif ?>
  </div>
</div>

<?php snippet('footer') ?>
