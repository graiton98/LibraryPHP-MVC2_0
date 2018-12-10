<div class="center">
    <?php if(!$book): ?>
    <h1>Error: Book Not Found</h1>
    <?php else: ?>
    <h1><?=$book->name_book?></h1>
    <div class="container-singleBook">
        <img src="<?=BASE_URL?>assets/img/casa3.jpg" class="img-thumbnail"/>
        <div class="info-book">
            <p><span class="titol-info">Book Name:</span> <?=$book->name_book?></p>
            <p><span class='titol-info'>ISBN: </span> <?=$book->isbn?></p>
            <p><span class="titol-info">Description: </span> <?=$book->description?></p>
            <a href="<?=BASE_URL?>Reserve/create&id=<?=$book->id?>" class="btn btn-primary">Reserve</a>
        </div>
    </div>
    <div class="similar-books"></div>
    <?php endif; ?>
</div>

