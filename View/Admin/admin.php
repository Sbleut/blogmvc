<header>
	<h1>Admin Panel</h1>
</header>
<nav>
	<ul>
		<li><a href="#">Users</a></li>
		<li><a href="#">Settings</a></li>
		<li><a href="#">Logout</a></li>
	</ul>
</nav>
<main>
	<h2>Welcome, Admin!</h2>
	<p>Here you can manage all the aspects of your website.</p>
	<p>Use the navigation menu to access different sections of the admin panel.</p>

	<?php
	foreach ($articles as $article) {
	?>
		<div class="card my-3">
			<div class="card-body">
				<h5 class="card-title"><?= $article->title; ?></h5>
				<h6 class="card-subtitle mb-2 text-muted"><?= $article->date; ?></h6>
				<a href="<?= $config->basepath ?>/Article/<?= $article->id; ?>"><?= $article->title; ?></a>
			</div>
			<div class="list-group list-group-flush">
				<?php
				// Display waiting comments for the current user
				$waitingComments = $article->commentList;
				foreach ($waitingComments as $comment) {
				?>
					<div class="list-group-item d-flex">
						<p>Waiting comment from: <?= $comment->author ?></p>
						<p><?= $comment->content ?></p>
						<a class="btn bg-danger text-white" href="<?= $config->basepath ?>/Article/<?= $article->id; ?>/<?= $comment->id ?>/Cancel">Annuler</a>
						<a class="btn btn-primary" href="<?= $config->basepath ?>/Article/<?= $article->id; ?>/Comment/<?= $comment->id ?>/Valid">Valider</a>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php
	}
	?>
</main>
<footer>
	<p>&copy; 2023 Admin Panel. All rights reserved.</p>
</footer>