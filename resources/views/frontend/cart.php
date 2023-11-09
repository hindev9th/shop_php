<?php $title = 'Giỏ hàng' ?>
<?php require 'resources/views/frontend/layouts/header.php'; ?>
<!--page header start-->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Giỏ hàng</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="/">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Giỏ hàng</p>
        </div>
    </div>
</div>
<!--page header end-->
<?php if (isset($_SESSION['cart']) && count(getCart()) > 0): ?>
<!--cart start-->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                <tr>
                    <th>Tên</th>
                    <th>Loại</th>
                    <th>Màu</th>
                    <th>Giá</th>
                    <th>Giá giảm</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody class="align-middle">
                    <?php foreach (getCart() as $cart): ?>
                    <tr>
                        <td class="align-middle"><img src="<?php asset('images/products/'.$cart['image']); ?>" alt="" style="width: 50px;">
                            <?=$cart['name']?>
                        </td>
                        <td class="align-middle"><?=$cart['type']?></td>
                        <td class="align-middle"><?=$cart['color']?></td>
                        <td class="align-middle"><?=number_format($cart['price'])?>đ</td>
                        <td class="align-middle"><?=number_format($cart['price_discount'])?>đ</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus btn-qty-action">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm bg-secondary text-center" id="input-qty" get-data="/cart/update/<?=$cart['id'].'/'.$cart['type_id'].'/'.$cart['color_id']?>" value="<?=$cart['qty']?>">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus btn-qty-action">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <?php $total = $cart['qty'] * ($cart['price_discount'] > 0? $cart['price_discount'] : $cart['price']); ?>
                        <td class="align-middle"><?=number_format($total)?>đ</td>
                        <td class="align-middle">
                            <a href="/cart/delete/<?=$cart['id'].'/'.$cart['type_id'].'/'.$cart['color_id']?>" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-12">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Tổng phụ</h6>
                        <h6 class="font-weight-medium"><?= number_format(getTotalCart()) ?>đ</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">0đ</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Tổng</h5>
                        <h5 class="font-weight-bold"><?= number_format(getTotalCart()) ?>đ</h5>
                    </div>
                    <a href="/checkout" class="btn btn-block btn-primary my-3 py-3">Tiến hành thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<div class="container-fluid pt-5">
    <div class="row px-xl-5 flex-column justify-content-center align-items-center">
        <h4>Bạn chưa có đơn hàng nào cả</h4>
        <a href="/" class="btn btn-primary">Mua sắm ngay</a>
    </div>
</div>
<?php endif; ?>


<!--cart end-->
<?php require 'resources/views/frontend/layouts/footer.php'; ?>
