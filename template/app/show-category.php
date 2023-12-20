<?php
require_once(BASE_PATH . '/template/app/layouts/header.php');
?>

<div class="container-fluid category-wrapper">
    <!--  Lây tên danh mục -->
    <?php
    // Lấy URL hiện tại
    $currentUrl = $_SERVER['REQUEST_URI'];

    // Phân tách URL thành các phần tử
    $urlParts = explode('/', trim($currentUrl, '/'));

    // Lấy giá trị của path variable (ID) từ URL
    $categoryID = end($urlParts);

    // Lấy tên danh mục từ cơ sở dữ liệu
    $name_category = $db->select('SELECT name FROM categories WHERE id = ?', [$categoryID])->fetchColumn();
    ?>

    <div class="d-flex justify-content-center py-4">
        <p style="font-weight:700">DANH MỤC: <span><?php echo $name_category; ?></span></p>
    </div>


    <!-- Danh sách bài đăng theo danh mục -->
    <?php foreach ($categoryPosts as $categoryPost) {   ?>
        <div class="row m-auto d-flex">
            <div class="col-4">
                <div class="content-container mb-4">
                    <!-- Tiêu đề -->
                    <div class="post-header">
                        <a href="<?= url('show-post/' . $categoryPost['id']) ?>" class="post-header-link"><?= $categoryPost['title'] ?></a>
                    </div>
                    <div class="image-container">
                        <img class="w-100 zoom-image" src="<?= asset($categoryPost['image']) ?>" alt="<?= $categoryPost['title'] ?>">
                    </div>

                    <div class="text-container post-content">
                        <p class="truncate-text"><?= $categoryPost['summary'] ?></p>
                        <a href="<?= url('show-post/' . $categoryPost['id']) ?>">Đọc tiếp >></a>
                    </div>
                    <div class="date-and-views">
                        <i class="bi bi-calendar"><?= $categoryPost['created_at'] ?></i>
                        &nbsp; &nbsp;<i class="bi bi-eye"><?= $categoryPost['view'] ?></i>
                        &nbsp; &nbsp;<i class="bi bi-chat"></i>
                        <?php
                        // Truy vấn để đếm số lượng comment cho bài đăng
                        $commentCount = $db->select('SELECT COUNT(*) AS comment_count FROM comments WHERE post_id = ?', [$categoryPost['id']])->fetchColumn();
                        ?>
                        <?= $commentCount ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php
require_once(BASE_PATH . '/template/app/layouts/footer.php');
?>