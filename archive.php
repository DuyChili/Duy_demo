<?php
include "header.php";
if (isset($_GET['cate-id'])):
    $cate_id = $_GET['cate-id'];

    $perPage = 2;
    $page = isset($_GET['page'])?$_GET['page']:1;
    $total = count($a->getAllIteByCate($cate_id));
    $url = $_SERVER['PHP_SELF']."?cate-id=".$cate_id;
?>
<!-- News With Sidebar Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">Category: </h4>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                        </div>
                    </div>

                    <?php 
                    $getItemByCates = $a->getItemByCate($cate_id,$page,$perPage);
                    foreach($getItemByCates as $value):

                    ?>
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="img/<?php echo $value['img'] ?>" style="object-fit: cover;">
                            <div class="bg-white border border-top-0 p-4">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href=""><?php echo $item->HienThiMotCategoryes($value['category'])[0]['name'] ?></a>
                                    <a class="text-body" href=""><small><?php echo $value['created_at'] ?></small></a>
                                </div>
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href=""><?php echo $value['title'] ?></a>
                                <p class="m-0"><?php echo $value['excerpt'] ?>"</p>
                            </div>
                            <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-2" src="img/<?php echo $value['img'] ?>" width="25" height="25" alt="">
                                    <small><?php echo $user->HienThiMotUser($value['author'])[0]['name']?></small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <small class="ml-3"><i class="far fa-eye mr-2"></i><?php echo $value['views'] ?></small>
                                    <small class="ml-3"><i class="far fa-comment mr-2"></i><?php echo $value['featured'] ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                    <div class="col-lg-12 mb-3">
                        <?php echo $a->paginate($url,$total,$perPage) ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                
               <?php include "social-sidebar.php" ?>
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->


<?php
endif;
include "footer.php" ?>