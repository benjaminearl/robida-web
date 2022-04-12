<?php snippet('header') ?>

<div id="left">
  <h1><?= $page->title() ?></h1>
  <p><?= $page->Text()->kt() ?></p>
  <a href="<?= $page->archive() ?>">Go to archive →</a>
</div>

<div id="right">
  <h2>Upcoming broadcast</h2>
  <?php
  $broadcasts = $page->children()->filterBy('toggle', 'true');
  ?>

  <?php foreach($broadcasts as $broadcast): ?>
    <h3><?= $broadcast->title() ?></h3>
    <ul>
      <?php $shows = $broadcast->children(); foreach($shows as $show): ?>
      <li>
        <?= $show->starttime()->toDate('H:i') ?>-<?= $show->endtime()->toDate('H:i') ?> |
        <?= $show->title()->html() ?> |
        <?php $hosts =  $show->people()->toPages();  foreach($hosts as $host): ?><a href="<?= $host->url() ?>"><?= $host->title() ?></a>
        <?php endforeach ?>
      </li>
      <?php endforeach ?>
    </ul>
  <?php endforeach ?>
</div>




<?php snippet('nav') ?>
<?php snippet('footer') ?>
