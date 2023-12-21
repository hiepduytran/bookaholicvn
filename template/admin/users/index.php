<?php

require_once(BASE_PATH . '/template/admin/layouts/head-tag.php');


?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5"><i class="fas fa-users"></i> Người dùng</h1>
    <div class="btn-toolbar mb-2 mb-md-0 d-none">
        <a role="button" href="#" class="btn btn-sm btn-success disabled">create</a>
    </div>
</div>
<section class="table-responsive">
    <table class="table table-striped table-sm">
        <caption>Danh sách những người dùng</caption>
        <thead>
            <tr>
                <th style="text-align: center;">#</th>
                <th style="text-align: center;">Tên người dùng</th>
                <th style="text-align: center;">Email</th>
                <th style="text-align: center;">Quyền</th>
                <th style="text-align: center;">Thời gian tạo</th>
                <th style="text-align: center;">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $displayedKey = 0;
            foreach ($users as $key => $user) {
                if ($user['id'] != $_SESSION['user']) {
                    $displayedKey += 1;
            ?>
                    <tr>
                        <td style="text-align: center;"><?= $displayedKey ?></td>
                        <td style="text-align: center;"><?= $user['username'] ?></td>
                        <td style="text-align: center;"><?= $user['email'] ?></td>
                        <td style="text-align: center;"><?= $user['permission'] ?></td>
                        <td style="text-align: center;"><?= $user['created_at'] ?></td>
                        <td style="text-align: center;">
                            <?php if ($user['permission'] == 'user') { ?>
                                <a role="button" class="btn btn-sm btn-success text-white" href="<?= url('admin/user/permission/' . $user['id']) ?>">Nâng quyền</a>
                            <?php } else { ?>
                                <a role="button" class="btn btn-sm btn-warning text-white" href="<?= url('admin/user/permission/' . $user['id']) ?>">Hạ quyền</a>
                            <?php } ?>
                            <a role="button" class="btn btn-sm btn-primary text-white" href="<?= url('admin/user/edit/' . $user['id']) ?>"><i class="fas fa-pen"></i></a>
                            <a role="button" class="btn btn-sm btn-danger text-white" href="<?= url('admin/user/delete/' . $user['id']) ?>"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</section>


<?php

require_once(BASE_PATH . '/template/admin/layouts/footer.php');


?>