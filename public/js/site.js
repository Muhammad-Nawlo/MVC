$(function () {

//start carousel for header section
    $("main .carousel-header-container .header-carousel").owlCarousel({
        autoplay: true, items: 1
    });
//start carousel for top sale section
    $('main .top-sale-carousel').owlCarousel({
        loop: true, nav: true, dots: false, responsive: {
            0: {
                items: 1
            }, 600: {
                items: 3
            }, 1000: {
                items: 5
            }
        }
    });
//start isotope for top sale section
    var grid = $('.grid').isotope({
        itemSelector: '.grid-item', layoutMode: 'fitRows'
    });
//get filter data
    $('.special-price .filters').on('click', 'button', function () {
        let filter = $(this).data('filter');
        grid.isotope({filter: filter})
    });

    //start carousel for top sale section
    $('main .new-phone-carousel').owlCarousel({
        loop: true, nav: false, dots: false, responsive: {
            0: {
                items: 1
            }, 600: {
                items: 3
            }, 1000: {
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
    $('#ram').selectize({
        delimiter: ',', persist: false, create: function (input) {
            return {
                value: input + "GB RAM", text: input + "GB RAM"
            }
        }
    });
    $('#storage').selectize({
        delimiter: ',', persist: false, create: function (input) {
            return {
                value: input + " GB", text: input + " GB"
            }
        }
    });
    $('#color').selectize({
        delimiter: ',', persist: false, create: function (input) {
            return {
                value: input, text: input
            }
        }
    });

    $('#delete-modal').on('show.bs.modal', function (event) {
        let trigger = event.relatedTarget;
        let id = trigger.getAttribute('data-bs-id')
        $('#confirm-delete').attr('data-id', id);
    });

    $('#delete-modal #confirm-delete').on('click', function () {
        let id = $(this).attr('data-id');
        $.ajax({
            type: "POST", url: '/admin/delete-product', data: {id: id},
            success: function () {
                window.location.reload()
            }
        });
    });


});
