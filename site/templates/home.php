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
              <?php $futureBroadcasts = $HomepageBlocks->children()->sortBy('num', 'desc')->filterBy('fromDate', 'date >=', 'today');
                $lastBroadcast = $HomepageBlocks->children()->sortBy('num', 'desc')->filterBy('fromDate', 'date <', 'today')->first();
                $upcomingBroadcast = $futureBroadcasts->first(); ?>
              <div class="home__block">
                <a class="home__block__title" href="<?= $HomepageBlocks->url() ?>">
                  <h2><?= $HomepageBlocks->title() ?></h2>
                </a>
                <div class="home__block__content">
                    <?php if ($futureBroadcasts->isNotEmpty()): ?>
                          <h3>Upcoming broadcast: <span style="color:#333"><?= $upcomingBroadcast->fromDate()->toDate('d M Y') ?></span></h3>
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
                    <?php else: ?>
                      <h3>Last broadcast: <span style="color:#333"><?= $lastBroadcast->fromDate()->toDate('d M Y') ?></span></h3>
                          <ul>
                            <?php $shows = $lastBroadcast->children(); foreach($shows as $show): ?>
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
        <div class="main__middle" id="calendar">
          <?php $items = $site->index()->filterBy('template', 'in', ['event', 'radio-broadcast']); ?>
          <div id="myTimeline">
            <ul class="timeline-events">
            <?php $i = 0;
            foreach($items as $item): $i++; ?>
                <?php if($item->template() == 'radio-broadcast'): ?>
                  <li data-timeline-node="{ start:'<?= $item->date() ?> <?=$item->starttime() ?>', end:'<?= $item->date() ?> <?= $item->endtime() ?>', row:'<?php echo $i ?>' }">
                  <a href="<?= $item->url() ?>"><?= $item->title() ?></a>
                </li>
                <?php else: ?>
                  
                <li data-timeline-node="{ start:'<?= $item->fromDate() ?> <?=$item->fromTime() ?>', end:'<?= $item->toDate() ?> <?= $item->toTime() ?>', row:'<?php echo $i ?>' }">
                  <a href="<?= $item->url() ?>"><?= $item->title() ?></a>
                </li>
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