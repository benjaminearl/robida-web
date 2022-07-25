<?php snippet('header') ?>
<?php snippet('nav') ?>

<div id="center">
  <div id="left">
    <h1><?= $page->title() ?></h1>
    <div class="section">
      <div class="bodytext">
        <p><?= $page->Text()->kt() ?></p>
      </div>
    </div>
  </div>

  <div id="right">
    <div class="section">
      <?php
      $broadcasts = $page->children()->filterBy('toggle', 'true');
      ?>

      <?php foreach($broadcasts as $broadcast): ?>
        <h3>Upcoming broadcast: <span style="color:#333;"><?= $broadcast->title() ?><span></h3>
        <ul class="radio-schedule">
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
    <div class="section">
      <h3>Past broadcasts: <span style="color:#333;"><a href="<?= $page->archive() ?>">Go to archive →</a></span><h3>
    </div>
  </div>
</div>



<?php snippet('rightbar') ?>
<?php snippet('footer') ?>
