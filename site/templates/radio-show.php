<?php snippet('base-layout', slots: true) ?>

  <?php slot() ?>
    <main id="center">
        <div class="main__left">
          <h1><?= $page->title() ?></h1>
          <div class="issue-info">
              <p>Broadcast: <?= $page->broadcastDate()->toDate('d M Y') ?></p>
              <?php $hosts =  $page->people()->toPages();  foreach($hosts as $host): ?>
                <p>Hosted by: <a id="radio-host" class="profile" style="background-color: <?php echo $host->color(); ?>" href="<?= $host->url() ?>"><?= $host->title() ?></a></p>
              <?php endforeach ?>
            </div>
          <section>
            <div class="bodytext">
              <p><?= $page->description()->kt() ?></p>
            </div>
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