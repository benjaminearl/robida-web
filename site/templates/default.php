<?php snippet('base-layout', slots: true) ?>

  <?php slot() ?>
    <main id="center">
        <div class="main__left">
          
          <section>
            <?php if ($page->parent()): ?>
              <div class="page__parent">
                <a href="<?= $page->parent()->url() ?>">
                  << <?= $page->parent()->title() ?>
                </a>
              </div>
            <?php endif ?>
            <h1><?= $page->title() ?></h1>
            <div class="page__info">
              <p><?= $page->subtitle() ?></p>
              <p><?= $page->when() ?></p>
            </div>
            <div class="page__text">
              <?= $page->Text()->kt() ?>
            </div>
          </section>

          <?php if ($page->colophon()): ?>
            <section>
              <ul>
              <?php $items = $page->colophon()->toStructure(); foreach ($items as $item): ?>
                <li>
                  <h3><?= $item->role()->html() ?></h3>
                    <?php $people = $item->person()->toPages(); foreach ($people as $person): ?>
                      <a href="<?= $person->url() ?>"><?= $person->title() ?></a><br>
                    <?php endforeach ?>
                    <?= $item->other()->kt() ?>
                  <br>
                </li>
              <?php endforeach ?>
              </ul>
            </section>
          <?php endif ?>

        </div>

        <div class="main__right">

          <?php if($page->hasChildren()): ?>
            <section>
              <?php if($page->subpagesTitle()->isNotEmpty()): ?>
                <h2 class="section__title">
                  <?= $page->subpagesTitle() ?>
                </h2>
              <?php endif ?>
              <ul class="page__subitems page__subitems--grid">
                <?php $subpages = $page->children()->listed();
                foreach ($subpages as $item): ?>
                  <a href="<?= $item->url() ?>">
                    <li>
                      <article class="subitem">
                        <figure class="subitem__figure">
                          <?php if($cover = $item->files()->findBy('template', 'cover')): ?>
                            <img src="<?= $cover->url() ?>"/>
                          <?php endif ?>
                        </figure>
                        <h3 class="subitem__title">
                          <?= $item->title() ?>
                        </h3>
                      </article>
                    </li>
                  </a>
                <?php endforeach ?>
              </ul>
            </section>
          <?php endif ?>
          
          <?php if($page->hasFiles()): ?>
            <section>
              <?php $images = $page->files()->filterBy('template', 'gallery');
              foreach ($images as $image): ?>
                <figure>
                  <img src="<?= $image->url() ?>" alt="">
                  <figcaption>
                    <p><?= $image->caption() ?></p>
                  </figcaption>
                </figure>
              <?php endforeach ?>
            </section>
          <?php endif ?>

        </div>
    </main>
  <?php endslot() ?>

<?php endsnippet() ?>