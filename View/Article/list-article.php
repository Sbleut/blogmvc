<div class="container">
	<h1>Article List</h1>
	<?php
	foreach ($articlesList as $article) {
	?>
		<div class="card my-3">
			<div class="card-body">
				<h5 class="card-title"><?= htmlspecialchars($article->title, ENT_QUOTES, 'UTF-8'); ?></h5>
				<h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($article->date, ENT_QUOTES, 'UTF-8'); ?></h6>
				<p class="card-text"><?= htmlspecialchars($article->chapo, ENT_QUOTES, 'UTF-8'); ?></p>
				<a href="<?= $config->basepath ?>/Article/<?= $article->id; ?>"><?= htmlspecialchars($article->title, ENT_QUOTES, 'UTF-8'); ?></a>
				<p><?= $article->post_author; ?></p>

			</div>
		</div>
	<?php } ?>
	<!-- Pagination links -->
	<nav aria-label="Page navigation example">
		<ul class="pagination justify-content-center">
			<?php if ($data['page'] > 1) : ?>
				<li class="page-item"><a class="page-link" href="<?= htmlspecialchars($data['page'] - 1, ENT_QUOTES, 'UTF-8') ?>">Previous</a></li>
			<?php endif; ?>

			<?php for ($i = 1; $i <= $data['totalPages']; $i++) : ?>
				<li class="page-item <?= ($data['page'] == $i) ? 'active' : '' ?>"><a class="page-link" href="<?= htmlspecialchars($i, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($i, ENT_QUOTES, 'UTF-8') ?></a></li>
			<?php endfor; ?>

			<?php if ($data['page'] < $data['totalPages']) : ?>
				<li class="page-item"><a class="page-link" href="<?= htmlspecialchars($data['page'] + 1, ENT_QUOTES, 'UTF-8') ?>">Next</a></li>
			<?php endif; ?>
		</ul>
	</nav>

</div>