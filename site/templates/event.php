<?php snippet('header') ?>
<?php snippet('nav') ?>
<div id="center">
  <div id="left">
    <h1><?= $page->title() ?></h1>
    <div class="section">
      <div class="issue-info">
        <p><?= $page->fromDate()->toDate('d M') ?> – <?= $page->toDate()->toDate('d M Y') ?></p>
        <p style="text-align:right;"><?= $page->location() ?></p>
      </div>


      <div class="bodytext">
        <p><?= $page->Text()->kt() ?></p>
      </div>
      <?php if($page->projects()): ?>
        <p> <span style="color:lightgrey;">Related to:</span> <?php $projects =  $page->project()->toPages();  foreach($projects as $project): ?><a href="<?= $project->url() ?>"><?= $project->title() ?></a>
        <?php endforeach ?>
      <?php endif ?>
    </div>
  </div>

  <div id="right">
    <div class="section">
      <ul>
      <?php $items = $page->programme()->toStructure(); foreach ($items as $item): ?>
        <li class="section">
          <h3><?= $item->day()->toDate('D d M Y') ?></h3>
          <ul>
            <?php $subitems = $item->timetable()->toStructure(); foreach ($subitems as $subitem): ?>
              <li class="roundBorder">
                <p><?= $subitem->start()->toDate('H:i') ?>-<?= $subitem->end()->toDate('H:i') ?> | <?= $subitem->title() ?>
                <?= $subitem->text()->kt() ?></p>
              </li>
            <?php endforeach ?>
          </ul>
        </li>
      <?php endforeach ?>
      </ul>
    </div>
  </div>
</div>
<?php snippet('rightbar') ?>
<?php snippet('footer') ?>
