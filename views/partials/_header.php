<?php

use app\core\Application; ?>
<header>
    <div id="user-info" class="d-flex justify-content-between bg-light p-1">
        <div class="text-muted">
            Muhammad Nawlo Syria Aleppo +963953211985
        </div>
        <?php if (Application::isGuest()): ?>
            <div class="user-info-login">
                <a href="/login" class="px-3">Login</a>
                <a href="/register" class="px-3">Register</a>
            </div>
        <?php endif; ?>

    </div>

    <!--    start navbar-->
    <?php include_once __DIR__ . '/_nav.php' ?>
    <!--    end navbar-->
</header>
