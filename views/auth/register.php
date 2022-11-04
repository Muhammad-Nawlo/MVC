<section class="mt-5 mx-auto w-50">
    <h1 class="my-5">Register</h1>
    <form action="/register" method="post" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="firstname" class="form-label">First name</label>
                    <input value="<?= $data['firstname'] ?? null ?>" name="firstname" type="text"
                           class="form-control <?= isset($errors['firstname']) ? 'is-invalid' : '' ?>"
                           id="firstname">
                    <?php if (isset($errors['firstname'])): ?>
                        <div class="invalid-feedback">
                            <?= $errors['firstname'][0] ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="lastname" class="form-label">Last name</label>
                    <input value="<?= $data['lastname'] ?? null ?>" name="lastname" type="text"
                           class="form-control <?= isset($errors['lastname']) ? 'is-invalid' : '' ?>"
                           id="lastname">
                    <?php if (isset($errors['lastname'])): ?>
                        <div class="invalid-feedback">
                            <?= $errors['lastname'][0] ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input value="<?= $data['email'] ?? null ?>" name="email" type="email"
                   class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                   id="email"
                   aria-describedby="emailHelp">
            <?php if (isset($errors['email'])): ?>
                <div class="invalid-feedback">
                    <?= $errors['email'][0] ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input value="<?= $data['password'] ?? null ?>" name="password" type="password"
                   class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                   id="password">
            <?php if (isset($errors['password'])): ?>
                <div class="invalid-feedback">
                    <?= $errors['password'][0] ?>
                </div>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>
