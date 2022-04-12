<?php snippet('header') ?>
<h1><?= $page->title() ?></h1>
<p><?= $page->Text()->kt() ?></p>

<?php

$events = $site
  ->index()
  ->filter(function ($child) {
    return $child->date()->isNotEmpty();});

// fetch children with a date that is now
$ongoingEvents = $events
  ->filter(function ($event) {
  return $event->date()->toDate() = time();})
  ->sortBy('date', 'asc');

  // fetch children with a date in the future
  $futureEvents = $events
    ->filter(function ($event) {
    return $event->date()->toDate() >= time();})
    ->sortBy('date', 'asc');

// fetch children with a date in the past
$pastEvents = $events
  ->filter(function ($event) {
  return $event->date()->toDate() < time();})
  ->sortBy('date', 'desc');
?>

<h2>Future events</h2>
<?php foreach($futureEvents as $futureEvent): ?>
  <ul>
    <li>
      <?= $futureEvent->date()->toDate('d/m') ?> |
      <?= $futureEvent->starttime()->toDate('H:i') ?>-<?= $futureEvent->endtime()->toDate('H:i') ?> |
      <?= $futureEvent->parent()->title() ?> |
      <?= $futureEvent->title() ?>
    </li>
  </ul>
<?php endforeach ?>

<h2>Past events</h2>
<?php foreach($pastEvents as $pastEvent): ?>
  <ul>
    <li>
      <?= $pastEvent->date()->toDate('d/m') ?> |
      <?= $pastEvent->starttime()->toDate('H:i') ?>-<?= $pastEvent->endtime()->toDate('H:i') ?> |
      <?= $pastEvent->parent()->title() ?> |
      <?= $pastEvent->title() ?>
    </li>
  </ul>
<?php endforeach ?>

<?php snippet('nav') ?>
<?php snippet('footer') ?>
