<h1 class="alert alert-success"><?= $title ?></h1>
<h2>Книги из базы данных, <?= count($books); ?> шт.</h2>
<?php foreach ($books as $book) : ?>
<p>книга <?= $book['title']; ?>, издательства <?= $book['publishing']; ?> изданная в <?= $book['year_publishing']; ?> году</p>
<?php endforeach; ?>
