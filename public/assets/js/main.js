(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);


    // Initiate the wowjs - Faster animation
    new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 50,          // Giảm từ 0 xuống 50 để animation trigger sớm hơn
        mobile: true,        // Enable trên mobile
        live: true,
        scrollContainer: null
    }).init();


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }

        // Add scrolled class to navbar
        if ($(this).scrollTop() > 50) {
            $('.navbar-light').addClass('scrolled');
        } else {
            $('.navbar-light').removeClass('scrolled');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonial carousel

    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        center: true,
        dots: true,
        loop: true,
        margin: 50,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });

        $('#videoModal').on('shown.bs.modal', function (e) {
            var $src = $videoSrc;
            if ($src && $src.includes("watch?v=")) {
                $src = $src.replace("watch?v=", "embed/");
            } else if ($src && $src.includes("youtu.be/")) {
                $src = $src.replace("youtu.be/", "youtube.com/embed/");
            }
            if ($src) {
                $("#video").attr('src', $src + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
            }
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });



})(jQuery);

