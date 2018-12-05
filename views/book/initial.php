<div class="content">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
</div>
    <?php $categories = Utils::showCategories(); ?>
    <?php if($categories && $categories->num_rows>0):?>
        <div id="categories">
            <h1>Categories</h1>
            <div class="categories-buttons">
                <?php while($cat = $categories->fetch_object()): ?>
                    <a href="#"><?=$cat->name_category?></a>
                <?php endwhile; ?>
            </div>
            
        </div>
    <?php endif; ?>
    
    <!--<div id="categories">
        <h1>Categories</h1>
        <div class="categories-buttons">
            <button class="button">Mistery</button>
            <button class="button">Science</button>
            <button class="button">Literature</button>
            <button class="button">Black Novel</button>
            <button class="button">Computing</button>

            <button class="button">Cook</button>
            <button class="button">Health</button>
            <button class="button">Literature</button>
            <button class="button">History</button>
            <button class="button">Fantasy</button>
        </div>
    </div>-->

    <div class="container">
        <h1>Most Rented</h1>
        <div class="most-rented">
            <div class="book-rented">
                <img src="assets/img/casa3.jpg">
                <div class="card">
                    <h2>Harry Potter</h2>
                    <p>By Gabriel Lopez</p>
                    <p>Estrelles</p>
                    <a href="<?=BASE_URL?>Book/see&id=1">More Information</a>
                </div>
            </div>
            <div class="book-rented">
                <img src="assets/img/casa3.jpg">
                <div class="card">
                    <h2>Harry Potter</h2>
                    <p>By Gabriel Lopez</p>
                    <p>Estrelles</p>
                    <a href="#" >More Information</a>
                </div>
            </div>
            <div class="book-rented">
                <img src="assets/img/casa3.jpg">
                <div class="card">
                    <h2>Harry Potter</h2>
                    <p>By Gabriel Lopez</p>
                    <p>Estrelles</p>
                    <a href="#" >More Information</a>
                </div>
            </div>
            <div class="book-rented">
                <img src="assets/img/casa3.jpg">
                <div class="card">
                    <h2>Harry Potter</h2>
                    <p>By Gabriel Lopez</p>
                    <p>Estrelles</p>
                    <a href="#">More Information</a>
                </div>
            </div>
            <div class="book-rented">
                <img src="assets/img/casa3.jpg">
                <div class="card">
                    <h2>Harry Potter</h2>
                    <p>By Gabriel Lopez</p>
                    <p>Estrelles</p>
                    <a href="#" >More Information</a>
                </div>
            </div>
            <div class="book-rented">
                <img src="assets/img/casa3.jpg">
                <div class="card">
                    <h2>Harry Potter</h2>
                    <p>By Gabriel Lopez</p>
                    <p>Estrelles</p>
                    <a href="#" class="button">More Information</a>
                </div>
            </div>
            <div class="book-rented">
                <img src="assets/img/casa3.jpg">
                <div class="card">
                    <h2>Harry Potter</h2>
                    <p>By Gabriel Lopez</p>
                    <p>Estrelles</p>
                    <a href="#" class="button">More Information</a>
                </div>
            </div>
        </div>

    </div>
</div>
