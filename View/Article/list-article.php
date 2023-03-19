<div class="container">
	<h1>Article List</h1>
	<?php
	foreach ($articlesList as $article) {
	?>
		<div class="card my-3">
			<div class="card-body">
				<h5 class="card-title"><?= $article->title; ?></h5>
				<h6 class="card-subtitle mb-2 text-muted"><?= $article->date; ?></h6>
				<p class="card-text"><?= $article->chapo; ?></p>
				<a href="<?=$config->basepath?>/Article/<?= $article->id; ?>"><?= $article->title; ?></a>
				<p><?= $article->post_author; ?></p>

			</div>
		</div>
	<?php } ?>
		<!-- Pagination links -->
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center">
				<?php if ($data['page'] > 1): ?>
					<li class="page-item"><a class="page-link" href="<?php echo ($data['page'] - 1); ?>">Previous</a></li>
				<?php endif; ?>

				<?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
					<li class="page-item <?php echo ($data['page'] == $i) ? 'active' : ''; ?>"><a class="page-link" href="<?php echo $i; ?>"><?php echo $i; ?></a></li>
				<?php endfor; ?>

				<?php if ($data['page'] < $data['totalPages']): ?>
					<li class="page-item"><a class="page-link" href="<?php echo ($data['page'] + 1); ?>">Next</a></li>
				<?php endif; ?>
			</ul>
		</nav>

</div>