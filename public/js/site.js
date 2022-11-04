$(function () {

//start carousel for header section
    $("main .carousel-header-container .header-carousel").owlCarousel({
        autoplay: true,
        items: 1
    });
//start carousel for top sale section
    $('main .top-sale-carousel').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });
//start isotope for top sale section
    var grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
    });
//get filter data
    $('.special-price .filters').on('click', 'button', function () {
        let filter = $(this).data('filter');
        grid.isotope({filter: filter})
    });

    //start carousel for top sale section
    $('main .new-phone-carousel').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

//    inc/dec quantity
    $('.quantity-container .up-quantity').on('click', function () {
        let dataAttr = $(this).data('id');
        let quantity = $('input[data-id=' + dataAttr + ']')
        quantity.val(function (i, oldValue) {
            return ++oldValue;
        })
    });

    $('.quantity-container .down-quantity').on('click', function () {
        let dataAttr = $(this).data('id');
        let quantity = $('input[data-id=' + dataAttr + ']')
        quantity.val(function (i, oldValue) {
            return Number(oldValue) === 1 ? 1 : --oldValue;
        })
    });


});
