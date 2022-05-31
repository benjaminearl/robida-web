<?php snippet('header') ?>

<?php snippet('nav') ?>
<div id="center">

<?php
$items = $page->children();
?>

<?php foreach($items as $item): ?>
  <h2><?= $item->title() ?></h2>
  on: <?= $item->date()->toDate('d/m') ?><br>
  by: <?php $people =  $item->people()->toPages();  foreach($people as $person): ?><a href="<?= $person->url() ?>"><?= $person->title() ?></a>
  <?php endforeach ?></small><br>
  <?php $relatedItems =  $item->related()->toPages();  foreach($relatedItems as $relatedItem): ?>re: <a href="<?= $relatedItem->url() ?>"><?= $relatedItem->title() ?></a>
  <?php endforeach ?><br>
  <?= $item->image() ?><br>
  <p><?= $item->text()->kt() ?></p><br>
  <?php foreach ($item->tags()->split() as $tag): ?>
    <a href="<?= url('journal', ['params' => ['tag' => $tag]]) ?>">#<?= html($tag) ?></a>
  <?php endforeach ?>
<?php endforeach ?>

</div>


<?php snippet('rightbar') ?>
<?php snippet('footer') ?>
