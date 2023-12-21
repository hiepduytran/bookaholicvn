<?php

require_once(BASE_PATH . '/template/admin/layouts/head-tag.php')

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5"><i class="fas fa-clipboard-list"></i> Danh mục</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a role="button" href="<?= url('admin/category/create') ?>" class="btn btn-sm btn-success">
            Tạo mới
        </a>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <caption>Danh sách các danh mục</caption>
        <thead>
            <tr>
                <th style="text-align: center;">#</th>
                <th style="text-align: center;">Tên</th>
                <th style="text-align: center;">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $key => $category) { ?>
                <tr>
                    <td style="text-align: center;">
                        <?= $key += 1 ?>
                    </td>
                    <td style="text-align: center;">
                        <?= $category['name'] ?>
                    </td>
                    <td style="text-align: center;">
                        <a role="button" href="<?= url('admin/category/edit/' . $category['id']) ?>" class="btn btn-sm btn-info my-0 mx-1 text-white"><i class="fas fa-pen"></i></a>
                        <a role="button" href="<?= url('admin/category/delete/' . $category['id']) ?>" class="btn btn-sm btn-danger my-0 mx-1 text-white"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>

<?php

require_once(BASE_PATH . '/template/admin/layouts/footer.php')

?>