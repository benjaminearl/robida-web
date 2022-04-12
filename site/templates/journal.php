<?php snippet('header') ?>
<h1><?= $page->title() ?></h1>
<p><?= $page->Text()->kt() ?></p>

<?php
$items = $page->children();
?>

<?php foreach($items as $item): ?>
  <h2><?= $item->title() ?></h2>
  <small>on: <?= $item->date()->toDate('d/m') ?></small><br>
  <small>by: <?php $people =  $item->people()->toPages();  foreach($people as $person): ?><a href="<?= $person->url() ?>"><?= $person->title() ?></a>
  <?php endforeach ?></small><br>
  <small>re: <?php $relatedItems =  $item->related()->toPages();  foreach($relatedItems as $relatedItem): ?><a href="<?= $relatedItem->url() ?>"><?= $relatedItem->title() ?></a></small><br>
  <?php endforeach ?><br>
  <?= $item->image() ?><br>
  <p><?= $item->text() ?></p><br>
  <small><?php foreach ($item->tags()->split() as $tag): ?>
    <a href="<?= url('journal', ['params' => ['tag' => $tag]]) ?>">#<?= html($tag) ?></a></small>
  <?php endforeach ?>
<?php endforeach ?>


<?php snippet('nav') ?>
<?php snippet('footer') ?>
