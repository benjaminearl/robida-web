<div id="rightSidebar">

  <span id="openRight" onclick="openGlossary()">ABC</span>
  <div id="glossary-content">
    <div id="glossary-title"><h1><?= page('glossary')->title() ?></h1><span id="closeRight" onclick="closeGlossary()">>></span>
    </div>
    <div class="bodytext" style="padding: 1rem;">
      <p><?= page('glossary')->text()->kt() ?></p>
    </div>
  </div>
</div>
