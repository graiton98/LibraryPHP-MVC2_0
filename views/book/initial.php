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
            <div class="item-book">
                <img class="card-img-top" src="assets/img/casa3.jpg">
                <div class="card-body">
                    <h2 class="card-title">Harry Potter</h2>
                    <p class="card-text">By Gabriel Lopez</p>
                    <a href="<?=BASE_URL?>Book/see&id=1" class="btn text-white" style="background-color: #00b0ff">More Information</a>
                </div>
            </div>
            <div class="item-book">
                <img class="card-img-top" src="assets/img/casa3.jpg">
                <div class="card-body">
                    <h2 class="card-title">Harry Potter</h2>
                    <p class="card-text">By Gabriel Lopez</p>
                    <a href="<?=BASE_URL?>Book/see&id=1" class="btn btn-primary">More Information</a>
                </div>
            </div>
            <div class="item-book">
                <img class="card-img-top" src="assets/img/casa3.jpg">
                <div class="card-body">
                    <h2 class="card-title">Harry Potter</h2>
                    <p class="card-text">By Gabriel Lopez</p>
                    <a href="<?=BASE_URL?>Book/see&id=1" class="btn btn-primary">More Information</a>
                </div>
            </div>
            <div class="item-book">
                <img class="card-img-top" src="assets/img/casa3.jpg">
                <div class="card-body">
                    <h2 class="card-title">Harry Potter</h2>
                    <p class="card-text">By Gabriel Lopez</p>
                    <a href="<?=BASE_URL?>Book/see&id=1" class="btn btn-primary">More Information</a>
                </div>
            </div>
            <div class="item-book">
                <img class="card-img-top" src="assets/img/casa3.jpg">
                <div class="card-body">
                    <h2 class="card-title">Harry Potter</h2>
                    <p class="card-text">By Gabriel Lopez</p>
                    <a href="<?=BASE_URL?>Book/see&id=1" class="btn btn-primary">More Information</a>
                </div>
            </div>
            <div class="item-book">
                <img class="card-img-top" src="assets/img/casa3.jpg">
                <div class="card-body">
                    <h2 class="card-title">Harry Potter</h2>
                    <p class="card-text">By Gabriel Lopez</p>
                    <a href="<?=BASE_URL?>Book/see&id=1" class="btn btn-primary">More Information</a>
                </div>
            </div>
            <div class="item-book">
                <img class="card-img-top" src="assets/img/casa3.jpg">
                <div class="card-body">
                    <h2 class="card-title">Harry Potter</h2>
                    <p class="card-text">By Gabriel Lopez</p>
                    <a href="<?=BASE_URL?>Book/see&id=1" class="btn btn-primary">More Information</a>
                </div>
            </div>
        </div>

    </div>
</div>