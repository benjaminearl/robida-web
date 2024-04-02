<?php snippet('base-layout', slots: true) ?>

  <?php slot() ?>
    <main id="center">
        <div class="main__left">
          <?php if ($page->parent()->isListed()): ?>
            <div class="parent">
              <a href="<?= $page->parent()->url() ?>"><< <?= $page->parent()->title() ?></a>
            </div>
          <?php endif ?>
          <section>
            <?php $coverImage = $page->cover(); ?>
            <h1><?= $page->title() ?></h1>
            <div class="issue-info">
              <p><?= $page->startDate()->toDate('d M') ?> – <?= $page->endDate()->toDate('d M Y') ?></p>
              <p style="text-align:right;"><?= $page->location() ?></p>
            </div>
            <div class="bodytext">
              <p><?= $page->Text()->kt() ?></p>
            </div>
          </section>
        </div>
        <div class="main__right">
          <section>
            <h2>Programme:</h2>
            <ul class="radioSchedule">
              <?php $shows = $page->children()->sortBy('starttime', 'Asc'); foreach($shows as $show): ?>
                <li class="roundBorder">
                  <a href="<?= $show->url() ?>">
                    <?= $show->startTime()->toDate('H:i') ?>-<?= $show->endTime()->toDate('H:i') ?> |
                    <?= $show->title()->html() ?>
                  </a> |
                  <?php $hosts =  $show->people()->toPages();  foreach($hosts as $host): ?>
                    <a class="profile" style="background-color: <?php echo $host->color(); ?>" href="<?= $host->url() ?>"><?= $host->title() ?></a>
                  <?php endforeach ?>
                </li>
              <?php endforeach ?>
            </ul>
            <div class="event-img">
              <?php $images = $page->files()->filterBy('template', 'gallery');
              foreach ($images as $image): ?>
                <img src="<?= $image->url() ?>" alt="">
              <?php endforeach ?>
            </div>
          </section>
    </main>
  <?php endslot() ?>

<?php endsnippet() ?>