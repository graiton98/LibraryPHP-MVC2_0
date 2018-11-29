<?php if(!$book): ?>
<h1>Error: Book Not Found</h1>
<?php else: ?>
<div class="container-singleBook">
    <img src="<?=BASE_URL?>assets/img/casa3.jpg" />
    <div class="info-book">
        <p><span class="titol-info">Name</span> <?=$book->name_book?></p>
        <p><span class='titol-info'>ISBN</span> <?=$book->isbn?></p>
        <p><span class="titol-info">Description</span> <?=$book->description?></p>
        <a href="<?=BASE_URL?>Reserve/reserve&id=<?=$book->id?>">Reserve</a>
    </div>
</div>
<?php endif; ?>


