<?php snippet('base-layout', slots: true) ?>

  <?php slot() ?>
    <main id="center">
        <div class="main__left">
        <h1><?= $page->title() ?></h1>
        <div class="bodytext">
          <p><?= $page->Text()->kt() ?></p>
        </div>

        <div class="current-residents">
        <?php if($page->currentResidents()->isNotEmpty()): ?>
            <?php if($residents = $page->currentResidents()->toPages()): ?>
                <h3>Current residents:</h3>
                <ul>
                <?php foreach($residents as $residents): ?>
                    <li class="profile"><?= $residents->title() ?></li>
                <?php endforeach ?>
                </ul>
                <?php endif ?>
            <?php endif ?>
                </div>
          
        </div>
        <div class="main__right">
        <?php if($image = $page->cover()->toFile()): ?>
      <img src="<?= $image->url() ?>" alt="">
    <?php endif ?>

    <?php $images = $page->files()->filterBy('template', 'gallery');
    foreach ($images as $image): ?>
      <img src="<?= $image->url() ?>" alt="">
    <?php endforeach ?>

    <?php if($subpages = $page->children()->listed()): ?>
      <ul><?php foreach ($subpages as $subpage): ?>
        <a href="<?= $subpage->url() ?>"><li><h2>>> <?= $subpage->title() ?></h2></li></a>
        <?php endforeach ?>
      </ul>
    <?php endif ?>
        </div>
    </main>
  <?php endslot() ?>

<?php endsnippet() ?>