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
          <?php 
            $futureBroadcasts = $page->children()->sortBy('date', 'asc')->filterBy('date', 'date >=', 'today');

            $lastBroadcast = $page->children()->sortBy('date', 'desc')->filterBy('date', 'date <=', 'today')->first();

            $nextBroadcast = $futureBroadcasts->first(); 
          ?>

            <?php if($futureBroadcasts->isNotEmpty()): ?>
              <h2>Next Broadcast: <span style="color:#333"><?= $nextBroadcast->date()->toDate('d M Y') ?></span></h2>

              
                <h3><?= $nextBroadcast->date()->toDate('d M Y') ?> – <a href="<?= $nextBroadcast->url() ?>"> <?= $nextBroadcast->title() ?></a></h3>
                <ul class="radioSchedule">
                  <?php $shows = $nextBroadcast->children()->sortBy('startTime', 'Asc'); foreach($shows as $show): ?>
                    <li class="roundBorder">
                      <a href="<?= $show->url() ?>">
                        <?= $show->startTime()->toDate('H:i') ?>-<?= $show->endTime()->toDate('H:i') ?> |
                        <?= $show->title()->html() ?>
                      </a>
                      <?php $hosts =  $show->people()->toPages();  foreach($hosts as $host): ?>
                        | <a class="profile" style="background-color: <?php echo $host->color(); ?>" href="<?= $host->url() ?>"><?= $host->title() ?></a>
                      <?php endforeach ?>
                    </li>
                  <?php endforeach ?>
                </ul>
              <?php else: ?>
                <?php $lastBroadcast = $page->children()->sortBy('num', 'asc')->filterBy('date', 'date <=', 'today')->first(); ?>
                <h2>Last broadcast: <span style="color:#333"><?= $lastBroadcast->date()->toDate('d M Y') ?></span></h2>
                  <ul class="radioSchedule">
                    <?php $shows = $lastBroadcast->children()->sortBy('startTime', 'Asc'); foreach($shows as $show): ?>
                      <a href="<?= $show->url() ?>">
                        <li class="roundBorder">
                          <?= $show->startTime()->toDate('H:i') ?>-<?= $show->endTime()->toDate('H:i') ?> |
                          <?= $show->title()->html() ?>
                          <?php $hosts =  $show->people()->toPages();  foreach($hosts as $host): ?>
                          | <a class="profile" style="background-color: <?php echo $host->color(); ?>" href="<?= $host->url() ?>"><?= $host->title() ?></a>
                        <?php endforeach ?>
                        </li>
                      </a>
                    <?php endforeach ?>
                  </ul>
            <?php endif ?>
          </section>
          

          <section>
            <h3>Archive</h3>
          <?php 
            $pastBroadcasts = $page->children()->sortBy('date', 'desc')->filterBy('date', 'date <=', 'today')->limit(6); 
          ?>
          <ul class="mag-overview">
          <?php foreach($pastBroadcasts as $pastBroadcast): ?>
            <li>
              <?php $image = $pastBroadcast->files()->first();?>
                  <?php if ($pastBroadcast->hasFiles()): ?>
                    <img src="<?= $pastBroadcast->files()->sortBy('sort', 'asc')->first()->url() ?>" alt="">
                  <?php endif ?>
                  <a href="<?= $pastBroadcast->url() ?>"><h2><?= $pastBroadcast->title() ?></h2></a>
                  <h3><?= $pastBroadcast->date()->toDate('d M Y') ?></h3>
              </li>
            <?php endforeach ?>
          </ul>
          </section>
          <h3><a href="<?= $page->archive() ?>" target="_blank">Visit our full archive →</a><h3>
        </div>
    </main>
  <?php endslot() ?>

<?php endsnippet() ?>