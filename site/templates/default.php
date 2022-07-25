<?php snippet('header') ?>

<?php snippet('nav') ?>
<div id="center">
  <div id="left">
    <h1><?= $page->title() ?></h1>
    <div class="bodytext">
      <p><?= $page->Text()->kt() ?></p>
    </div>
  </div>
  <div id="right">
    <?php if($image = $page->cover()->toFile()): ?>
      <img src="<?= $image->url() ?>" alt="">
    <?php endif ?>

    <?php if($subpages = $page->children()->listed()): ?>
      <ul><?php foreach ($subpages as $subpage): ?>
        <li><h2><?= $subpage->title() ?></h2></li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>

    <?php $events = $site->find('Community')->find('Calendar')->children()->filterBy(''); ?>
      <h3>Related events:</h3>
        <?php foreach($events as $event): ?><a href="<?= $event->url() ?>"><?= $event->title() ?></a>
      <?php endforeach ?>
  </div>
</div>


<?php snippet('rightbar') ?>
<?php snippet('footer') ?>
