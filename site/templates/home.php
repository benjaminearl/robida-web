<?php snippet('base-layout', slots: true) ?>

  <?php slot() ?>
    <?php if ($site->toggleWebsite()->toBool() === false): ?>
      <main id="center">
        <?php snippet('temporary') ?>
      </main>
    <?php else: ?>
      <main id="center">
        <div class="main__top">
          <?php $HomepageBlocks =  $page->homeBlocks()->toPages();
          foreach($HomepageBlocks as $HomepageBlock): ?>

            
            <?php if ($HomepageBlock->title() == 'Robida Magazine'): ?>
              <!-- MAGAZINE BLOCK -->
              <?php $latestIssue = $HomepageBlock->children()->first() ?>
              <div class="home__block">
                <a href="<?= $HomepageBlock->url() ?>">
                  <h2><?= $HomepageBlock->title() ?></h2>
                </a>
                  <?php if ($issueCover = $latestIssue->files()->findBy('template', 'cover')): ?>
                    <img src="<?= $issueCover->url() ?>" />
                  <?php endif ?>
              </div>

            <!-- RADIO BLOCK -->
            <?php elseif ($HomepageBlock->title() == 'Radio Robida'): ?>
              <?php $futureBroadcasts = $HomepageBlock->children()->sortBy('date', 'asc')->filterBy('date', 'date >=', 'today');
                $lastBroadcast = $HomepageBlock->children()->sortBy('date', 'desc')->filterBy('Startdate', 'date <=', 'today')->first();
                $nextBroadcast = $futureBroadcasts->first(); ?>
              <div class="home__block">
                <a href="<?= $HomepageBlock->url() ?>">
                  <h2><?= $HomepageBlock->title() ?></h2>
                </a>
                <div class="home__block__content">
                    <?php if ($futureBroadcasts->isNotEmpty()): ?>
                          <h3>Next broadcast: <span style="color:#333"><?= $nextBroadcast->date()->toDate('d M Y') ?></span></h3>
                          <ul>
                            <?php $shows = $nextBroadcast->children(); foreach($shows as $show): ?>
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
                      <h3>Last broadcast: <span style="color:#333"><?= $lastBroadcast->Startdate()->toDate('d M Y') ?></span></h3>
                          <ul>
                            <?php $shows = $lastBroadcast->children()->sortBy('startTime', 'Asc'); foreach($shows as $show): ?>
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

                
                  <?php elseif ($HomepageBlock->title() == 'Residency'): ?>
                    <!-- RESIDENCIES BLOCK -->
              <div class="home__block">
                <a class="home__block__title" href="<?= $HomepageBlock->url() ?>">
                  <h2><?= $HomepageBlock->title() ?></h2>
                </a>
                <div class="home__block__content">
                <?php if($HomepageBlock->currentResidents()->isNotEmpty()): ?>
                  <?php if($residents = $HomepageBlock->currentResidents()->toPages()): ?>
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
                <a class="home__block__title" href="<?= $HomepageBlock->url() ?>">
                  <h2><?= $HomepageBlock->title() ?></h2>
                </a>
                    <?php if($coverPhoto = $HomepageBlock->files()->findBy('template', 'cover')): ?>
                      <img src="<?= $coverPhoto->url() ?>"/>
                    <?php endif ?>
              </div>
            <?php endif ?>

          <?php endforeach ?>
        </div>

        <!-- CALENDAR -->
        <div class="main__middle" id="calendar">
        <?php $items = $site->index()->filterBy('template', 'in', ['event']); ?>
          <div id="myTimeline">
            <ul class="timeline-events">
            <?php $i = 0; foreach($items as $item): $i++; ?>                  
                <li data-timeline-node="{ start:'<?= $item->Startdate() ?> <?=$item->startTime() ?>', end:'<?= $item->endDate() ?> <?= $item->endTime() ?>', row:'<?php echo $i ?>' }">
                  <a href="<?= $item->url() ?>"><?= $item->title() ?></a>
                </li>
            <?php endforeach ?>
            </ul>
          </div>
        </div>

        <div class="main__bottom">
          <?php $journalEntries =  $site->find('community')->find('journal')->children()->listed()->flip();
          foreach($journalEntries as $item): ?>
            <a href="<?= $item->url() ?>" class="home__block home__block--journal" style="border-color:<?php echo $item->people()->toPage(); ?>">
                <h4><?= $item->title() ?></h4>
                <small>
                  on: <?= $item->date()->toDate('d/m/Y') ?><br>
                  <span style="position:absolute;bottom:1em;">
                  by: 
                  <?php $people =  $item->people()->toPages();
                  foreach($people as $item): ?>
                  <mark class="profile" style="background-color: <?php echo $item->color(); ?>" href="<?= $item->url() ?>">
                    <?= $item->title() ?>
                  </mark>
                  <?php endforeach ?>
                  </span>
                </small>
            </a>
          <?php endforeach ?>
        </div>
      </main>
    <?php endif ?>
  <?php endslot() ?>

<?php endsnippet() ?>