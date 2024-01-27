<?php

use App\Libraries\Pagination;
use App\Models\Topic;

$total = Topic::where('status', '=', 1)->count();
$limit = 3;
$page = Pagination::pageCurrent();
$offset = Pagination::pageOffset($page, $limit);

$list_topic = Topic::where('status', '=', 1)
    ->orderBy('created_at', 'DESC')
    ->skip($offset)
    ->limit($limit)
    ->get();

?>

<section class="hdl-lastpost bg-main mt-3 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3>BÀI VIẾT MỚI</h3>
                <div class="row">
                    <div class="col-md-6">
                        <a href="post_detail.html">
                            <img class="img-fluid" src="public/images/post/post-3.jpg" />
                        </a>
                        <h3 class="post-title fs-4 py-2">
                            <a href="post_detail.html">
                                Lễ hội Đường sách Tết sẽ có lì xì sách
                            </a>
                        </h3>
                        <p>Tiếp nối thành công sau 13 năm tổ chức, Lễ hội Đường sách tết Giáp Thìn năm 2024 tại TP.HCM với chủ đề 'Xuân yêu thương - Tết sum vầy' sẽ có 52 hoạt động, trong đó có nhiều chương trình chưa từng có..</p>
                    </div>
                    <div class="col-md-6">
                        <?php foreach ($list_topic as $topic) : ?>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <a href="post_detail.html">
                                        <img class="img-fluid" src="public/images/post/<?= $topic->image; ?>" />
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <h3 class="post-title fs-5">
                                        <a href="index.php?opt=post&slug=<?= $topic->slug ?>">
                                            <?= $topic->name; ?>
                                        </a>
                                    </h3>
                                    <p><?= word_limit($topic->description, 10); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>