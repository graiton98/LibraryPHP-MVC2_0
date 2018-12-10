<div class="center">
    

    <!--<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="assets/img/casa3.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/casa3.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/casa3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>-->
    <?php $categories = Utils::showCategories(); ?>
    <?php if($categories && $categories->num_rows>0):?>
        <div id="categories">
            <h1>Categories</h1>
            <div class="categories-buttons">
                <?php while($cat = $categories->fetch_object()): ?>
                <a href="#" class="btn text-white" style="background-color: #1070ff"><?=$cat->name_category?></a>
                <?php endwhile; ?>
            </div>
            
        </div>
    <?php endif; ?>
    

    <div class="container">
        <h1>Books</h1>
        <div class="list-books">
            <?php $books = Utils::allBooks(); ?>
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