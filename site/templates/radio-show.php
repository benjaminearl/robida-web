<?php snippet('base-layout', slots: true) ?>

  <?php slot() ?>
    <main id="center">

    <?php
        $filterBy = get('filter');

        $items = $site
          ->index()
          ->filterBy('template', 'in', ['radio-show'])
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


        <div class="main__left">
        <?php if ($page->parent()->isListed()): ?>
            <div class="parent">
              <a href="<?= $page->parent()->url() ?>"><< <?= $page->parent()->title() ?></a>
            </div>
          <?php endif ?>
          <h1><?= $page->title() ?></h1>
          <div class="show-info">
              <p class="broadcast-text">Broadcast: <?= $page->broadcastDate()->toDate('d M Y') ?></p>
              <?php $hosts =  $page->people()->toPages();  foreach($hosts as $host): ?>
                <p class="host-name">Hosted by: <a id="radio-host" class="profile" style="background-color: <?php echo $host->color(); ?>" href="<?= $host->url() ?>"><?= $host->title() ?></a></p>
              <?php endforeach ?>
            </div>
          <section>
            <div class="bodytext">
              <p><?= $page->description()->kt() ?></p>
            </div>
            <?php if ($page->tags()->isNotEmpty()): 
              ?>
              <?php foreach($page->tags() as $tag): ?>
                <a href="<?= "/projects/radio-archive" ?>?filter=<?= $tag ?>" >Find more in this series</a><br>
        <?php endforeach ?>
            <?php endif ?>
          </section>
        </div>
        <div class="main__right">
          <section>



          <?php if($soundcloudEmbed = $page->recording()->toEmbed()): ?>
              <div>
                <?php echo $soundcloudEmbed->code(); ?>
              </div>
            <?php endif ?>
          </section>
          

          <section>
            
          </section>
          
        </div>
    </main>
  <?php endslot() ?>

<?php endsnippet() ?>