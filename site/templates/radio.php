<?php snippet('header') ?>
<?php snippet('nav') ?>

<div id="center">
  <div id="left">
    <h1><?= $page->title() ?></h1>
    <p><?= $page->Text()->kt() ?></p>
    <a href="<?= $page->archive() ?>">Go to archive →</a>
  </div>

  <div id="right">
    <?php
    $broadcasts = $page->children()->filterBy('toggle', 'true');
    ?>

    <?php foreach($broadcasts as $broadcast): ?>
      <h2> <span style="color:lightgrey;">Upcoming broadcast:</span> <?= $broadcast->title() ?></h2>
      <ul>
        <?php $shows = $broadcast->children(); foreach($shows as $show): ?>
        <li class="roundBorder">
          <?= $show->starttime()->toDate('H:i') ?>-<?= $show->endtime()->toDate('H:i') ?> |
          <?= $show->title()->html() ?> |
          <?php $hosts =  $show->people()->toPages();  foreach($hosts as $host): ?><a href="<?= $host->url() ?>"><?= $host->title() ?></a>
          <?php endforeach ?>
        </li>
        <?php endforeach ?>
      </ul>
    <?php endforeach ?>
  </div>
</div>



<?php snippet('rightbar') ?>
<?php snippet('footer') ?>
