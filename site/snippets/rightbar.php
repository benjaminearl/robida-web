<div id="rightSidebar">
  <span id="closeRight" onclick="closeGlossary()">>></span>
  <span id="openRight" onclick="openGlossary()">ABC</span>
  <div id="glossary-content">
    <h1 id="glossary-title"><?= kt(page('glossary')->title()) ?></h1>
    <div class="bodytext">
      <p><?= kt(page('glossary')->text()->kt()) ?></p>
    </div>  
  </div>
</div>
