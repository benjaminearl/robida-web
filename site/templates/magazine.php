<?php snippet('base-layout', slots: true) ?>

  <?php slot() ?>
    <main id="center">
        <div class="main__left">
          <h1><?= $page->title() ?></h1>
          <section>
            <div class="bodytext">
              <p><?= $page->Text()->kt() ?></p>
            </div>
          </section>
          <section>
            <ul>
            <?php $items = $page->colophon()->toStructure(); foreach ($items as $item): ?>
              <li>
                <h3><?= $item->role()->html() ?></h3>
                  <?php $people = $item->person()->toPages(); foreach ($people as $person): ?>
                    <a href="<?= $person->url() ?>"><?= $person->title() ?></a><br>
                  <?php endforeach ?>
                  <?= $item->other()->kt() ?>
                <br>
              </li>
            <?php endforeach ?>
            </ul>
          </section>
        </div>
        <div class="main__right">
          <ul class="mag-overview">
            <?php foreach($page->children() as $issue): ?>
            <li>
              <a href="<?= $issue->url() ?>">
              <?php if($image = $issue->files()->findBy('template', 'cover')): ?>
                <img src="<?= $image->url() ?>">
              <?php endif ?>
                <h2><?= $issue->title()->html() ?></h2>
                <div class="issue-info">
                  <h3><?= $issue->Theme() ?></h3>
                  <h3 style="text-align:right;"><?= $issue->published()->toDate('Y') ?></h3>
                </div>
              </a>
            </li>
            <?php endforeach ?>
          </ul>   
        </div>
    </main>
  <?php endslot() ?>

<?php endsnippet() ?>