<div class="error">
	<h1>Une erreur s'est produite</h1>
	<div class="error-message">Message : <?= htmlspecialchars($exception->getMessage(), ENT_COMPAT, 'UTF-8'); ?></div>
	<div class="error-stack">Pile d'execution : <?= htmlspecialchars($exception->getTraceAsString(), ENT_COMPAT, 'UTF-8'); ?></div>
    <?php if(method_exists($exception,"getMoreDetail")){ ?>
        <div class="error-detail"><?= htmlspecialchars($exception->getMoreDetail(), ENT_COMPAT, 'UTF-8') ?></div>
    <?php } ?>
</div>