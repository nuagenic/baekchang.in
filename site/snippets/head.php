<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title><?= e($page->isHomepage(), $site->title(), $page->title()) ?></title>
    <?= css([
        'https://cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css',
        'assets/css/style.css',
    ]) ?>
</head>