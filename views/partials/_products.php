<?php
/**
 * @var $products Query
 */
$id = $_GET['id'];
$product = $products->getData("item_id=" . $id);
?>
<section class="product my-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?= $product['item_image'] ?>" alt="<?= $product['item_name'] ?>" class="img-fluid">
                <div class="row">
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
                <h5><?= $product['item_name'] ?></h5>
                <small>By <?= $product['item_brand'] ?></small>
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
                        <td class="text-danger">$<?= $product['item_price'] ?></td>
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
                    <div class="rounded-circle bg-primary mx-1"></div>
                    <div class="rounded-circle bg-secondary mx-1"></div>
                    <div class="rounded-circle bg-warning mx-1"></div>
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
                <div class="mt-4">
                    <h6>Size:</h6>
                    <div class="d-flex justify-content-between">
                        <div class="border px-3 py-2">4GB RAM</div>
                        <div class="border px-3 py-2">6GB RAM</div>
                        <div class="border px-3 py-2">8GB RAM</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
