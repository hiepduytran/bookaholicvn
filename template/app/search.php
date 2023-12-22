<?php
require_once(BASE_PATH . '/template/app/layouts/header.php');
?>

<div class="container-fluid category-wrapper">

    <div class="row m-auto d-flex">
        <?php $count = 0; ?>
        <?php foreach ($post_for_search as $searched_post) { ?>
            <div class="col-4">
                <div class="content-container mb-4">
                    <!-- Tiêu đề -->
                    <div class="post-header">
                        <a href="<?= url('show-post/' . $searched_post['id']) ?>" class="post-header-link"><?= $searched_post['title'] ?></a>
                    </div>
                    <div class="image-container">
                        <img class="w-100 zoom-image" src="<?= asset($searched_post['image']) ?>" alt="<?= $searched_post['title'] ?>">
                    </div>

                    <div class="text-container post-content">
                        <p class="truncate-text"><?= $searched_post['summary'] ?></p>
                        <a href="<?= url('show-post/' . $searched_post['id']) ?>">Đọc tiếp >></a>
                    </div>

                    <div class="date-and-views">
                        <i class="bi bi-calendar"><?= $searched_post['created_at'] ?></i>
                        &nbsp; &nbsp;<i class="bi bi-eye"><?= $searched_post['view'] ?></i>
                        &nbsp; &nbsp;<i class="bi bi-chat"></i>
                        <?php
                        // Query to count the number comment of each post.
                        $commentCount = $db->select('SELECT COUNT(*) AS comment_count FROM comments WHERE post_id = ?', [$searched_post['id']])->fetchColumn();
                        ?>
                        <?= $commentCount ?>
                    </div>
                </div>
            </div>

            <?php
            $count++;
            // If count % 3 == 0, close div.row and creating a new div. 
            if ($count % 3 == 0) {
                echo '</div><div class="row m-auto d-flex">';
            }
            ?>
        <?php } ?>
    </div>

</div>

<?php
require_once(BASE_PATH . '/template/app/layouts/footer.php');
?>