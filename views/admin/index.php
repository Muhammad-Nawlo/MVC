<?php
/**
 * @var array $prods
 */
?>
<section class="mt-2">
    <h1 class="text-center text-bold">Products</h1>
    <a href="/admin/product" class="btn color-second-bg text-white mb-2">Create new product <i
                class="bi bi-plus"></i></a>
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Brand</th>
                <th scope="col">Price</th>
                <th scope="col">Ram</th>
                <th scope="col">Color</th>
                <th scope="col">Storage</th>
                <th scope="col">Manage</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($prods as $prod): ?>
                <tr>
                    <th scope="col"><?= $prod['id'] ?></th>
                    <th scope="col"><?= $prod['name'] ?></th>
                    <th scope="col"><?= $prod['brand'] ?></th>
                    <th scope="col">$<?= $prod['price'] ?></th>
                    <th scope="col">
                        <?php foreach (explode(',', $prod['ram']) as $r): ?>
                            <span class="d-block">
                                <?= $r ?>
                            </span>
                        <?php endforeach; ?>
                    </th>
                    <th scope="col">
                        <?php foreach (explode(',', $prod['color']) as $c): ?>
                            <span class="product-color" style="background:<?= $c ?>"></span>
                        <?php endforeach; ?>
                    </th>
                    <th scope="col">
                        <?php foreach (explode(',', $prod['storage']) as $s): ?>
                            <span class="d-block">
                                <?= $s ?>
                            </span>
                        <?php endforeach; ?>
                    </th>
                    <th scope="col">
                        <div class="d-flex">
                            <a class="btn btn-success me-3" href="/admin/update-product?id=<?= $prod['id'] ?>">Update</a>
                            <form action="/admin/delete-product" method="post">
                                <input type="hidden" name="id" value="<?= $prod['id']; ?>">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-id="<?= $prod['id']; ?>"
                                        data-bs-target="#delete-modal">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="delete-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure to delete this product.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirm-delete">Ok</button>
            </div>
        </div>
    </div>
</div>