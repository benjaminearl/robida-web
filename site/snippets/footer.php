<footer>
  <div id="currently-in-topolo">
    <marquee>
      <span style="color:lightgrey;">Currently in Topolò:</span>
    <?php foreach($site->find('community')->find('people')->children()->filterBy('category', 'home') as $item): ?>
      <a class="profile" href="<?= $item->url() ?>"><?= html($item->title()) ?></a>
      <?php endforeach ?>
    </marquee>
  </div>
<div id="chat">
  <a href="#" onClick="MyWindow=window.open('<?= $kirby->url('assets') ?>/chat/index.html','Robida Chat','width=510,height=610'); return false;">Chat</a>
</div>
<div id="contact">
  <a href="https://www.instagram.com/r_o_b_i_d_a/" target="_blank">Instagram</a>
</div>



</footer>
</main>

  <?= js([
    'assets/js/jquery.js',
    'assets/js/index.js',
    'assets/js/agenda.js',
    'assets/js/audio-player.js',
    'assets/js/jquery-timeline.js',
    '@auto'
  ]) ?>


</body>
</html>
