<?php
/**
 * @var array $prods
 */
?>
<section class="top-sale mt-5" id="top-sales">
    <div class="container">
        <h2>Top sale</h2>
        <hr>
        <div class="top-sale-carousel owl-carousel owl-theme">
            <?php
            foreach ($prods as $p):
                ?>
                <div class="item">
                    <div class="product text-center">
                        <a href="product.php?id=<?= $p['id'] ?>"><img src="<?= $p['img'] ?>"
                                                                           alt="<?= $p['name'] ?>"
                                                                           class="img-fluid"></a>
                        <h6><?= $p['name'] ?></h6>
                        <div class="text-center text-warning">
                            <span><i class="fas fa-star fa-sm"></i></span>
                            <span><i class="fas fa-star fa-sm"></i></span>
                            <span><i class="fas fa-star fa-sm"></i></span>
                            <span><i class="far fa-star fa-sm"></i></span>
                            <span><i class="far fa-star fa-sm"></i></span>
                        </div>
                        <p class="">
                            <?= $p['price'] ?>
                        </p>
                        <div class="">
                            <button class="btn btn-warning btn-sm ">Add To Cart</button>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</section>
