
<?php

$items = $pages->listed();


?>
<div id="leftSidebar">
    <span id="closeLeft" onclick="closeNav()">
      <<
    </span>
    <span id="openLeft" onclick="openNav()">
      Menu
    </span>
    <nav>
      <ul>
        <?php foreach($items as $item): ?>
          <?php if ($item->hasChildren()): ?>
            <li class="container"><p><a<?php e($item->isOpen(), ' class="active"') ?> href="<?= $item->url() ?>" style="pointer-events: none;"><?= $item->title()->html() ?></a></p>
              <ul>
                <?php $children =  $item->children();  foreach($children as $child): ?>
                  <li><p><a<?php e($child->isOpen(), ' class="active"') ?> href="<?= $child->url() ?>"><?= $child->title()->html() ?></a></p></li>
                  <?php endforeach ?>
              </ul>
            </li>
          <?php else: ?>
            <li><p><a<?php e($item->isOpen(), ' class="active"') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></p></li>
          <?php endif; ?>
        <?php endforeach ?>
      </ul>
    </nav>
  </div>
