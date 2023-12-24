<?php
require_once(BASE_PATH . '/template/app/layouts/header.php');
?>

<div class="container-fluid detail-wrapper py-5">
    <div class="row d-flex justify-content-between">
        <!-- CHi tiết bài đăng -->
        <div class="col-md-8" style="height: fit-content;">
            <!-- Content -->
            <div class="content-container mb-4">
                <div class="post-header">
                    <a href="<?= url('show-post/' . $post['id']) ?>" class="post-header-link">
                        <?= $post['title'] ?>
                    </a>
                </div>

                <div class="image-container">
                    <img class="w-100 zoom-image" src="<?= asset($post['image']) ?>" alt="<?= $post['title'] ?>">
                </div>
                <div class="content-post px-5 py-3">
                    <?= $post['body'] ?>
                </div>

                <!-- Bình luận -->
                <div class="comment-container border-top">
                    <div class="comment-box p-3">
                        <h5>Bình luận</h5>
                        <!-- Hiển thị bình luận -->
                        <?php foreach ($comments as $comment) { ?>
                            <div class="border rounded-4 mb-3">
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
                        <!-- Hiển thị bình luận -->

                        <!-- Thêm bình luận mới -->
                        <?php if (isset($_SESSION['user'])) { ?>
                            <form action="<?= url('comment-store') ?>" method="post" class="comment-actions">
                                <div class="form-group">
                                    <input type="text" value="<?= $post['id'] ?>" name="post_id" class="d-none">
                                    <textarea class="form-control mb-10 text-left" rows="5" name="comment" placeholder="Nhập bình luận của bạn..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập bình luận của bạn...'" required=""></textarea>
                                </div>
                                <button type="submit" class="primary-btn text-uppercase">Gửi bình luận</button>
                            </form>
                        <?php } ?>
                        <!-- Thêm bình luận mới -->
                    </div>
                </div>
                <!-- Bình luận -->
            </div>
        </div>
        <!-- End: Chi tiết bài đăng -->

        <!-- Bài viết liên quan -->
        <div class="col-md-4 bg-white rounded" style="height: fit-content;">
            <div class="mt-4 mb-5 mx-2">
                <div class="text-center my-3 border-bottom shadow">
                    <h3 class="pt-2">Bài viết liên quan</h3>
                </div>
                <?php foreach ($relatedPosts as $post) : ?>
                    <div class="mb-3 border shadow-sm rounded">
                        <div class="post-header">
                            <a href="<?= url('show-post/' . $post['id']) ?>" class="post-header-link">
                                <?= $post['title'] ?>
                            </a>
                        </div>
                        <div class="image-container">
                            <img class="w-100 zoom-image" src="<?= asset($post['image']) ?>" alt="<?= $post['title'] ?>">
                        </div>
                        <div class="text-container post-content">
                            <p class="truncate-text">
                                <?= $post['summary'] ?>
                            </p>
                            <a class="continue-reading-link" href="<?= url('show-post/' . $post['id']) ?>">Đọc tiếp</a>
                        </div>
                        <div class="date-and-views">
                            <i class="bi bi-calendar">
                                <?= $post['created_at'] ?>
                            </i>
                            <i class="bi bi-eye">
                                <?= $post['view'] ?>
                            </i>
                            <i class="bi bi-chat">
                                <?= $post['comments_count'] ?>
                            </i>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- End Bài viết liên quan -->
    </div>
</div>

<!-- start footer Area -->
<?php
require_once(BASE_PATH . '/template/app/layouts/footer.php');
?>