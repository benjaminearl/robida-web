<?php snippet('header') ?>

<h2><?= $page->title() ?></h2>
<small>on: <?= $page->date()->toDate('d/m') ?></small><br>
<small>by: <?php $people =  $page->people()->toPages();  foreach($people as $person): ?><a href="<?= $person->url() ?>"><?= $person->title() ?></a>
<?php endforeach ?></small><br>
<small><?php $relatedpages =  $page->related()->toPages();  foreach($relatedpages as $relatedpage): ?>re: <a href="<?= $relatedpage->url() ?>"><?= $relatedpage->title() ?></a></small><br>
<?php endforeach ?><br>
<?= $page->image() ?><br>
<?= $page->text()->toBlocks() ?>
<small><?php foreach ($page->tags()->split() as $tag): ?>
  <a href="<?= url('journal', ['params' => ['tag' => $tag]]) ?>">#<?= html($tag) ?></a>
<?php endforeach ?></small>

<?php snippet('nav') ?>
<?php snippet('footer') ?>
