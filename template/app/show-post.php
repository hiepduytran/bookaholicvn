<?php
require_once(BASE_PATH . '/template/app/layouts/header.php');
?>

<div class="container-fluid detail-wrapper py-4">
    <div class="row d-flex justify-content-between">
        <!-- CHi tiết bài đăng -->
        <div class="col-8" style="height: fit-content;">
            <!-- Content -->
            <div class="content-container mb-4">
                <div class="post-header">
                    <a href="<?= url('show-post/' . $post['id']) ?>" class="post-header-link"><?= $post['title'] ?></a>
                </div>

                <div class="image-container">
                    <img class="w-100 zoom-image" src="<?= asset($post['image']) ?>" alt="<?= $post['title'] ?>">
                </div>
                <div class="content-post"><?= $post['body'] ?></div>

                <!-- Hiển thị bình luận -->
                <div class="comment-sec-area">
                    <div class="container">
                        <div class="row flex-column">
                            <h6>Comment</h6>
                            <?php foreach ($comments as $comment) { ?>
                                <div class="comment-list float-left post-left text-left">
                                    <div class="single-comment justify-content-between ">
                                        <div class="user justify-content-between ">
                                            <div class="row d-flex">
                                                <div class="col-auto">
                                                    <i class="fas fa-user"></i>
                                                    <span class="ml-2"><?= $comment['username'] ?></span>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="bi bi-calendar"></i> <?= $comment['created_at'] ?>
                                                </div>
                                            </div>
                                            <div class="desc post-left text-left">
                                                <h5><a href="#"><?= $comment['username'] ?></a></h5>
                                                <p class="date mt-3"><?= $comment['created_at'] ?></p>
                                                <p class="comment ml-10">
                                                    <?= $comment['comment'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- End: Hiển thị bình luận -->

                <!-- Form thêm bình luận -->
                <?php if (isset($_SESSION['user'])) { ?>
                    <div class="comment-form">
                        <h4>Thêm bình luận</h4>
                        <form action="<?= url('comment-store') ?>" method="post">
                            <div class="form-group">
                                <input type="text" value="<?= $post['id'] ?>" name="post_id" class="d-none">
                                <textarea class="form-control mb-10 text-left" rows="5" name="comment" placeholder="Nhập bình luận của bạn..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'text'" required=""></textarea>
                            </div>
                            <button type="submit" class="primary-btn text-uppercase">Gửi bình luận</button>
                        </form>
                    </div>
                <?php } ?>
                <!-- End: Form thêm bình luận -->
            </div>
        </div>
        <!-- End: Chi tiết bài đăng -->

        <!-- Bài viết mới nhất -->
        <div class="col-4 bg-white rounded" style="height: fit-content;">
            <h4 class="pt-2">Bài viết mới nhất</h4>
            <div class="content-container mb-4">
                <?php foreach ($popularPosts as $post) : ?>
                    <div class="content-container m-3">
                        <div class="post-header">
                            <a href="<?= url('show-post/' . $post['id']) ?>" class="post-header-link"><?= $post['title'] ?></a>
                        </div>
                        <div class="image-container">
                            <img class="w-100 zoom-image" src="<?= asset($post['image']) ?>" alt="<?= $post['title'] ?>">
                        </div>
                        <div class="text-container post-content">
                            <p class="truncate-text"><?= $post['summary'] ?></p>
                            <a class="continue-reading-link" href="<?= url('show-post/' . $post['id']) ?>">Đọc tiếp</a>
                        </div>
                        <div class="date-and-views">
                            <i class="bi bi-calendar"><?= $post['created_at'] ?></i>
                            <i class="bi bi-eye"> <?= $post['view'] ?></i>
                            <i class="bi bi-chat"> <?= $post['comments_count'] ?></i>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- End Bài viết mới nhất -->
    </div>
</div>

<!-- start footer Area -->
<?php
require_once(BASE_PATH . '/template/app/layouts/footer.php');
?>