<?php

require_once(BASE_PATH . '/template/admin/layouts/head-tag.php')

?>



<section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h5">Tạo bài đăng mới</h1>
</section>

<section class="row my-3">
    <section class="col-12">

        <form method="post" action="<?= url('admin/post/store') ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title ..." required autofocus>
            </div>

            <div class="form-group">
                <label for="cat_id">Danh mục</label>
                <select name="cat_id" id="cat_id" class="form-control" required autofocus>
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?= $category['id'] ?>">
                            <?= $category['name'] ?>
                        </option>

                    <?php } ?>


                </select>
            </div>

            <div class="form-group">
                <label for="image">Ảnh</label>
                <input type="file" id="image" name="image" class="form-control-file" required autofocus>
            </div>

            <div class="form-group">
                <label for="published_at">Thời gian</label>
                <input type="hidden" class="form-control" id="published_at" name="published_at" required autofocus>
                <input type="text" class="form-control" id="published_at_view" required autofocus>
            </div>

            <div class="form-group">
                <label for="summary">Tóm tắt</label>
                <textarea class="form-control" id="summary" name="summary" placeholder="summary ..." rows="3" required autofocus></textarea>
            </div>

            <div class="form-group">
                <label for="body">Nội dung</label>
                <textarea class="form-control" id="body" name="body" placeholder="body ..." rows="150" required autofocus></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">create</button>
        </form>
    </section>
</section>

<?php

require_once(BASE_PATH . '/template/admin/layouts/footer.php')

?>