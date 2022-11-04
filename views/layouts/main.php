<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--  font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!--    bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--    owl carousel-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
          integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
          integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="<?= \app\core\Application::config('asset_url')?>css/site.css">

    <!--   custom style-->
    <title>Mobile Shop</title>
</head>
<body>

<!--start header-->
<?php include_once __DIR__.'/../partials/_header.php' ?>
<!--end header-->

<!--start main-->
<main>
    <?php \app\core\session\Session::flash(); ?>
    {{content}}
</main>
<!--end main-->

<!--start footer-->
<footer class="p-4 bg-dark text-light mt-5">
    <div class="footer row ">
        <div class="col-3">
            <h4> Mobile Shop</h4>
            <p class="text-muted"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus, deserunt.</p>
        </div>
        <div class="col-3">
            <h4> Newslatter</h4>
            <form action="" class="row">
                <div class="col-8 p-1">
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="col-3 p-1">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-3">
            <h4 class="font-rubik font-size-20">Information</h4>
            <div class="d-flex flex-column flex-wrap">
                <a href="#" class="font-rale font-size-14 text-white-50 pb-1">About Us</a>
                <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Delivery Information</a>
                <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Privacy Policy</a>
                <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Terms &amp; Conditions</a>
            </div>
        </div>
        <div class="col-3">
            <h4 class="font-rubik font-size-20">Account</h4>
            <div class="d-flex flex-column flex-wrap">
                <a href="#" class="font-rale font-size-14 text-white-50 pb-1">My Account</a>
                <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Order History</a>
                <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Wish List</a>
                <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Newslatters</a>
            </div>
        </div>
    </div>
    <div class="text-center text-muted pb-2 pt-5">
        © Copyrights 2022. Designed By <a class="mail:nawlomuhammadit@gmail.com">Muhammad Nawlo</a>
    </div>
</footer>
<!--end footer-->

<!--jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<!--Owl carousel-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--isotope-->
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script src="<?= \app\core\Application::config('asset_url')?>js/site.js"></script>


</body>
</html>
