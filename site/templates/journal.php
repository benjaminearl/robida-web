<?php snippet('header') ?>
<h1><?= $page->title() ?></h1>
<p><?= $page->Text()->kt() ?></p>

<?php
$items = $page->children();
?>

<?php foreach($items as $item): ?>
  <?= $item->title() ?>
  <?= $item->date()->toDate('d/m') ?>
  <?php $people =  $item->people()->toPages();  foreach($people as $person): ?><a href="<?= $person->url() ?>"><?= $person->title() ?></a>
  <?php endforeach ?>
  <?php $relatedItems =  $item->related()->toPages();  foreach($relatedItems as $relatedItem): ?><a href="<?= $relatedItem->url() ?>">↪ <?= $relatedItem->title() ?></a>
  <?php endforeach ?>
  <?= $item->text()->myBlocksField()->toBlocks() ?>
  <?php foreach ($item->tags()->split() as $tag): ?>
    <a href="<?= url('journal', ['params' => ['tag' => $tag]]) ?>">#<?= html($tag) ?></a>
  <?php endforeach ?>
<?php endforeach ?>


<?php snippet('nav') ?>
<?php snippet('footer') ?>
