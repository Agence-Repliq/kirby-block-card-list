<?php
$cardType = $block->cardType()->value();
$page     = $cardType === 'page' ? $block->page()->toPage() : null;
$link     = $page ? $page->url() : ($cardType === 'manual' ? $block->link()->value() : null);
$image    = $cardType === 'page' && $page ? $page->seo_image_featured()->toFile() : $block->image()->toFile();
$text     = $cardType === 'manual' ? $block->text() : ($page ? $page->seo_description() : '');
?>

<?php if($block->isNotEmpty()): ?>
<div class="card">
    <?php if(!empty($link)): ?>
        <a href="<?= $link ?>">
    <?php endif; ?>
        <?php if($image): ?>
        <figure>
            <img src="<?= $image->crop(500,500)->url() ?>" alt="<?= $image->alt() ?>">
        </figure>
        <?php endif ?>
        <div>
            <?= $text ?>
        </div>
    <?php if(!empty($link)): ?>
    </a>
    <?php endif; ?>
</div>
<?php endif; ?>