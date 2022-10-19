<div id="rightSidebar">

  <span id="openRight" onclick="openGlossary()">ABC</span>
  <div id="glossary-content">
    <div id="glossary-title"><h1><?= page('glossary')->title() ?></h1><span id="closeRight" onclick="closeGlossary()">>></span>
    </div>
    <div class="bodytext" style="padding: 1rem;">
      <ul>
      <?php
        $items = $site->find('glossary')->children()->listed()->sortBy('title', 'asc');
      ?>
        <?php foreach ($items as $item): ?>
          <h2 class="collapsible"><?= $item->title() ?></h2>
          <div class="content">
            <p><?= $item->text()->kt() ?></p>

          </div>
          <hr>
        <?php endforeach ?>
        <ul>
    </div>


  </div>
</div>
