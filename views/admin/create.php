<section class="mt-2">
    <h1 class=" mt-2 text-center">Create new product</h1>
    <form action="/admin/product" method="post" class="needs-validation" novalidate ENCTYPE="multipart/form-data">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="<?= $data['name'] ?? null ?>" name="name" type="text"
                           class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                           id="name">
                    <?php if (isset($errors['name'])): ?>
                        <div class="invalid-feedback">
                            <?= $errors['name'][0] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <select name="brand" id="brand"
                            class="form-control <?= isset($errors['brand']) ? 'is-invalid' : '' ?>">
                        <option value=""></option>
                        <option value="Samsung">Samsung</option>
                        <option value="Apple">Apple</option>
                        <option value="Redmi">Redmi</option>
                        <option value="Xiaomi">Xiaomi</option>
                        <option value="Infinix">Infinix</option>
                        <option value="Tecno">Tecno</option>
                    </select>
                    <?php if (isset($errors['brand'])): ?>
                        <div class="invalid-feedback">
                            <?= $errors['brand'][0] ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input value="<?= $data['price'] ?? null ?>" name="price" type="number"
                           class="form-control <?= isset($errors['price']) ? 'is-invalid' : '' ?>"
                           id="price">
                    <?php if (isset($errors['price'])): ?>
                        <div class="invalid-feedback">
                            <?= $errors['price'][0] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="discount_price" class="form-label">Discount Price</label>
                    <input value="<?= $data['discount_price'] ?? null ?>" name="discount_price" type="number"
                           class="form-control <?= isset($errors['discount_price']) ? 'is-invalid' : '' ?>"
                           id="discount_price">
                    <?php if (isset($errors['discount_price'])): ?>
                        <div class="invalid-feedback">
                            <?= $errors['discount_price'][0] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="img" class="form-label">Image</label>
                    <input value="<?= $data['img'] ?? null ?>" name="img"
                           type="file"
                           class="form-control <?= isset($errors['img']) ? 'is-invalid' : '' ?>"
                           id="img">
                    <?php if (isset($errors['img'])): ?>
                        <div class="invalid-feedback">
                            <?= $errors['img'][0] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="ram" class="form-label">Ram</label>
                    <input value="<?= $data['ram'] ?? null ?>" name="ram"
                           class="form-control <?= isset($errors['ram']) ? 'is-invalid' : '' ?>"
                           id="ram">
                    <?php if (isset($errors['ram'])): ?>
                        <div class="invalid-feedback">
                            <?= $errors['ram'][0] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="storage" class="form-label">Storage</label>
                    <input value="<?= $data['storage'] ?? null ?>" name="storage"
                           class="form-control <?= isset($errors['storage']) ? 'is-invalid' : '' ?>"
                           id="storage">
                    <?php if (isset($errors['storage'])): ?>
                        <div class="invalid-feedback">
                            <?= $errors['storage'][0] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input value="<?= $data['color'] ?? null ?>" name="color"
                           class="form-control <?= isset($errors['color']) ? 'is-invalid' : '' ?>"
                           id="color">
                    <?php if (isset($errors['color'])): ?>
                        <div class="invalid-feedback">
                            <?= $errors['color'][0] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Submit</button>
    </form>
</section>
