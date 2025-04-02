</main>
<?php
$jsFile = "assets/js/projects/{$slug}.js";
if (file_exists(kirby()->root('index') . '/' . $jsFile)): ?>
    <?= js($jsFile) ?>
<?php endif; ?>
</body>

</html>