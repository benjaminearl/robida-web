<?php snippet('header') ?>
<?php snippet('nav') ?>
<div id="center">
    <div id="left">
        <div class="person-bio person-info">
            <h1><?= $page->title() ?></h1>
            <h3>Bio</h3>
            <p><?= $page->text()->kt() ?></p>
        </div>
        <div class="person-details person-info">
            <p class="details-el"><?= $page->birthyear() ?>, <?= $page->birthcountry() ?><p>
        </div>
        <div class="person-links person-info">
            <a href="<?= $page->link1() ?>"><?= $page->link1label() ?></a>
            <a href="<?= $page->link2() ?>"><?= $page->link2label() ?></a>
        </div>
        <div class="person-location person-info">
            <h3>Status</h3>
            <p><?= $page->category() ?>
            <?php if($page->category() == 'home'): ?>
                <span>(Topolò)</span>
            <?php else: ?>
                <span>(elsewhere)</span>
            <?php endif ?>
            </p>
        </div>
    </div>
    <div id="right">
        <?php $images = $page->files()->filterBy('template', 'gallery');
        foreach ($images as $image): ?>
            <img src="<?= $image->url() ?>" alt="">
    <?php endforeach ?>
    </div>
</div>

<?php snippet('rightbar') ?>
<?php snippet('footer') ?>
