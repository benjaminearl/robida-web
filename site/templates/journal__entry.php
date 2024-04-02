<?php snippet('base-layout', slots: true) ?>

  <?php slot() ?>
    <main id="center">
      <div class="main__left main__left--journal">
        <div class="parent">
          <a href="<?= $page->parent()->url() ?>"><< <?= $page->parent()->title() ?></a>
        </div>
        <h1><?= $page->title() ?></h1>
        <section>
          <p>
            on: <?= $page->date()->toDate('d/m') ?><br>
            by: <a href="<?= $page->people()->toPage()->url() ?>" class="profile" style="background-color: <?php echo $page->people()->toPage()->color(); ?>;margin-top:0.5em;"><?= $page->people()->toPage()->title() ?></a>
          </p>
        </section>
        <?php foreach ($page->tags()->split() as $tag): ?>
          <a href="<?= url('community/journal', ['params' => ['tag' => $tag]]) ?>">#<?= html($tag) ?></a><br>
        <?php endforeach ?>

      </div>
      <div class="main__center--journal" style="background-color: <?php echo    $page->people()->toPage()->color(); ?>">
          <div class="entry" style="border-color: <?php echo $page->people()->toPage()->color(); ?>">
              <section>
                <div class="bodytext">
                  <?= $page->text()->toBlocks() ?>
                </div>
              </section>
          </div>
      </div>
      <div class="main__right main__right--journal">
        <div>
          <?php $related = $page->related()->toPages();
          if ($related->count() > 0):?>
              <h3>Related</h3>
              <ul>
                <?php foreach($related as $item): ?>
                  <a href="<?= $item->url() ?>">
                  <li class="entry" style="border-color:
                  <?php if ($item->people()->isNotEmpty()): ?>
                    <?php echo $item->people()->toPage()->color(); ?>
                  <?php else: ?>
                    
                  <?php endif ?>
                  ">
                    <h4 class="--no-margin"><?= $item->title() ?></h4>
                  </li>
                  </a>
                <?php endforeach ?>
              </ul>
          <?php endif ?>
        </div>
        <div id="journal-pagination">
          <?php if ($page->hasNextListed()): ?>
            <a href="<?= $page->nextListed()->url() ?>">
              <h3>↑ Newer</h3>
              <div class="entry" style="border-color: <?php echo $page->nextListed()->people()->toPage()->color(); ?>">
                  <h4 class="--no-margin"><?= $page->nextListed()->title() ?></h4>

              </div>
            </a>
          <?php endif ?>
          <?php if ($page->hasPrevListed()): ?>
            <a href="<?= $page->prevListed()->url() ?>">
              <h3>↓ Older</h3>
              <div class="entry" style="border-color: <?php echo $page->prevListed()->people()->toPage()->color(); ?>">
                  <h4 class="--no-margin"><?= $page->prevListed()->title() ?></h4>
              </div>
            </a>
          <?php endif ?>
        </div>
      </div>
    </main>
  <?php endslot() ?>

<?php endsnippet() ?>