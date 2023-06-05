<div class="container">
	<h1>Liste des messages</h1>
	<?php
	foreach ($mailList as $mail) {
	?>
		<div class="card my-3">
			<div class="card-body  d-flex justify-content-between">
				<div>
					<h5 class="card-title"><?= htmlspecialchars($mail->getName(), ENT_QUOTES, 'UTF-8'); ?></h5>
					<h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($mail->getEmail_address(), ENT_QUOTES, 'UTF-8'); ?></h6>
					<p class="card-text"><?= htmlspecialchars($mail->getMessage(), ENT_QUOTES, 'UTF-8'); ?></p>
				</div>
				<?php 
				if($mail->getAdmin_request()==='1'){?>					
				<div class="d-flex align-items-center justify-content-around">
					<button class="btn btn-primary d-block m-3"><a class="text-reset" href="<?= htmlspecialchars($config->basepath, ENT_QUOTES, 'UTF-8') . '/AdminValidate/' . htmlspecialchars($mail->getId(), ENT_QUOTES, 'UTF-8') ?>">Valider</a></button>
					<button class="btn btn-danger d-block"><a class="text-reset" href="<?= htmlspecialchars($config->basepath, ENT_QUOTES, 'UTF-8') . '/AdminRefuse/' . htmlspecialchars($mail->getId(), ENT_QUOTES, 'UTF-8') ?>">Supprimer</a></button>
				</div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>