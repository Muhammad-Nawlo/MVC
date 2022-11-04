<section class="mt-5 mx-auto w-50">
    <h1 class="my-5">Login</h1>
    <form action="/login" method="post" class="needs-validation" novalidate>
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
