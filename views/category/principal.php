<div class="center">
    <div class="container">
        <h1><?=$category->getName_category()?></h1>
        <div class="list-books">
            <?php $authors = Utils::getAuthors(); ?>
            <?php while($book = $books->fetch_object()): ?>
            <div class="item-book">
                <img class="card-img-top" src="<?=BASE_URL?>assets/img/<?=$book->isbn?>.<?=$book->extImage?>">
                <div class="card-body">
                    <h2 class="card-title"><?=$book->name_book?></h2>
                    <?php 
                        $authors = Utils::getAuthors();
                        while ($aut = $authors->fetch_object()): ?>
                        <?php if(isset($book) && is_object($book) && $aut->id == $book->author_id): ?>
                            <p class="card-text">By <?=$aut->name_author.' '.$aut->first_surname?></p>
                        <?php endif; ?>
                        </option>
                    <?php endwhile; ?>
                    <a href="<?=BASE_URL?>Book/see&id=<?=$book->id?>" class="btn text-white" style="background-color: #00b0ff">More Information</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>



