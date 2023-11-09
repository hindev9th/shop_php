<?php $title = isset($product) ? $product->getName() : 'Sản phẩm'; ?>
<?php require 'resources/views/frontend/layouts/header.php'; ?>
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3"><?= $product->getName() ?></h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="/">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <?php if (isset($categoryProduct)): ?>
            <p class="m-0"><?=$categoryProduct->getName()?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <?php foreach ($product->getImage() as $key => $item): ?>
                        <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                            <img class="w-100 h-100" src="<?php asset('images/products/' . $item); ?>" alt="Image">
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold"><?= $product->getName() ?></h3>
            <span class="text-muted">Thương hiệu: <?=$brandProduct->getName()?></span>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(50 Reviews)</small>
            </div>
            <div class="price d-flex flex-wrap">
                <h3 class="font-weight-semi-bold mb-4"><?= number_format($product->getPriceDiscount()) ?>đ</h3>
                <h3 class="font-weight-semi-bold mb-4 ml-2 text-muted">
                    <del><?= number_format($product->getPrice()) ?>đ</del>
                </h3>
            </div>

            <div class="d-flex mb-3">
                <p class="text-dark font-weight-medium mb-0 mr-3">Loại:</p>
                <form>
                    <?php foreach (($types ?? null) as $type): ?>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input option-type" id="type-<?= $type->getId() ?>"
                                   name="type" <?= $type->getId() == $product->getTypeId() ? 'checked' : '' ?>
                                   value="<?= $type->getId() ?>">
                            <label class="custom-control-label"
                                   for="type-<?= $type->getId() ?>"><?= $type->getName() ?></label>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>
            <div class="d-flex mb-4">
                <p class="text-dark font-weight-medium mb-0 mr-3">Màu:</p>
                <form>
                    <?php foreach (($colors ?? null) as $color): ?>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input option-color"
                                   id="color-<?= $color->getId() ?>"
                                   name="color" <?= $color->getId() == $product->getColorId() ? 'checked' : '' ?>
                                   value="<?= $color->getId() ?>">
                            <label class="custom-control-label"
                                   for="color-<?= $color->getId() ?>"><?= $color->getName() ?></label>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>
            <div class="d-flex align-items-center mb-4 pt-2">
                <div class="input-group quantity mr-3" style="width: 130px;">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-minus">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control bg-secondary text-center" id="input-qty" value="1">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-plus">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <button id="btn-add-to-cart" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add
                    To Cart
                </button>
            </div>
            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Thông tin</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Đánh giá (0)</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <h4 class="mb-3">Mô tả</h4>
                    <?=$product->getDescription()?>
                </div>
                <div class="tab-pane fade" id="tab-pane-2">
                    <h4 class="mb-3">Thông tin</h4>
                    <?=$product->getInformation()?>
                </div>
                <div class="tab-pane fade" id="tab-pane-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
                            <div class="media mb-4">
                                <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                    <div class="text-primary mb-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no
                                        at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-4">Leave a review</h4>
                            <small>Your email address will not be published. Required fields are marked *</small>
                            <div class="d-flex my-3">
                                <p class="mb-0 mr-2">Your Rating * :</p>
                                <div class="text-primary">
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="message">Your Review *</label>
                                    <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Your Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Your Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const btnAddCart = document.getElementById('btn-add-to-cart');
    const qty = document.getElementById('input-qty');
    const optionType = document.querySelectorAll('.option-type');
    btnAddCart.onclick = (e) => {
        e.preventDefault();
        const colorId = document.querySelector('.option-color:checked').value;
        const typeId = document.querySelector('.option-type:checked').value;
        window.location = `/cart/add/<?= $product->getId()?>/${typeId}/${colorId}/${qty.value}`;
    }

    for (let i = optionType.length; i--;) {
        optionType[i].onclick = () => {
            const colorId = document.querySelector('.option-color:checked').value;
            const typeId = document.querySelector('.option-type:checked').value;
            console.log(colorId + '-' + typeId)
            window.location = `/product/<?= $product->getId()?>/${typeId}/${colorId}/${qty.value}`
        }

    }


</script>
<!-- Shop Detail End -->
<?php require 'resources/views/frontend/layouts/footer.php'; ?>
