<div class="center">
    <h1>Categories</h1>
    <?php if(isset($_SESSION['category_result'])):?>
        <?php if(substr($_SESSION['category_result'], 0, 1) == 'S'): ?>
        <div class="alert alert-success">
            <?=$_SESSION['category_result']?>
        </div>
        <?php else: ?>
        <div class="alert alert-danger">
            <?=$_SESSION['category_result']?>
        </div>
        <?php endif; ?>
        <?php Utils::deleteSession('category_result') ?>
    <?php endif; ?>
    <a href="<?=BASE_URL?>category/add" class="btn btn-success"><i class="fas fa-plus"></i>Add Category</a>
    <table class="table">
       <thead class="thead-dark">
        <tr>
          <th scope="col">Category Name</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
          <?php while($cat = $categories->fetch_object()): ?>
            <tr>
                <td scope="row">
                   <?=$cat->name_category?>
                </td>
                <td scope="row">
                    <a href="<?=BASE_URL?>category/edit&id=<?=$cat->id?>"><i class="fas fa-pencil-alt"></i></a>
                </td>
                <td scope="row">
                    <a href="<?=BASE_URL?>category/delete&id=<?=$cat->id?>"><i class="fas fa-times"></i></a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
