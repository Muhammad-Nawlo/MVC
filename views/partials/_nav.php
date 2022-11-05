<?php

use app\core\Application;

?>
<nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Mobile Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/#top-sales">Top sales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#special-price">Special price</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#new-phones">New phones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#latest-blog">Latest blog</a>
                </li>
            </ul>
            <?php if (!Application::isGuest()): ?>
                <div class="dropdown">
                    <button style="color: white" class="btn dropdown-toggle" type="button" id="main-menu"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                        <?= Application::user()->firstname . ' ' . Application::user()->lastname ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="main-menu">
                        <?php if (Application::user()->is_admin == 1): ?>
                            <li><a class="dropdown-item" href="/admin/products">Manage Product</a></li>
                        <?php endif; ?>
                        <li>
                            <form action="/logout" method="post">
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>

        </div>
    </div>
</nav>
