<?php snippet('header') ?>

<section class="section">
    <?php snippet('projects/html/' . $page->slug()) ?>
</section>

<?php snippet('projects/footer', ['slug' => $page->slug()]) ?>