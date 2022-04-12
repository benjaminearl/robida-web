<?php snippet('header') ?>

  <?= $page->title() ?>
  <?= $page->date()->toDate('d/m') ?>
  <?php $people =  $page->people()->toPages();  foreach($people as $person): ?><a href="<?= $person->url() ?>"><?= $person->title() ?></a>
  <?php endforeach ?>
  <?php $relatedItems =  $page->related()->toPages();  foreach($relatedItems as $relatedItem): ?><a href="<?= $relatedItem->url() ?>">↪ <?= $relatedItem->title() ?></a>
  <?php endforeach ?>
  <?= $page->text()->myBlocksField()->toBlocks() ?>

<?php snippet('nav') ?>
<?php snippet('footer') ?>
