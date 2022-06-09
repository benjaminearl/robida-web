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
            <p class="mag-text-block"><?= $HomepageBlocks->title() ?></p>
            <?php if ($issueCover = $latestIssue->cover()->toFile()): ?>
              <img src="<?= $issueCover->url() ?>" class="homepage-mag-cover" /> 
            <?php endif ?>
          </div>
        </a>

      <!-- RADIO BLOCK -->
      <?php elseif ($HomepageBlocks->title() == 'Radio Robida'): ?>
        <?php $upcomingBroadcast = $HomepageBlocks->children()->last() ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block-link">
          <div class="block">
            <p><?= $HomepageBlocks->title() ?></p>
            <p>Upcoming Broadcast: <span><?= $upcomingBroadcast->date() ?></span></p>
            <?php if($upcomingShows = $upcomingBroadcast->children()): ?>
              <ul class="radio-schedule">
              <?php foreach($upcomingShows as $upcomingShows): ?>
              <li>
                <p><?= $upcomingShows->title() ?></p>
              </li>
              <?php endforeach ?>
            </ul>
            <?php endif ?>
          </div>
        </a>
      <?php endif; ?>

      <!-- ACADEMY OF MARGINS BLOCK -->
      <?php if ($HomepageBlocks->title() == 'Academy of Margins'): ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block-link">
          <div class="block">
            <p class="title-text-block"><?= $HomepageBlocks->title() ?></p>
              <?php if($coverPhoto = $HomepageBlocks->coverImage()->toFile()): ?>
                <img src="<?= $coverPhoto->url() ?>" class="aom-cover" /> 
              <?php endif ?>
          </div>
        </a>
      <?php endif ?>

      <!-- RESIDENCIES BLOCK -->
      <?php if ($HomepageBlocks->title() == 'Residency'): ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block-link">
          <div class="block">
            <p class="title-text-block"><?= $HomepageBlocks->title() ?></p>
            <?php if($residents = $HomepageBlocks->currentResidents()->toPages()): ?>
              <ul>
              <?php foreach($residents as $residents): ?>
                <li><?= $residents->title() ?></li>
              <?php endforeach ?>
              </ul>
            <?php endif ?>
          </div>
        </a>
      <?php endif ?>

      <!-- TOPOLO BLOCK -->
      <?php if ($HomepageBlocks->title() == 'Topolo'): ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block-link">
          <div class="block">
            <p class="title-text-block"><?= $HomepageBlocks->title() ?></p>
          </div>
        </a>
      <?php endif ?>


      <!-- JOURNAL BLOCK -->
      <?php if ($HomepageBlocks->title() == 'Journal'): ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block-link">
          <div class="block">
            <p class="title-text-block"><?= $HomepageBlocks->title() ?></p>
          </div>
        </a>
      <?php endif ?>

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
