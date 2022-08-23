<?php snippet('header') ?>
<?php snippet('nav') ?>

<div id="center">
  <div id="left">
    <h1><?= $page->title() ?></h1>
    <div class="bodytext">
      <p><?= $page->Text()->kt() ?></p>
    </div>
  </div>
  <div id="right">
    <?php if($people = $page->children()->listed()): ?>
      <ul id="people-overview"><?php foreach ($people as $person): ?>
        <a href="<?= $person->url() ?>">
          <li>
              <?php if ($person->hasFiles()): ?>
                  <img src="<?= $person->files()->sortBy('sort', 'asc')->first()->url() ?>" alt="<?= $person->title() ?>">
              <?php else: ?>
                <div class="profile" style="background-color: <?php echo $person->color(); ?>">
                </div>
              <?php endif ?>
            <p><?= $person->title() ?></p>
          </li>
        </a>
        <?php endforeach ?>
      </ul>
    <?php endif ?>

  </div>
</div>


<?php snippet('rightbar') ?>
<?php snippet('footer') ?>