<div class="container">
	<h1>Liste des messages</h1>
	<?php
	foreach ($mailList as $mail) {
	?>
		<div class="card my-3">
			<div class="card-body">
				<h5 class="card-title"><?= htmlspecialchars($mail->getName(), ENT_QUOTES, 'UTF-8'); ?></h5>
				<h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($mail->getEmail_address(), ENT_QUOTES, 'UTF-8'); ?></h6>
				<p class="card-text"><?= htmlspecialchars($mail->getMessage(), ENT_QUOTES, 'UTF-8'); ?></p>

			</div>
		</div>
	<?php } ?>