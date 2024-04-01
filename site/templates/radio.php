<?php snippet('base-layout', slots: true) ?>

  <?php slot() ?>
    <main id="center">
        <div class="main__left">
          <h1><?= $page->title() ?></h1>
          <section>
            <div class="bodytext">
              <p><?= $page->Text()->kt() ?></p>
            </div>
            <div class="chat" style="margin-top:50px; ">
            <script id="cid0020000246831166936" data-cfasync="false" async src="https://st.chatango.com/js/gz/emb.js" style="width: 100%;height: 580px;">{"handle":"radiorobida","arch":"js","styles":{"a":"E6E6E6","b":100,"c":"000000","d":"000000","k":"E6E6E6","l":"E6E6E6","m":"E6E6E6","p":"10","q":"E6E6E6","r":100,"allowpm":0,"cnrs":"0.35","fwtickm":1}}</script>
            </div>
          </section>
        </div>
        <div class="main__right">
          <section>
            <?php $upcomingBroadcasts = $page->children()->sortBy('date', 'asc')->filterBy('date', 'date >=', 'today'); ?>

            <?php if($upcomingBroadcasts->isNotEmpty()): ?>
              <h2>Upcoming Broadcasts</h2>


              <?php foreach($upcomingBroadcasts as $upcomingBroadcast): ?>
                <h3><?= $upcomingBroadcast->date()->toDate('d M Y') ?><span> – <a href="<?= $upcomingBroadcast->url() ?>"> <?= $upcomingBroadcast->title() ?></h3></a>
                <ul>
                  <?php $shows = $upcomingBroadcast->children()->sortBy('starttime', 'Asc'); foreach($shows as $show): ?>
                    <li class="roundBorder">
                    <a href="<?= $show->url() ?>">
                      <?= $show->starttime()->toDate('H:i') ?>-<?= $show->endtime()->toDate('H:i') ?> |
                      <?= $show->title()->html() ?>
                      </a> |
                      <?php $hosts =  $show->people()->toPages();  foreach($hosts as $host): ?><a class="profile" style="background-color: <?php echo $host->color(); ?>" href="<?= $host->url() ?>"><?= $host->title() ?></a>
                      <?php endforeach ?>
                    </li>

                  <?php endforeach ?>
                </ul>
              <?php endforeach ?>
            <?php endif ?>
          </section>
          

          <section>
          <?php $pastBroadcasts = $page->children()->sortBy('date', 'asc')->filterBy('date', 'date <=', 'today')->limit(6); ?>
          <?php if($pastBroadcasts->isNotEmpty()): ?>
          <h2>Past</h2>
          <ul class="mag-overview">
          <?php foreach($pastBroadcasts as $pastBroadcast): ?>
            <li>
              <?php $images = $pastBroadcast->files();
                foreach ($images as $image): ?>
                  <a href="<?= $pastBroadcast->url() ?>">
                    <img src="<?= $image->url() ?>" alt="">
                  </a>
                  <h2><?= $pastBroadcast->title() ?></h2>
                  <h3><?= $pastBroadcast->date() ?></h3>
                <?php endforeach ?>
              </li>
            <?php endforeach ?>
          </ul>
          <?php endif ?>
          </section>
          <h3><a href="<?= $page->archive() ?>" target="_blank">Visit our full archive →</a><h3>
        </div>
    </main>
  <?php endslot() ?>

<?php endsnippet() ?>