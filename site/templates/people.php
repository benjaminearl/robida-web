<?php snippet('base-layout', slots: true) ?>

  <?php slot() ?>
    <main id="center">
        <div class="main__left">
          <h1><?= $page->title() ?></h1>
          <section>
            <div class="bodytext">
              <p><?= $page->Text()->kt() ?></p>
            </div>
          </section>
        </div>
        <div class="main__right">
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
    </main>
  <?php endslot() ?>

<?php endsnippet() ?>