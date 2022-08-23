<?php snippet('header') ?>

<?php snippet('nav') ?>
<div id="center">
  <div id="top">
    <?php $HomepageBlocks =  $page->homeBlocks()->toPages();
    foreach($HomepageBlocks as $HomepageBlocks): ?>

      <!-- MAGAZINE BLOCK -->
      <?php if ($HomepageBlocks->title() == 'Robida Magazine'): ?>
        <?php $latestIssue = $HomepageBlocks->children()->first() ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block">
            <h1><?= $HomepageBlocks->title() ?></h1>
            <?php if ($issueCover = $latestIssue->files()->findBy('template', 'cover')): ?>
              <img src="<?= $issueCover->url() ?>" />
            <?php endif ?>
        </a>

      <!-- RADIO BLOCK -->
      <?php elseif ($HomepageBlocks->title() == 'Radio Robida'): ?>
        <?php $futureBroadcasts = $HomepageBlocks->children()->sortBy('date', 'asc')->filterBy('date', 'date >=', 'today');
          $upcomingBroadcast = $futureBroadcasts->first(); ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block">
            <h1><?= $HomepageBlocks->title() ?></h1>
            <?php if ($futureBroadcasts->isNotEmpty()): ?>
              <div class="block-content">
                  <h3>Upcoming broadcast: <span style="color:#333"><?= $upcomingBroadcast->date()->toDate('d M Y') ?></span></h3>
                  <ul>
                    <?php $shows = $upcomingBroadcast->children(); foreach($shows as $show): ?>
                    <li class="roundBorder">
                      <?= $show->starttime()->toDate('H:i') ?>-<?= $show->endtime()->toDate('H:i') ?> |
                      <?= $show->title()->html() ?> |
                      <?php $hosts =  $show->people()->toPages();  foreach($hosts as $host): ?><a href="<?= $host->url() ?>"><?= $host->title() ?></a>
                      <?php endforeach ?>
                    </li>
                    <?php endforeach ?>
                  </ul>

            </div>
            <?php endif; ?>

        </a>

            <!-- RESIDENCIES BLOCK -->
            <?php elseif ($HomepageBlocks->title() == 'Residency'): ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block">

            <h1><?= $HomepageBlocks->title() ?></h1>
            <div class="block-content">
            <?php if($HomepageBlocks->currentResidents()->isNotEmpty()): ?>
              <?php if($residents = $HomepageBlocks->currentResidents()->toPages()): ?>
                <h3>Current residents:</h3>
                <ul>
                <?php foreach($residents as $residents): ?>
                  <li class="profile"><?= $residents->title() ?></li>
                <?php endforeach ?>
                </ul>
              <?php endif ?>
            <?php endif ?>
          </div>

        </a>

      <!-- EVERYTHING ELSE -->
      <?php else : ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block">
            <h1><?= $HomepageBlocks->title() ?></h1>
              <?php if($coverPhoto = $HomepageBlocks->files()->findBy('template', 'cover')): ?>
                <img src="<?= $coverPhoto->url() ?>"/>
              <?php endif ?>
        </a>
      <?php endif ?>

    <?php endforeach ?>
  </div>

  <!-- CALENDAR -->
  <div id="middle">
    <?php $items = $site->index()->filterBy('template', 'event'); ?>
    <div id="myTimeline">
      <ul class="timeline-events">
      <?php $i = 0;
      foreach($items as $items): $i++; ?>
        <?php if($items->altLink()->isNotEmpty()): ?>
          <?php $alternateLink = $items->altLink()->toPage() ?>
          <li data-timeline-node="{ start:'<?= $items->fromDate() ?> <?=$items->fromTime() ?>', end:'<?= $items->toDate() ?> <?= $items->toTime() ?>', row:'<?php echo $i ?>' }">
            <a href="<?= $alternateLink->url() ?>"><?= $items->title() ?></a>
          </li>
        <?php else: ?>
          <li data-timeline-node="{ start:'<?= $items->fromDate() ?> <?=$items->fromTime() ?>', end:'<?= $items->toDate() ?> <?= $items->toTime() ?>', row:'<?php echo $i ?>' }">
            <a href="<?= $items->url() ?>"><?= $items->title() ?></a>
          </li>
          <?php endif ?>
        <?php if($i > 5): $i = 0 ?>
        <?php endif ?>
      <?php endforeach ?>
      </ul>
    </div>
  </div>

  <div id="bottom">
    <div class="block">
      Journal
    </div>
    <div class="block">
      Journal
    </div>
    <div class="block">
      Journal
    </div>
    <div class="block">
      Journal
    </div>
  </div>
</div>


<?php snippet('rightbar') ?>
<?php snippet('footer') ?>
