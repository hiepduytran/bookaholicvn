<?php

require_once BASE_PATH . '/template/admin/layouts/head-tag.php';

?>

<section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h5">Cập nhật người dùng</h1>
</section>

<section class="row my-3">
    <section class="col-12">

        <form method="post" action="<?= url('admin/user/update/' . $user['id']) ?>">
            <div class="form-group">
                <label for="username">Tên người dùng</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>">
            </div>

            <div class="form-group">
                <label for="permission">Quyền</label>
                <select name="permission" id="permission" class="form-control" required autofocus>

                    <option value="user" <?php if ($user['permission'] == 'user') echo 'selected' ?>>Người dùng</option>
                    <option value="admin" <?php if ($user['permission'] == 'admin') echo 'selected' ?>>Quản trị viên</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
        </form>

    </section>
</section>


<?php

require_once BASE_PATH . '/template/admin/layouts/footer.php';

?>