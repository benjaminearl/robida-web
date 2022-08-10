<div id="rightSidebar">
  <span id="closeRight" onclick="closeGlossary()">Glossary [X]</span>
  <span id="openRight" onclick="openGlossary()">A.B.C</span>
  <div id="glossary-content">
    <?= kt(page('glossary')->text()) ?>
  </div>
</div>
