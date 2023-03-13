<div class="container">
		<h1>Article List</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Title</th>
					<th>Author</th>
					<th>Chapo</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>
				<?php
				var_dump($articlesList);
				foreach($articlesList as $article){
				?>
				<tr>
					<td><a href="article.php?id=<?= $article->id; ?>"><?= $article->title; ?></a></td>
					<td><?= $article->author; ?></td>
					<td><?= $article->chapo; ?></td>
					<td><?= $article->date; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>