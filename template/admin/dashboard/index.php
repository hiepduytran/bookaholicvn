<?php
require_once(BASE_PATH . "/template/admin/layouts/head-tag.php");
?>
<div class="row mt-3">

    <div class="col-sm-6 col-lg-3">
        <a href="<?= url('admin/category') ?>" class="text-decoration-none">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-clipboard-list"></i> Danh mục </span> <span class="badge badge-pill right"><?= $categoryCount['COUNT(*)']; ?></span></div>
                <div class="card-body">
                    <section class="font-12 my-0"><i class="fas fa-clipboard-list"></i> ĐI ĐẾN Danh mục! </section>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="<?= url('admin/user') ?>" class="text-decoration-none">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-users"></i> Người dùng</span> <span class="badge badge-pill right"><?= $userCount['COUNT(*)']; ?></span></div>
                <div class="card-body">
                    <section class="d-flex justify-content-between align-items-center font-12">
                        <span class=""><i class="fas fa-users-cog"></i> Quản trị viên <span class="badge badge-pill mx-1"><?= $adminCount['COUNT(*)']; ?></span></span>
                        <span class=""><i class="fas fa-user"></i> Người dùng <span class="badge badge-pill mx-1"><?= $userCount['COUNT(*)'] ?></span></span>
                    </section>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="<?= url('admin/post') ?>" class="text-decoration-none">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-newspaper"></i> Tác phẩm</span> <span class="badge badge-pill right"><?= $postCount['COUNT(*)']; ?></span></div>
                <div class="card-body">
                    <section class="d-flex justify-content-between align-items-center font-12">
                        <span class=""><i class="fas fa-bolt"></i> Lượt xem <span class="badge badge-pill mx-1"><?= $postsViews['SUM(view)']; ?></span></span>
                    </section>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="<?= url('admin/comment') ?>" class="text-decoration-none">
            <div class="card text-white bg-info mb-3">
                <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-comments"></i> Bình luận</span> <span class="badge badge-pill right"><?= $commentsCount['COUNT(*)']; ?></span></div>
                <div class="card-body">
                    <!--<h5 class="card-title">Info card title</h5>-->
                    <section class="d-flex justify-content-between align-items-center font-12">
                        <span class=""><i class="fa fa-eye-slash"></i> Chưa duyệt <span class="badge badge-pill mx-1"><?= $commentsUnseenCount['COUNT(*)']; ?></span></span>
                        <span class=""><i class="fa fa-check-circle"></i> Duyệt <span class="badge badge-pill mx-1"><?= $commentsApprovedCount['COUNT(*)']; ?></span></span>
                    </section>
                </div>
            </div>
        </a>
    </div>

</div>


<div class="row mt-2">
    <div class="col-4">
        <h2 class="h6 pb-0 mb-0">
            Bài viết được xem nhiều nhất
        </h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th style="text-align: center;">Lượt xem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($postsWithView as $key => $post) { ?>
                        <tr>
                            <td><a class="text-primary" href="<?= url('admin/post') ?>"><?= $key += 1 ?></a></td>
                            <td><a class="text-dark" href="<?= url('admin/post') ?>"><?= $post['title'] ?></a></td>
                            <td style="text-align: center;"><span class="badge badge-secondary"><?= $post['view'] ?></span></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
    <div class="col-4">
        <h2 class="h6 pb-0 mb-0">
            Bài viết được bình luận nhiều nhất
        </h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th style="text-align: center;">Bình luận</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($postsComments as $key => $post) { ?>
                        <tr>
                            <td><a class="text-primary" href="<?= url('admin/post') ?>"><?= $key += 1 ?></a></td>
                            <td><a class="text-dark" href="<?= url('admin/post') ?>"><?= $post['title'] ?></a></td>
                            <td style="text-align: center;"><span class="badge badge-success"><?= $post['comment_count'] ?></span></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
    <div class="col-4">
        <h2 class="h6 pb-0 mb-0">
            Bình luận
        </h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên người dùng</th>
                        <th>Bình luận</th>
                        <th style="text-align: center;">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lastComments as $key => $comment) { ?>

                        <tr>
                            <td><a class="text-primary" href="<?= url('admin/comment') ?>"><?= $key += 1 ?></a></td>
                            <td><a class="text-dark" href="<?= url('admin/comment') ?>"><?= $comment['username'] ?></a></td>
                            <td><a class="text-dark" href="<?= url('admin/comment') ?>"><?= $comment['comment'] ?></a></td>
                            <td style="text-align: center;"><span class="badge badge-warning"><?= $comment['status'] ?></span></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require_once(BASE_PATH . "/template/admin/layouts/footer.php");
?>