<?php snippet('header') ?>
<?php snippet('nav') ?>

<div id="center">
  <div id="left">
    <h1><?= $page->title() ?></h1>
    <section>
      <div class="bodytext">
        <p><?= $page->Text()->kt() ?></p>
      </div>
    </section>
  </div>

  <div id="right">
    <section>
      <h2>Upcoming</h2>

      <?php $broadcasts = $page->children()->filterBy('toggle', 'true');
      foreach($broadcasts as $broadcast): ?>
        <h3><?= $broadcast->title() ?><span></h3>
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
    </section>

    <section>
      <h2>Past</h2>
      <h3><a href="<?= $page->archive() ?>" target="_blank">Go to archive →</a><h3>
    </section>

  </div>
</div>



<?php snippet('rightbar') ?>
<?php snippet('footer') ?>
