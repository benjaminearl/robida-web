<?php snippet('header') ?>

<?php snippet('nav') ?>
<div id="center">
  <div id="left">
    <h1><?= $page->title() ?></h1>
    <p><?= $page->Text()->kt() ?></p>
  </div>
  <div id="right">
    <ul>
      <?php foreach($page->children() as $issue): ?>
      <li>
        <a<?php e($issue->isOpen(), ' class="active"') ?> href="<?= $issue->url() ?>">
          <?php if($image = $issue->cover()->toFile()): ?>
            <img src="<?= $image->url() ?>" alt="">
          <?php endif ?>
          <?= $issue->title()->html() ?>
        </a>
      </li>
      <?php endforeach ?>
    </ul>
  </div>
</div>


<?php snippet('rightbar') ?>
<?php snippet('footer') ?>
