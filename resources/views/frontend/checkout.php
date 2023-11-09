<?php $title = 'Thanh toán' ?>
<?php require 'resources/views/frontend/layouts/header.php'; ?>
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Thanh toán</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Thanh toán</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

<?php if (isset($_SESSION['cart']) && count(getCart()) > 0): ?>
    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <form action="/checkout/in" method="post">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Thông tin</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Họ</label>
                            <input class="form-control" type="text" name="firstname" required placeholder="Họ" value="<?=auth()->getFirstname()?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Tên</label>
                            <input class="form-control" type="text" name="lastname" required placeholder="Tên" value="<?=auth()->getLastname()?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="email" name="email" placeholder="example@email.com" value="<?=auth()->getEmail()?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="number" name="phone" required placeholder="+123 456 789" value="<?=auth()->getPhone()?>">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control" type="text" name="address" required placeholder="54 Mỹ đình , Hà nội">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Ghi chú</label>
                            <textarea class="form-control" type="text" name="note" placeholder="Ghi chú"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Tổng đơn hàng</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Sản phẩm</h5>
                        <?php foreach (getCart() as $cart): ?>
                        <?php $price = $cart['price_discount'] > 0 ? number_format($cart['price_discount']) : number_format($cart['price']) ?>
                        <?php $sum = $cart['qty'] * ($cart['price_discount'] > 0 ? $cart['price_discount'] : $cart['price']) ?>
                            <div class="d-flex justify-content-between">
                                <p><?=$cart['name'].'-'.$cart['type'].'-'.$cart['color'].'-'.$price?>đ</p>
                                <p>&times;</p>
                                <p><?=$cart['qty']?></p>
                                <p><?=number_format($sum)?>đ</p>
                            </div>
                        <?php endforeach; ?>
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Tổng phụ</h6>
                            <h6 class="font-weight-medium"><?= number_format(getTotalCart()) ?>đ</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Phí vận chuyển</h6>
                            <h6 class="font-weight-medium">0đ</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng</h5>
                            <h5 class="font-weight-bold"><?= number_format(getTotalCart()) ?>đ</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Kiểu thanh toán</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" checked name="payment"
                                       id="directcheck">
                                <label class="custom-control-label" for="directcheck">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
<?php else: ?>
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 flex-column justify-content-center align-items-center">
            <h4>Bạn chưa có đơn hàng nào cả</h4>
            <a href="/" class="btn btn-primary">Mua sắm ngay</a>
        </div>
    </div>
<?php endif; ?>
    <!-- Checkout End -->
<?php require 'resources/views/frontend/layouts/footer.php'; ?>