<?php snippet('base-layout', slots: true) ?>

  <?php slot() ?>
    <main id="center">
        <div class="main__left">
          <div class="parent">
          <a href="<?= $page->parent()->url() ?>"><< <?= $page->parent()->title() ?></a>
          </div>
          <h1><?= $page->title() ?><span class="profile" style="height:1em;aspect-ratio:1/1;padding:0;margin: -2px 0 0 1rem;border-radius: 50%; vertical-align:middle;background-color: <?php echo $page->color(); ?>"></span></h1>
          <section>
            <h3>Bio</h3>
            <p><?= $page->text()->kt() ?></p>
            <p><?= $page->birthyear() ?>, <?= $page->birthcountry() ?><p>
          </section>
          <section>
            <h3>Links</h3>
            <a href="<?= $page->link1() ?>"><?= $page->link1label() ?></a><br>
            <a href="<?= $page->link2() ?>"><?= $page->link2label() ?></a>
          </section>
          <section>
            <h3>Status</h3>
            <p>
              <?php if($page->category() == 'home'): ?>
                <span>Currently in Topolò</span>
              <?php else: ?>
                <span>Currently elsewhere in the world</span>
              <?php endif ?>
            </p>
          </section>  
        </div>
        <div class="main__right">
          <?php $images = $page->files();
          foreach ($images as $image): ?>
            <img src="<?= $image->url() ?>" alt="">
          <?php endforeach ?>
        </div>
    </main>
  <?php endslot() ?>

<?php endsnippet() ?>