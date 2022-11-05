<?php
/**
 * @var \app\models\Product $product
 */
?>
<section class="product my-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?= $product['img'] ?>" alt="<?= $product['name'] ?>" class="img-fluid">
                <div class="row mt-2">
                    <div class="col">
                        <button class="btn btn-danger form-control">
                            Proceed to buy
                        </button>
                    </div>
                    <div class="col">
                        <button class="btn btn-warning form-control">
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <h5><?= $product['name'] ?></h5>
                <small>By <?= $product['brand'] ?></small>
                <div class="d-flex">
                    <div class="text-warning me-2">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                    </div>
                    <a href="#">20,531 ratings | 1000+ answered questions</a>
                </div>
                <hr class="m-0">

                <table class="my-3">
                    <tr>
                        <td>M.R.P</td>
                        <td><strike>$153.00</strike></td>
                    </tr>
                    <tr>
                        <td>Deal price:</td>
                        <td class="text-danger">$<?= $product['price'] ?></td>
                    </tr>
                    <tr>
                        <td>You save:</td>
                        <td class="text-danger">$153.00</td>
                    </tr>
                </table>

                <div class="d-flex justify-content-around">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <i class="fas fa-retweet rounded-pill border p-3 text-primary mb-2"></i>
                        <a href="#">
                            10 days replacement
                        </a>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <i class="fas fa-truck rounded-pill border p-3 text-primary mb-2"></i>
                        <a href="#">
                            Daily Tuition Deliverd
                        </a>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <i class="fas fa-check-double rounded-pill border p-3 text-primary mb-2"></i>
                        <a href="#">
                            1 Year
                            Warranty
                        </a>
                    </div>
                </div>
                <hr>
                <div class="more-info">
                    <p class="m-0"> Delivery by : Mar 29 - Apr 1</p>
                    <p class="m-0"> Sold by <a href="#">Daily Electronics </a> (4.5 out of 5 | 18,198 ratings)</p>
                    <p class="m-0"> Delivery by : Mar 29 - Apr 1</p>
                </div>
                <div class="phone-color d-flex align-items-center mt-2">
                    <h6 class="pe-2">Color: </h6>
                    <?php foreach (explode(',', $product['color']) as $c): ?>
                        <div class="rounded-circle mx-1" style="background-color: <?= $c; ?>"></div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-4">
                    <h6>Size:</h6>
                    <div class="d-flex justify-content-between">
                        <?php foreach (explode(',', $product['ram']) as $r): ?>
                            <div class="border px-3 py-2"><?= $r; ?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="mt-4">
                    <h6>Storage:</h6>
                    <div class="d-flex justify-content-between">
                        <?php foreach (explode(',', $product['storage']) as $s): ?>
                            <div class="border px-3 py-2"><?= $s; ?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="d-flex align-items-center mt-4 quantity-container">
                    <h6 class="pe-2">Quantity: </h6>
                    <div class="d-flex justify-content-center align-items-center">
                        <button data-id="prod3" class="p-2 border up-quantity"><i class="fas fa-angle-up"></i>
                        </button>
                        <input data-id="prod3" type="text" class="border p-2 outline-none form-control rounded-0"
                               value="1" readonly>
                        <button data-id="prod3" class="p-2 border down-quantity"><i class="fas fa-angle-down "></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
