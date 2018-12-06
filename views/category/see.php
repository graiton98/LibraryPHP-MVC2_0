<div class="content">
    <h1>Categories</h1>
    <?php if(isset($_SESSION['category_result'])):?>
        <p><?php echo $_SESSION['category_result']?></p>
        <?php Utils::deleteSession('category_result') ?>
    <?php endif; ?>
    <a href="<?=BASE_URL?>category/add"><i class="fas fa-plus"></i>Add Category</a>
    <table>
      <tr>
        <th>Category Name</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
          <?php while($cat = $categories->fetch_object()): ?>
            <tr>
                <td>
                   <?=$cat->name_category?>
                </td>
                <td>
                    <a href="<?=BASE_URL?>category/edit&id=<?=$cat->id?>"><i class="fas fa-pencil-alt"></i></a>
                </td>
                <td>
                    <a href="<?=BASE_URL?>category/delete&id=<?=$cat->id?>"><i class="fas fa-times"></i></a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
