<?php snippet('base-layout', slots: true) ?>

  <?php slot() ?>
    <main id="center" data-barba="container" data-barba-namespace="home">
        <div class="main__top">
          <?php $HomepageBlock =  $page->homeBlocks()->toPages();
          foreach($HomepageBlock as $HomepageBlocks): ?>

            
            <?php if ($HomepageBlocks->title() == 'Robida Magazine'): ?>
              <!-- MAGAZINE BLOCK -->
              <?php $latestIssue = $HomepageBlocks->children()->first() ?>
              <div class="home__block">
                <a href="<?= $HomepageBlocks->url() ?>">
                  <h2><?= $HomepageBlocks->title() ?></h2>
                </a>
                  <?php if ($issueCover = $latestIssue->files()->findBy('template', 'cover')): ?>
                    <img src="<?= $issueCover->url() ?>" />
                  <?php endif ?>
              </div>

            <!-- RADIO BLOCK -->
            <?php elseif ($HomepageBlocks->title() == 'Radio Robida'): ?>
              <?php $futureBroadcasts = $HomepageBlocks->children()->sortBy('date', 'asc')->filterBy('date', 'date >=', 'today');
                $upcomingBroadcast = $futureBroadcasts->first(); ?>
              <div class="home__block">
                <a class="home__block__title" href="<?= $HomepageBlocks->url() ?>">
                  <h2><?= $HomepageBlocks->title() ?></h2>
                </a>
                <div class="home__block__content">
                    <?php if ($futureBroadcasts->isNotEmpty()): ?>
                          <h3>Upcoming broadcast: <span style="color:#333"><?= $upcomingBroadcast->date()->toDate('d M Y') ?></span></h3>
                          <ul>
                            <?php $shows = $upcomingBroadcast->children(); foreach($shows as $show): ?>
                            <li class="roundBorder">
                              <?= $show->starttime()->toDate('H:i') ?>-<?= $show->endtime()->toDate('H:i') ?> |
                              <?= $show->title()->html() ?>
                              <?php $hosts =  $show->people()->toPages();  foreach($hosts as $host): ?>
                                | <a href="<?= $host->url() ?>"><?= $host->title() ?></a>
                              <?php endforeach ?>
                            </li>
                            <?php endforeach ?>
                          </ul>
                    <?php endif; ?>
                </div>
              </div>

                
                  <?php elseif ($HomepageBlocks->title() == 'Residency'): ?>
                    <!-- RESIDENCIES BLOCK -->
              <div class="home__block">
                <a class="home__block__title" href="<?= $HomepageBlocks->url() ?>">
                  <h2><?= $HomepageBlocks->title() ?></h2>
                </a>
                <div class="home__block__content">
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
              </div>

            
            <?php else : ?>
              <!-- OTHER BLOCKS -->
              <div class="home__block">
                <a class="home__block__title" href="<?= $HomepageBlocks->url() ?>">
                  <h2><?= $HomepageBlocks->title() ?></h2>
                </a>
                    <?php if($coverPhoto = $HomepageBlocks->files()->findBy('template', 'cover')): ?>
                      <img src="<?= $coverPhoto->url() ?>"/>
                    <?php endif ?>
              </div>
            <?php endif ?>

          <?php endforeach ?>
        </div>

        <!-- CALENDAR -->
        <div class="main__middle">
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
              <?php if($i > 4): $i = 0 ?>
              <?php endif ?>
            <?php endforeach ?>
            </ul>
          </div>
        </div>

        <div class="main__bottom">
          <?php $journalEntries =  $site->find('community')->find('journal')->children()->listed()->flip();
          foreach($journalEntries as $journalEntry): ?>
            <a href="<?= $journalEntry->url() ?>" class="home__block home__block--journal" style="border-color: <?php echo $journalEntry->people()->toPage()->color(); ?>">
                <h4><?= $journalEntry->title() ?></h4>
                <small>
                  on: <?= $journalEntry->date()->toDate('d/m/Y') ?><br>
                  <span style="position:absolute;bottom:1em;">by: <mark class="profile" style="background-color: <?php echo $journalEntry->people()->toPage()->color(); ?>"><?= $journalEntry->people()->toPage()->title() ?></mark></span>
                </small>

            </a>
          <?php endforeach ?>
        </div>
      </main>
  <?php endslot() ?>

<?php endsnippet() ?>