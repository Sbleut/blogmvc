<main>
	<section class="container">
		<h1>Admin Panel</h1>
		<div>
			<h2>Welcome, Admin!</h2>
			<p>Here you can manage all the aspects of your website.</p>
			<p>Use the navigation menu to access different sections of the admin panel.</p>
		</div>
		<button class="btn btn-primary"><a class="text-reset" href="<?= htmlspecialchars($config->basepath, ENT_QUOTES, 'UTF-8'); ?>/ArticleCreate">Créer un nouvel article</a></button>
	</section>
	<section class="container">
		<?php
		foreach ($articles as $article) {
		?>
			<div class="card my-3">
				<div class="card-body d-flex justify-content-between">
					<div>
						<h5 class="card-title"><?= htmlspecialchars($article->title, ENT_COMPAT, 'UTF-8'); ?></h5>
						<h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($article->date, ENT_QUOTES, 'UTF-8'); ?></h6>
						<a href="<?= htmlspecialchars($config->basepath, ENT_QUOTES, 'UTF-8'); ?>/Article/<?= htmlspecialchars($article->id, ENT_QUOTES, 'UTF-8'); ?>"><?= htmlspecialchars($article->title, ENT_QUOTES, 'UTF-8'); ?></a>
					</div>
					<div class="d-flex align-items-center justify-content-around">
						<button class="btn btn-primary d-block m-3"><a class="text-reset" href="<?= htmlspecialchars($config->basepath, ENT_QUOTES, 'UTF-8') . '/ArticleUpdate/' . htmlspecialchars($article->id, ENT_QUOTES, 'UTF-8') ?>">Modifier</a></button>
						<button class="btn btn-danger d-block"><a class="text-reset" href="<?= htmlspecialchars($config->basepath, ENT_QUOTES, 'UTF-8'); ?>/ArticleDelete">Supprimer</a></button>
					</div>
				</div>
				<div class="list-group list-group-flush">
					<?php
					// Display waiting comments for the current user
					$waitingComments = $article->commentList;
					foreach ($waitingComments as $comment) {
					?>
						<div class="list-group-item d-flex">
							<h4>Waiting comment from: <?= htmlspecialchars($comment->author, ENT_QUOTES, 'UTF-8'); ?></h4>
							<p><?= htmlspecialchars($comment->content, ENT_QUOTES, 'UTF-8'); ?></p>
							<a class="btn bg-danger text-white mr-3" href="<?= htmlspecialchars($config->basepath, ENT_QUOTES, 'UTF-8'); ?>/Article/<?= htmlspecialchars($article->id, ENT_QUOTES, 'UTF-8'); ?>/<?= htmlspecialchars($comment->id, ENT_QUOTES, 'UTF-8'); ?>/Cancel">Annuler</a>
							<a class="btn btn-primary" href="<?= $config->basepath ?>/Article/<?= $article->id; ?>/Comment/<?= $comment->id ?>/Valid">Valider</a>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php
		}
		?>
	</section>
</main>