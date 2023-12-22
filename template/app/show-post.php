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

                <div class="comment-container p-4 border-top">
                    <h6>Bình luận</h6>
                    <?php foreach ($comments as $comment) { ?>
                        <div class="comment-box">
                            <div class="border mb-3 rounded-4">
                                <div class="user-info">
                                    <i class="bi bi-person-circle avatar h-100"></i>
                                    <div class="username">
                                        <?= $comment['username'] ?>
                                    </div>
                                </div>
                                <div class="comment-content">
                                    <?= $comment['comment'] ?>
                                </div>
                                <div class="comment-time">
                                    <?= $comment['created_at'] ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (isset($_SESSION['user'])) { ?>
                            <div class="comment-actions">
                                <form action="<?= url('comment-store') ?>" method="post">
                                    <input type="text" value="<?= $post['id'] ?>" name="post_id" class="d-none">
                                    <textarea class="form-control mb-10 text-left" rows="2" name="comment" placeholder="Nhập bình luận của bạn..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Thêm bình luận'" required=""></textarea>
                            </div>
                            <button type="submit" class="primary-btn text-uppercase">Gửi bình luận</button>
                            </form>
                        </div>
                    <?php } ?>
                </div>
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