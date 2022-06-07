<?php snippet('header') ?>
<!-- <h1><?= $page->title() ?></h1>
<p><?= $page->Text()->kt() ?></p> -->

<?php snippet('nav') ?>
<div id="center">
  <div id="top">
    <?php
    $HomepageBlocks =  $page->homeBlocks()->toPages();
    foreach($HomepageBlocks as $HomepageBlocks): ?>

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

      <?php elseif ($HomepageBlocks->title() == 'Radio Robida'): ?>
        <?php $upcomingBroadcast = $HomepageBlocks->children()->last() ?>
        <a href="<?= $HomepageBlocks->url() ?>" class="block-link">
          <div class="block">
            <p><?= $HomepageBlocks->title() ?></p>
            <p>Upcoming Broadcast: <span><?= $upcomingBroadcast->date() ?></span></p>
            <?php if($upcomingShows = $upcomingBroadcast->children()): ?>
              <ul>
              <?php foreach($upcomingShows as $upcomingShow): ?>
              <li>
                <p><?php $upcomingShow->title() ?></p>
              </li>
              <?php endforeach ?>
            </ul>
            
            <?php endif ?>
          </div>
        </a>
      <?php endif; ?>

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
