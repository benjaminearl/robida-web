<?php snippet('base-layout', slots: true) ?>

  <?php slot() ?>
    <main id="center">
        <div class="main__left">
        <?php $allEvents = $site->index()->filterBy('template', 'in', ['event']); ?>
        <?php $radioShows = $allEvents->index()->filterBy('template', 'in', ['radio-show']); ?>
        <?php foreach ($radioShows as $radioShow): ?>
          <h3><?php $radioShow->title() ?></h3>
          <?php endforeach ?>
        <div class="main__right">
        </div>
    </main>
  <?php endslot() ?>

<?php endsnippet() ?>