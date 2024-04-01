<?php snippet('base-layout', slots: true) ?>

  <?php slot() ?>
    <main id="center">
      
      <?php
        $filterBy = get('filter');

        $items = $page
          ->children()
          ->listed()
          ->sortBy('date', 'desc');

        $selectedItems = $items
          ->when($filterBy, function($filterBy) {
            return $this->filterBy('tags', $filterBy, ',');
          })
          ;
          
        $selectedTag  = param('tag');

        $tags = $page
        ->index()
        ->pluck('tags', ',' , true);
        sort($tags);
      ?>
      
      <div class="main__left main__left--journal">
        <h1><?= $page->title() ?></h1>

      </div>
      <div class="main__center--journal">
        <?php foreach($selectedItems as $selectedItem): ?>
          <div class="entry" style="border-color: <?php echo $selectedItem->people()->toPage()->color(); ?>">
              <h1><a href="<?= $selectedItem->url() ?>"><?= $selectedItem->title() ?></a></h1>
              <p>
                on: <?= $selectedItem->date()->toDate('d/m/Y') ?><br>
                by: <mark class="profile" style="background-color: <?php echo $selectedItem->people()->toPage()->color(); ?>;margin-top:0.5em;"><?= $selectedItem->people()->toPage()->title() ?></mark>
              </p>
              <?php if ($selectedItem->hasFiles()): ?>
                  <img src="<?= $selectedItem->files()->sortBy('sort', 'asc')->first()->url() ?>" alt="">
              <?php endif ?>

          </div>
        <?php endforeach ?>
        <?php if($selectedItems->isEmpty()): ?>
          <?php foreach($items as $item): ?>
            <div class="entry" style="border-color: <?php echo $item->people()->toPage()->color(); ?>">
                <h1><a href="<?= $item->url() ?>"><?= $item->title() ?></a></h1>
                <p>
                  on: <?= $item->date()->toDate('d/m') ?><br>
                  by: <mark class="profile" style="background-color: <?php echo $item->people()->toPage()->color(); ?>;margin-top:0.5em;"><?= $item->people()->toPage()->title() ?></mark>
                </p>
                <?php if ($item->hasFiles()): ?>
                    <img src="<?= $item->files()->sortBy('sort', 'asc')->first()->url() ?>" alt="" style="object-fit: cover;aspect-ratio:16/9;margin:0;">
                <?php endif ?>

            </div>
          <?php endforeach ?>
        <?php endif ?>
      </div>
      <div class="main__right main__right--journal">
        <h3>Topics</h3>
        <?php foreach($tags as $tag): ?>
            <a href="<?= $page->url() ?>?filter=<?= $tag ?>" class="<?= $filterBy == $tag ? 'active' : '' ?>" >#<?php echo t($tag, $tag) ?></a><br>
        <?php endforeach ?>
      </div>
    </main>
  <?php endslot() ?>

<?php endsnippet() ?>