<div class="content">
    <form action="<?=BASE_URL?>category/save" method="POST">
        <div class="label-input">
            <label for="category">Category Name</label>
            <input type="text" name="category" value="<?=$category->getName_category()?>" />
        </div>
        <input type="submit" name="update" value="Update" />
    </form>
</div>

