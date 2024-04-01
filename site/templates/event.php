<?php snippet('base-layout', slots: true) ?>

  <?php slot() ?>
    <main id="center">
        <div class="main__left">
          <?php if ($page->parent()->isListed()): ?>
            <div class="parent">
              <a href="<?= $page->parent()->url() ?>"><< <?= $page->parent()->title() ?></a>
            </div>
          <?php endif ?>
          <h1><?= $page->title() ?></h1>
          <section>
            <div class="issue-info">
              <p><?= $page->fromDate()->toDate('d M') ?> – <?= $page->toDate()->toDate('d M Y') ?></p>
              <p style="text-align:right;"><?= $page->location() ?></p>
            </div>
            <div class="bodytext">
              <p><?= $page->Text()->kt() ?></p>
            </div>
          </section>
        </div>
        <div class="main__right">
          <section>
            <ul>
            <?php $items = $page->programme()->toStructure(); foreach ($items as $item): ?>
              <li class="section">
                <h3><?= $item->day()->toDate('D d M Y') ?></h3>
                <ul>
                  <?php $subitems = $item->timetable()->toStructure(); foreach ($subitems as $subitem): ?>
                    <li class="roundBorder">
                      <p><?= $subitem->start()->toDate('H:i') ?>-<?= $subitem->end()->toDate('H:i') ?> | <?= $subitem->title() ?>
                      <?php if($subitem->text()->isNotEmpty()): ?>
                      <br><br><?= $subitem->text()->kt() ?></p>
                    <?php endif ?>
                    </li>
                  <?php endforeach ?>
                </ul>
              </li>
            <?php endforeach ?>
            </ul>
          </section>
          <div class="event-img">
            <?php $images = $page->files()->filterBy('template', 'gallery');
            foreach ($images as $image): ?>
              <img src="<?= $image->url() ?>" alt="">
            <?php endforeach ?>
          </div>
        </div>
    </main>
  <?php endslot() ?>

<?php endsnippet() ?>