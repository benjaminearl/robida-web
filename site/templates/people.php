<?php snippet('header') ?>
<?php snippet('nav') ?>

<div id="center">
  <div id="left">
    <h1><?= $page->title() ?></h1>
    <section>
      <div class="bodytext">
        <p><?= $page->Text()->kt() ?></p>
      </div>
    </section>
  </div>
  <div id="right">
    <?php if($people = $page->children()->listed()): ?>
      <ul id="people-overview"><?php foreach ($people as $person): ?>
        <a href="<?= $person->url() ?>">
          <li>
            <div class="profile" style="background-color: <?php echo $person->color(); ?>">
            </div>
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
