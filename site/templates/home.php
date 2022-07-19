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
        <a href="<?= $HomepageBlocks->url() ?>" class="block-link">
          <div class="block">
            <h1 class="block-title"><?= $HomepageBlocks->title() ?></h1>
            <?php if ($issueCover = $latestIssue->cover()->toFile()): ?>
              <img src="<?= $issueCover->url() ?>" class="block-cover" />
            <?php endif ?>
          </div>

        </a>

      <!-- RADIO BLOCK -->
      <?php elseif ($HomepageBlocks->title() == 'Radio Robida'): ?>
        <?php $upcomingBroadcast = $HomepageBlocks->children()->last() ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block-link">
          <div class="block">
            <h1><?= $HomepageBlocks->title() ?></h1>
            <div class="block-content">
            <h3><span style="color:lightgrey;">Upcoming broadcast: </span><?= $upcomingBroadcast->title() ?></h3>
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
          </div>
        </a>
      <?php endif; ?>

      <!-- ACADEMY OF MARGINS BLOCK -->
      <?php if ($HomepageBlocks->title() == 'Academy of Margins'): ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block-link">
          <div class="block">
            <h1 class="title-text-block"><?= $HomepageBlocks->title() ?></h1>
              <?php if($coverPhoto = $HomepageBlocks->coverImage()->toFile()): ?>
                <img src="<?= $coverPhoto->url() ?>" class="block-cover" />
              <?php endif ?>
          </div>
        </a>
      <?php endif ?>

      <!-- RESIDENCIES BLOCK -->
      <?php if ($HomepageBlocks->title() == 'Residency'): ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block-link">
          <div class="block">
            <h1 class="title-text-block"><?= $HomepageBlocks->title() ?></h1>
            <div class="block-content">
            <?php if($residents = $HomepageBlocks->currentResidents()->toPages()): ?>
              <h3><span style="color:lightgrey;">Current residents: </span></h3>
              <ul>
              <?php foreach($residents as $residents): ?>
                <li class="profile"><?= $residents->title() ?></li>
              <?php endforeach ?>
              </ul>
            <?php endif ?>
          </div>
          </div>
        </a>
      <?php endif ?>

      <!-- TOPOLO BLOCK -->
      <?php if ($HomepageBlocks->title() == 'Topolo'): ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block-link">
          <div class="block">
            <h1 class="title-text-block"><?= $HomepageBlocks->title() ?></h1>
          </div>
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
  <div id="middle">
    <div id="myTimeline">
      <ul class="timeline-events">
        <!-- <li data-timeline-node="{ start:'2022-07-01 10:00',end:'2022-07-1 13:00',content:'<p>Event Body...</p>' }">Event Label</li>
        <li data-timeline-node="{ start:'2022-07-01 23:10',end:'2022-07-02 1:30' }">
          <span class="event-label">Event Label</span>
          <span class="event-content"><p>Event Body...</p></span>
        </li> -->
      </ul>
    </div>
  </div>
  <!-- <div id="bottom">
    <div class="block"></div>
    <div class="block"></div>
    <div class="block"></div>
    <div class="block"></div>
    <div class="block"></div>
    <div class="block"></div>
  </div> -->
</div>


<?php snippet('rightbar') ?>
<?php snippet('footer') ?>
