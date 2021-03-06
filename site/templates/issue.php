<?php snippet('header') ?>

<?php snippet('header') ?>

<?php snippet('nav') ?>
<div id="center">
  <div id="left">
    <div class="parent">
      <a href="<?= $page->parent()->url() ?>"><< <?= $page->parent()->title() ?></a>
    </div>

    <h1><?= $page->title() ?></h1>

    <div class="section">
      <div class="issue-info">
        <p><?= $page->Theme() ?></p>
        <p style="text-align:right;"><?= $page->published()->toDate('Y') ?></p>
      </div>


      <div class="bodytext">
        <p><?= $page->Text()->kt() ?></p>
      </div>
    </div>

    <div class="section">
      <h3>Colofon</h3>
      <ul>
      <?php $items = $page->colophon()->toStructure(); foreach ($items as $item): ?>
        <li>
          <p><?= $item->role()->html() ?>
            <?php $people = $item->person()->toPages(); foreach ($people as $person): ?>
              | <a href="<?= $person->url() ?>"><?= $person->title() ?></a>
            <?php endforeach ?>
          </p>
        </li>
      <?php endforeach ?>
      </ul>
    </div>
  </div>


  <div id="right">
    <?php $images = $page->files()->filterBy('template', 'gallery');
    foreach ($images as $image): ?>
      <img src="<?= $image->url() ?>" alt="">
    <?php endforeach ?>
  </div>
</div>


<?php snippet('rightbar') ?>
<?php snippet('footer') ?>
