<?php
/**
 * @var array $prods
 */
$brands = array_map(function ($p) {
    return $p['brand'];
}, $prods);
$brands = array_unique($brands);
?>
<section class="special-price mt-5" id="special-price">
    <div class="container">
        <h2>Special Price</h2>
        <div class="filters text-end">
            <button data-filter="*" class="btn ">All Brand</button>
            <?php
            foreach ($brands as $b):
                ?>
                <button data-filter=".<?= strtolower($b) ?>" class="btn"><?= $b ?></button>
            <?php
            endforeach;
            ?>
        </div>
        <hr>
        <div class="grid">
            <?php
            foreach ($prods as $p):
                ?>
                <div class="grid-item border <?= strtolower($p['brand']) ?>">
                    <div class="item py-3">
                        <div class="product text-center">
                            <a href="/product?id=<?= $p['id'] ?>"><img src="<?= $p['img'] ?>" alt="<?= $p['name'] ?>"
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
                                $<?= $p['price'] ?>
                            </p>
                            <div class="">
                                <button class="btn btn-warning btn-sm ">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</section>
