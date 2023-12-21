<?php

require_once(BASE_PATH . '/template/admin/layouts/head-tag.php')

?>

<section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h5">Cập nhật danh mục</h1>
</section>
<section class="row my-3">
    <section class="col-12">
        <form method="post" action="<?= url('admin/category/update/' . $category['id']) ?>">
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $category['name'] ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
        </form>
    </section>

    <?php

    require_once(BASE_PATH . '/template/admin/layouts/footer.php')

    ?>