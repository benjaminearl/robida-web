<?php snippet('header') ?>

<?php snippet('nav') ?>
<div id="center">
  <div id="left">
    <h1><?= $page->title() ?></h1>
    <p><?= $page->Text()->kt() ?></p>
  </div>
  <div id="right">
    <ul class="magazine">
      <?php foreach($page->children() as $issue): ?>
      <li class="mag-issue">
        <a<?php e($issue->isOpen(), ' class="active"') ?> href="<?= $issue->url() ?>">
          <?php if($image = $issue->cover()->toFile()): ?>
            <img src="<?= $image->url() ?>" alt="Robida Magazine Cover">
          <?php endif ?>
          <p><?= $issue->title()->html() ?></p>
        </a>
      </li>
      <?php endforeach ?>
    </ul>
  </div>
</div>


<?php snippet('rightbar') ?>
<?php snippet('footer') ?>
