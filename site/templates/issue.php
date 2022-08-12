<?php snippet('header') ?>

<?php snippet('nav') ?>
<div id="center">
  <div id="left">
    <div class="parent">
      <a href="<?= $page->parent()->url() ?>"><< <?= $page->parent()->title() ?></a>
    </div>

    <h1><?= $page->title() ?></h1>

    <section>
      <div class="issue-info">
        <h3><?= $page->Theme() ?></h3>
        <h3 style="text-align:right;"><?= $page->published()->toDate('Y') ?></h3>
      </div>


      <div class="bodytext">
        <p><?= $page->Text()->kt() ?></p>
      </div>
    </section>

    <section>
      <h2>Colofon</h2>
      <ul>
      <?php $items = $page->colophon()->toStructure(); foreach ($items as $item): ?>
        <li>
          <h3><?= $item->role()->html() ?></h3>
            <?php $people = $item->person()->toPages(); foreach ($people as $person): ?>
              <a href="<?= $person->url() ?>"><?= $person->title() ?></a><br>
            <?php endforeach ?>
          <br>
        </li>
      <?php endforeach ?>
      </ul>
    </section>
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
