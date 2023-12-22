<?php
require_once(BASE_PATH . '/template/app/layouts/header.php');
?>

<div class="container-fluid wrap pt-3">
    <!-- breakings news -->
    <?php if (!empty($breakingNews)) : ?>
        <div class="column">
            <div id="hot-post">
                <div class="content-container m-3">
                    <div class="post-header">
                        <a href="<?= url('show-post/' . $breakingNews['id']) ?>" class="post-header-link"><?= $breakingNews['title'] ?></a>
                    </div>
                    <div class="image-container">
                        <img class="w-100 zoom-image" src="<?= $breakingNews['image'] ?>" alt="<?= $breakingNews['title'] ?>">
                    </div>

                    <div class="text-container post-content">
                        <p class="truncate-text"><?= $breakingNews['summary'] ?></p>
                        <a href="<?= url('show-post/' . $breakingNews['id']) ?>">Đọc tiếp >></a>
                    </div>

                    <div class="date-and-views">
                        <i class="bi bi-calendar"><?= $breakingNews['created_at'] ?></i>
                        &nbsp; &nbsp;<i class="bi bi-eye"></i> <?= $breakingNews['view'] ?>
                        &nbsp; &nbsp;<i class="bi bi-chat"></i>
                        <?php
                        // Truy vấn để đếm số lượng comment cho bài đăng
                        $commentCount = $db->select('SELECT COUNT(*) AS comment_count FROM comments WHERE post_id = ?', [$breakingNews['id']])->fetchColumn();
                        ?>
                        <?= $commentCount ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row d-flex">
        <div class="col-5" id="most-views-posts-column">
            <!-- Banner Lượt xem nhiều nhất -->
            <div class="title m-3 bg-light">
                <h4 class="m-3" style="font-weight: 700;">PHỔ BIẾN NHẤT</h4>
            </div>

            <!-- Lượt xem nhiều nhất -->
            <!-- PHP -->
            <?php if (!empty($popularPosts)) : ?>
                <div id="most-view-post">
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
            <?php endif; ?>
        </div>

        <div class="col-7" id="latest-posts-column">
            <?php
            $postsPerPage = 3;
            $totalPosts = count($lastPosts);
            $totalPages = ceil($totalPosts / $postsPerPage);
            $currentPage = isset($_GET['page']) ? max(1, min(intval($_GET['page']), $totalPages)) : 1;
            $startIndex = ($currentPage - 1) * $postsPerPage;
            $visiblePosts = array_slice($lastPosts, $startIndex, $postsPerPage);
            ?>

            <?php if (!empty($visiblePosts)) : ?>
                <div id="latest-post">
                    <!-- Hiển thị nút phân trang -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <?php if ($currentPage > 1) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?= url('/?page=' . ($currentPage - 1)) ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo; Previous</span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php foreach (range(1, $totalPages) as $page) : ?>
                                <li class="page-item <?= ($page == $currentPage) ? 'active' : '' ?>">
                                    <a class="page-link" href="<?= url('/?page=' . $page) ?>"><?= $page ?></a>
                                </li>
                            <?php endforeach; ?>

                            <?php if ($currentPage < $totalPages) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?= url('/?page=' . ($currentPage + 1)) ?>" aria-label="Next">
                                        <span aria-hidden="true">Next &raquo;</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                    <?php foreach ($visiblePosts as $post) : ?>
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
                                &nbsp; &nbsp;<i class="bi bi-eye"></i> <?= $post['view'] ?>
                                &nbsp; &nbsp;<i class="bi bi-chat"></i> <?= $post['comments_count'] ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>

</div>

<!-- start footer Area -->
<?php
require_once(BASE_PATH . '/template/app/layouts/footer.php');
?>