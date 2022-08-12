<?php snippet('header') ?>

<?php snippet('nav') ?>
<div id="center">
  <div id="top">
    <?php
    $HomepageBlocks =  $page->homeBlocks()->toPages();
    foreach($HomepageBlocks as $HomepageBlocks): ?>

      <!-- MAGAZINE BLOCK -->
      <?php if ($HomepageBlocks->title() == 'Robida Magazine'): ?>
        <?php $latestIssue = $HomepageBlocks->children()->last() ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block">
            <h1><?= $HomepageBlocks->title() ?></h1>
            <?php if ($issueCover = $latestIssue->cover()->toFile()): ?>
              <img src="<?= $issueCover->url() ?>" />
            <?php endif ?>
        </a>

      <!-- RADIO BLOCK -->
      <?php elseif ($HomepageBlocks->title() == 'Radio Robida'): ?>
        <?php $upcomingBroadcast = $HomepageBlocks->children()->last() ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block">
            <h1><?= $HomepageBlocks->title() ?></h1>
            <div class="block-content">
            <h3>Upcoming broadcast: <span style="color:#333;"><?= $upcomingBroadcast->date()->toDate('D d M Y') ?></span></h3>
            <?php if($upcomingShows = $upcomingBroadcast->children()): ?>
              <ul class="radio-schedule">
              <?php foreach($upcomingShows as $upcomingShow): ?>
                <li class="roundBorder">
                  <p><?= $upcomingShow->starttime()->toDate('H:i') ?>-<?= $upcomingShow->endtime()->toDate('H:i') ?> |
                  <?= $upcomingShow->title()->html() ?>
                </li>
              <?php endforeach ?>
            </ul>
            <?php endif ?>
          </div>
        </a>
      <?php endif; ?>

      <!-- ACADEMY OF MARGINS BLOCK -->
      <?php if ($HomepageBlocks->title() == 'Academy of Margins'): ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block">

            <h1><?= $HomepageBlocks->title() ?></h1>
              <?php if($coverPhoto = $HomepageBlocks->cover()->toFile()): ?>
                <img src="<?= $coverPhoto->url() ?>"/>
              <?php endif ?>

        </a>
      <?php endif ?>

      <!-- RESIDENCIES BLOCK -->
      <?php if ($HomepageBlocks->title() == 'Residency'): ?>
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
      <?php endif ?>

      <!-- TOPOLO BLOCK -->
      <?php if ($HomepageBlocks->title() == 'Topolò'): ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block">
            <h1><?= $HomepageBlocks->title() ?></h1>
            <?php if($coverPhoto = $HomepageBlocks->cover()->toFile()): ?>
              <img src="<?= $coverPhoto->url() ?>" />
            <?php endif ?>

        </a>
      <?php endif ?>

            <!-- SUMMER SCHOOL -->
            <?php if ($HomepageBlocks->title() == 'Summer School'): ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block">
            <h1><?= $HomepageBlocks->title() ?></h1>
            <?php if($coverPhoto = $HomepageBlocks->cover()->toFile()): ?>
              <img src="<?= $coverPhoto->url() ?>" />
            <?php endif ?>
        </a>
      <?php endif ?>


      <!-- JOURNAL BLOCK -->
       <?php if ($HomepageBlocks->title() == 'Journal'): ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block-link">
          <div class="block">
            <h1 class="title-text-block"><?= $HomepageBlocks->title() ?></h1>
          </div>
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
</div>


<?php snippet('rightbar') ?>
<?php snippet('footer') ?>
