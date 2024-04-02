<?php snippet('base-layout', slots: true) ?>

  <?php slot() ?>
    <main id="center">

    <?php
        $filterBy = get('filter');

        $items = $site
          ->index()
          ->filterBy('template', 'in', ['radio-show'])
          ->listed()
          ->sortBy('broadcastDate', 'desc');

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

      <div class="archive">
      <h2>Radio Robida Archive</h2>
        <ul class="archive-overview">
        <?php foreach($selectedList = $selectedItems->paginate(20) as $selectedItem): ?>
            <a href="<?= $selectedItem->url() ?>">
              <li>
              <?php if ($selectedItem->hasFiles()): ?>
                  <img src="<?= $selectedItem->files()->first()->url() ?>" alt="">
              <?php endif ?>
              <h2><?= $selectedItem->title() ?></h2>
              <h3><?= $selectedItem->broadcastDate()->toDate('d M Y') ?></h3>
              </li>
            </a>
        <?php endforeach ?>
        </ul>

        <?php if ($selectedList->pagination()->hasPages()): ?>
          <nav class="archive-pagination">

          <?php if ($selectedList->pagination()->hasPrevPage()): ?>
            <a class="prev" href="<?= $selectedList->pagination()->prevPageURL() ?>">
              <p>newer shows</p>
            </a>
          <?php endif ?>

          <?php if ($selectedList->pagination()->hasNextPage()): ?>
            <a class="next archive-nav" href="<?= $selectedList->pagination()->nextPageURL() ?>">
              <p>older shows</p>
            </a>
          <?php endif ?>

          

          </nav>
        <?php endif ?>

      </div>
      
    </main>
  <?php endslot() ?>

<?php endsnippet() ?>