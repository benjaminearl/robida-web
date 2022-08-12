<?php snippet('header') ?>

<?php snippet('nav') ?>
<div id="center">
  <div id="left">
    <h1><?= $page->title() ?></h1>
    <div class="section">
      <div class="bodytext">
        <p><?= $page->Text()->kt() ?></p>
      </div>
    </div>
    <div class="section">
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
    </div>
  </div>

  <div id="right">
    <ul class="mag-overview">

      <?php foreach($page->children() as $issue): ?>
      <li>
        <a<?php e($issue->isOpen(), ' class="active"') ?> href="<?= $issue->url() ?>">
        <?php if($image = $issue->cover()->toFile()): ?>
          <img src="<?= $image->url() ?>" alt="">
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
</div>


<?php snippet('rightbar') ?>
<?php snippet('footer') ?>
