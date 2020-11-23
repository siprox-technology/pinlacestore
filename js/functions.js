//PAGE LOADER
$(window).on("load", function () {
    "use strict";
    $(".loader").fadeOut(800);
    $('.side-menu').removeClass('opacity-0');
});


jQuery($ => {
    "use strict";
    let $window = $(window);
    let body = $("body");
    let $root = $("html, body");
    $('[data-toggle="tooltip"]').tooltip();

    //contact us
    $("#submit_btn1 , #submit_btn").on('click', function () {
        let userName = $('#name1').val();
        let userEmail = $('#email1').val();
        let userMessage = $('#message1').val();
        let result;
        if (this.id === 'submit_btn') {
            result = $('#result');
            userMessage = $('#companyName').val();
            userName = $('#userName').val();
            userEmail = $('#email').val();
        } else {
            result = $('#result1');
        }
        //simple validation at client's end
        let postData, output;
        let proceed = true;
        if (userName === "") {
            proceed = false;
        }
        if (userEmail === "") {
            proceed = false;
        }
        if (userMessage === "") {
            proceed = false;
        }
        //everything looks good! proceed...
        if (proceed) {

            //data to be sent to server
            postData = {
                'userName': userName,
                'userEmail': userEmail,
                'userMessage': userMessage
            };

            //Ajax post data to server
            $.post('contact.php', postData, function (response) {
                //load json data from server and output message
                if (response.type === 'error') {
                    output = '<div class="alert-danger" style="padding:10px; margin-bottom:25px;">' + response.text + '</div>';
                } else {
                    output = '<div class="alert-success" style="padding:10px; margin-bottom:25px;">' + response.text + '</div>';
                    //reset values in all input fields
                    $('.getin_form input').val('');
                    $('.getin_form textarea').val('');

                }

                result.slideUp("fast").html(output).slideDown();
            }, 'json');

        } else {
            output = '<div class="alert-danger" style="padding:10px; margin-bottom:25px;">Please provide the missing fields.</div>';
            result.slideUp("fast").html(output).slideDown();
        }

    });
    /*rating stars*/
    let fadeInStar = () => {
        let starItem = $('#rattingIcon .fa-star.fas');
        starItem.addClass('scale-star');
        setTimeout(function () {
            starItem.removeClass('scale-star');
        }, 180);
    }
    let ratingText = $('#ratingText');

    let fadeInStarText = n => {
        ratingText.addClass('scale-price');
        setTimeout(function () {
            ratingText.removeClass('scale-price');
            switch (n) {
                case 0:
                    ratingText.text('Poor');
                    break;
                case 1:
                    ratingText.text('Average');
                    break;
                case 2:
                    ratingText.text('Good');
                    break;
                case 3:
                    ratingText.text('Very Good');
                    break;
                case 4:
                    ratingText.text('Excellent');
            }
        }, 180);
    }

    $("#rattingIcon .fa-star").on('click', function () {
        let iconIndex = $(this).index();
        $(this).addClass("fas").removeClass("far");
        $(this).prevAll().addClass("fas").removeClass("far");
        $(this).nextAll().addClass("far").removeClass("fas");
        fadeInStar();
        fadeInStarText(iconIndex);
    });


    /* ----- Back to Top ----- */
    $(body).append('<a href="#" class="back-top"><i class="fa fa-angle-up"></i></a>');
    let amountScrolled = 700;
    let backBtn = $("a.back-top");
    $window.on("scroll", function () {
        if ($window.scrollTop() > amountScrolled) {
            backBtn.addClass("back-top-visible");
        } else {
            backBtn.removeClass("back-top-visible");
        }
    });
    backBtn.on("click", function () {
        $root.animate({
            scrollTop: 0
        }, 700);
        return false;
    });

    /* ------- Smooth scroll ------- */
    $("a.pagescroll").on("click", function (event) {
        event.preventDefault();
        let action = $(this.hash).offset().top;
        if ($(this).hasClass('scrollupto')) {
            action -= 45;
        }
        $("html,body").animate({
            scrollTop: action
        }, 1200);
    });

    /* ------- navbar menu Position dynamically ------- */
    $(".dropdown").on("mouseenter", function () {
        let $elem = $(this).find('.dropdown-menu'),
            left = $elem.offset().left,
            width = $elem.width(),
            docW = $(window).width();

        if ((left + width) > docW) {
            $elem.addClass("right-show");
        } else if ((left + (width * 2)) < docW) {
            $elem.removeClass("right-show");
        }
    });

    /*------ Sticky MENU Fixed ------*/
    let headerHeight = $("header").outerHeight();
    let navbar = $("nav.navbar");
    if (navbar.not('.fixed-bottom').hasClass("static-nav")) {
        $window.scroll(function () {
            let $scroll = $window.scrollTop();
            let $navbar = $(".static-nav");
            let nextSection = $(".section-nav-smooth");
            if ($scroll > 250) {
                $navbar.addClass("fixedmenu");
                nextSection.css("margin-top", headerHeight);
            } else {
                $navbar.removeClass("fixedmenu");
                nextSection.css("margin-top", 0);
            }
            if ($scroll > 125) {
                $('.header-with-topbar nav').addClass('mt-0');
            } else {
                $('.header-with-topbar nav').removeClass('mt-0');
            }
        });
        $(function () {
            if ($window.scrollTop() >= $(window).height()) {
                $(".static-nav").addClass('fixedmenu');
            }
        })
    }
    if (navbar.hasClass("fixed-bottom")) {
        let navTopMargin = $(".fixed-bottom").offset().top;
        let scrollTop = $window.scrollTop();
        $(window).scroll(function () {
            if ($(window).scrollTop() > navTopMargin) {
                $('.fixed-bottom').addClass('fixedmenu');
            } else {
                $('.fixed-bottom').removeClass('fixedmenu');
            }
            if ($(window).scrollTop() < 260) {
                $('.fixed-bottom').addClass('menu-top');
            } else {
                $('.fixed-bottom').removeClass('menu-top');
            }
        });
        $(function () {
            if (scrollTop < 230) {
                $('.fixed-bottom').addClass('menu-top');
            } else {
                $('.fixed-bottom').removeClass('menu-top');
            }
            if (scrollTop >= $(window).height()) {
                $('.fixed-bottom').addClass('fixedmenu');
            }
        })
    }

    /*Menu Onclick*/
    let sideMenuToggle = $("#sidemenu_toggle");
    let sideMenu = $(".side-menu");
    if (sideMenuToggle.length) {
        sideMenuToggle.on("click", function () {
            $("body").addClass("overflow-hidden");
            sideMenu.addClass("side-menu-active");
            $(function () {
                setTimeout(function () {
                    $("#close_side_menu").fadeIn(300);
                }, 300);
            });
        });
        $("#close_side_menu , #btn_sideNavClose , .side-nav .nav-link.pagescroll").on("click", function () {
            $("body").removeClass("overflow-hidden");
            sideMenu.removeClass("side-menu-active");
            $("#close_side_menu").fadeOut(200);
            $(() => {
                setTimeout(() => {
                    $('.sideNavPages').removeClass('show');
                    $('.fas').removeClass('rotate-180');
                }, 400);
            });
        });
        $(document).keyup(e => {
            if (e.keyCode === 27) { // escape key maps to keycode `27`
                if (sideMenu.hasClass("side-menu-active")) {
                    $("body").removeClass("overflow-hidden");
                    sideMenu.removeClass("side-menu-active");
                    $("#close_side_menu").fadeOut(200);
                    $tooltip.tooltipster('close');
                    $(() => {
                        setTimeout(() => {
                            $('.sideNavPages').removeClass('show');
                            $('.fas').removeClass('rotate-180');
                        }, 400);
                    });
                }
            }
        });
    }

    /*
     * Side menu collapse opener
     * */
    $(".collapsePagesSideMenu").on('click', function () {
        $(this).children().toggleClass("rotate-180");
    });


    /* ----- Full Screen ----- */
    let resizebanner = () => {
        let $fullscreen = $(".full-screen");
        $fullscreen.css("height", $window.height());
        $fullscreen.css("width", $window.width());
    }
    resizebanner();
    $window.resize(function () {
        resizebanner();
    });

    $('.progress').each(function () {
        $(this).appear(function () {
            $(this).animate({
                opacity: 1,
                left: "0px"
            }, 500);
            let b = jQuery(this).find(".progress-bar").attr("data-value");
            $(this).find(".progress-bar").animate({
                width: b + "%"
            }, 500);
        });
    });

    /*----- shop detail Tabs init -----*/
    $(function () {
        initTabsToAccordion();
    });

    function initTabsToAccordion() {
        var animSpeed = 500;
        var win = $(window);
        var isAccordionMode = true;
        var tabWrap = $(".tab-to-accordion");
        var tabContainer = tabWrap.find(".tab-container");
        var tabItem = tabContainer.children("div[id]");
        var tabsetList = tabWrap.find(".tabset-list");
        var tabsetLi = tabsetList.find("li");
        var tabsetItem = tabsetList.find("a");
        var activeId = tabsetList
            .find(".active")
            .children()
            .attr("href");
        cloneTabsToAccordion();
        accordionMode();
        tabsToggle();
        hashToggle();
        win.on("resize orientationchange", accordionMode);

        function cloneTabsToAccordion() {
            $(tabsetItem).each(function () {
                var $this = $(this);
                var activeClass = $this.parent().hasClass("active");
                var listItem = $this.attr("href");
                var listTab = $(listItem);
                if (activeClass) {
                    var activeClassId = listItem;
                    listTab.show();
                }
                var itemContent = $this.clone();
                var itemTab = $this.attr("href");
                if (activeClassId) {
                    itemContent
                        .insertBefore(itemTab)
                        .wrap('<div class="accordion-item active"></div>');
                } else {
                    itemContent
                        .insertBefore(itemTab)
                        .wrap('<div class="accordion-item"></div>');
                }
            });
        }

        function accordionMode() {
            var liWidth = Math.round(tabsetLi.outerWidth());
            var liCount = tabsetLi.length;
            var allLiWidth = liWidth * liCount;
            var tabsetListWidth = tabsetList.outerWidth();
            if (tabsetListWidth <= allLiWidth) {
                isAccordionMode = true;
                tabWrap.addClass("accordion-mod");
            } else {
                isAccordionMode = false;
                tabWrap.removeClass("accordion-mod");
            }
        }

        function tabsToggle() {
            tabItem.hide();
            $(activeId).show();
            $(tabWrap).on("click", 'a[href^="#tab"]', function (e) {
                e.preventDefault();
                var $this = $(this);
                var activeId = $this.attr("href");
                var activeTabSlide = $(activeId);
                var activeOpener = tabWrap.find('a[href="' + activeId + '"]');
                $('a[href^="#tab"]')
                    .parent()
                    .removeClass("active");
                activeOpener.parent().addClass("active");
                if (isAccordionMode) {
                    tabItem.stop().slideUp(animSpeed);
                    activeTabSlide.stop().slideDown(animSpeed);
                } else {
                    tabItem.hide();
                    activeTabSlide.show();
                }
            });
        }

        function hashToggle() {
            var hash = location.hash;
            var activeId = hash;
            var activeTabSlide = $(activeId);
            var activeOpener = tabWrap.find('a[href="' + activeId + '"]');
            if ($(hash).length > 0) {
                $('a[href^="#tab"]')
                    .parent()
                    .removeClass("active");
                activeOpener.parent().addClass("active");
                tabItem.hide();
                activeTabSlide.show();
                win
                    .scrollTop(activeTabSlide.offset().top)
                    .scrollLeft(activeTabSlide.offset().left);
            }
        }
    }
    /* =====================================
             Particles Index
      ====================================== */

    if ($("#particles-js").length) {
        particlesJS('particles-js', {
            "particles": {
                "number": {
                    "value": 100,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    },
                    "image": {
                        "src": "img/github.svg",
                        "width": 100,
                        "height": 100
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 5,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": false,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 2,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "bounce",
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "grab"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "bubble"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 150,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 150,
                        "size": 12,
                        "duration": 0.2,
                        "opacity": 0.6,
                        "speed": 10
                    },
                    "repulse": {
                        "distance": 150
                    },
                    "push": {
                        "particles_nb": 1
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true,
        });
    }

    /* =====================================
             Text Rotating in Particles
      ====================================== */
    let morphRotatingText = $("#morph-text");
    if (morphRotatingText.length) {
        morphRotatingText.Morphext({
            // The [in] animation type. Refer to Animate.css for a list of available animations.
            animation: "flipInX",
            // An array of phrases to rotate are created based on this separator. Change it if you wish to separate the phrases differently (e.g. So Simple | Very Doge | Much Wow | Such Cool).
            separator: ",",
            // The delay between the changing of each phrase in milliseconds.
            speed: 3500,
            complete: function () {
                // Called after the entrance animation is executed.
            }
        });
    }

    /* =====================================
     Parallax And responsive plugins initialize
      ====================================== */
    let $tooltip = $('.tooltip');
    $(() => {
        $tooltip.tooltipster({
            plugins: ['follower'],
            anchor: 'bottom-right',
            offset: [0, 0],
            animation: 'fade',
            content: 'Click Here To Close or Press ESC!',
            delay: 20,
            theme: 'tooltipster-light',
            repositionOnScroll: true,
            // change the content of tooltip in all pages
            // functionBefore: function (instance, helper) {
            //     instance.content('Click Here To Close or Press ESC!');
            // }
        });
    });
    /*Wow Animations*/
    if ($(".wow").length && $(window).outerWidth() >= 567) {
        let wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: false,
            live: true
        });
        wow.init();
    }
    if ($(window).width() > 992) {

        $(".parallax").parallaxie({
            //speed value btw (-1 to 1)
            speed: 0.55,
            offset: 0,
        });
        $(".parallax.parallax-slow").parallaxie({
            speed: 0.31,
        });
    } else if ($(window).width() < 576) {
        $('#pagepiling #submit_btn').on('click', function () {
            $('#pagepiling #result').remove();
        });
        $('#pagepiling .para-opacity').addClass('opacity-5');
    } else {
        $('#pagepiling .para-opacity').removeClass('opacity-5');
    }
    $(window).resize(function () {
        if ($(window).width() < 576) {
            $('#pagepiling .para-opacity').addClass('opacity-5');
        } else {
            $('#pagepiling .para-opacity').removeClass('opacity-5');
        }
    });

    /* =====================================
                 Pricing duration toggle
          ====================================== */

    $('.Pricing-toggle-button').on('click', function () {
        var opt = true;
        if ($(this).hasClass('month')) {
            opt = false;
        }
        if (!$(this).hasClass('active')) {
            $('.pricing-price .pricing-currency').each(function () {
                let priceWithDollar = $(this).text();
                let price = priceWithDollar.substring(1, priceWithDollar.length);
                var discountOffer = 9;
                if (opt) {
                    price *= discountOffer;
                } else {
                    price /= discountOffer;
                }
                price = price.toFixed(2);
                let priceF = '$' + price;
                fadeInPrice($(this), priceF);
            });
            $('.pricing-price .pricing-duration').each(function () {
                if (opt) {
                    $(this).text("year");
                } else {
                    $(this).text("month");
                }

            });
            $(this).addClass('active').siblings().removeClass('active');
        }
    });

    let fadeInPrice = (thisItem, priceText) => {
        let pricingItem = $('.pricing-price');
        pricingItem.addClass('scale-price');
        setTimeout(function () {
            thisItem.text(priceText);
            pricingItem.removeClass('scale-price');
        }, 200);
    }

    $('.pricing-item').on('mouseenter', function () {
        $('.pricing-item').removeClass('active');
        $(this).addClass('active');
    }).on('mouseleave', function () {
        $('.pricing-item').removeClass('active');
        $('.pricing-item.selected').addClass('active');
    });


    /* =====================================
             Fancy Box Image viewer
      ====================================== */
    $('[data-fancybox]').fancybox({
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'speedIn': 600,
        'speedOut': 200,
        buttons: [
            'slideShow',
            'fullScreen',
            'thumbs',
            'share',
            // 'download',
            'zoom',
            'close'
        ],
    });


    /* ------ OWL Slider ------ */
    /*Partners / LOgo*/
    $("#partners-slider").owlCarousel({
        items: 5,
        autoplay: 1500,
        smartSpeed: 1500,
        autoplayHoverPause: true,
        slideBy: 1,
        loop: true,
        margin: 30,
        dots: false,
        nav: false,
        responsive: {
            1200: {
                items: 5,
            },
            991: {
                items: 4,
            },
            767: {
                items: 3,
            },
            480: {
                items: 2,
            },
            0: {
                items: 1,
            },
        }
    });

    /*Testimonials*/
    $("#testimonial-slider").owlCarousel({
        items: 1,
        autoplay: false,
        autoplayHoverPause: true,
        mouseDrag: false,
        loop: true,
        margin: 30,
        animateIn: "fadeIn",
        animateOut: "fadeOut",
        dots: false,
        nav: true,
        navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
        responsive: {
            980: {
                items: 1,
            },
            600: {
                items: 1,
            },
            320: {
                items: 1,
            },
        }
    });
    //gallery detail slider
    $("#product-gallary-details").owlCarousel({
        items: 1,
        autoplay: false,
        mouseDrag: true,
        loop: true,
        margin: 0,
        dots: false,
        nav: true,
        responsive: {
            980: {
                items: 1,
            },
            600: {
                items: 1,
            },
            320: {
                items: 1,
            },
        }
    });
    //main slider in pages
    $("#testimonial-main-slider").owlCarousel({
        items: 3,
        autoplay: 2500,
        autoplayHoverPause: true,
        loop: true,
        margin: 0,
        dots: true,
        nav: false,
        responsive: {
            1280: {
                items: 3,
            },
            980: {
                items: 3,
            },
            600: {
                items: 2,
            },
            320: {
                items: 1,
            },
        }
    });

    //main slider in pages
    $("#price-slider").owlCarousel({
        items: 3,
        autoplay: false,
        loop: false,
        margin: 0,
        padding: 0,
        dots: true,
        nav: false,
        responsive: {
            1280: {
                items: 3,
            },
            980: {
                items: 3,
            },
            600: {
                items: 2,
            },
            0: {
                items: 1,
            },
        }
    });
    /* contact pref slider */
    $("#contact-pref-slider").owlCarousel({
        items: 3,
        autoplay: false,
        loop: false,
        margin: 0,
        padding: 0,
        dots: true,
        nav: false,
        responsive: {
            1280: {
                items: 3,
            },
            980: {
                items: 3,
            },
            600: {
                items: 2,
            },
            0: {
                items: 1,
            },
        }
    });


    /*Our Team*/
    $("#ourteam-slider").owlCarousel({
        items: 4,
        margin: 0,
        dots: false,
        nav: false,
        responsive: {
            1280: {
                items: 4,
            },
            768: {
                items: 3,
            },
            520: {
                items: 2,
            },
            0: {
                items: 1,
            },
        }
    });

    //App Slider

    $("#app-slider").owlCarousel({
        items: 1,
        loop: true,
        dots: false,
        nav: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        autoplay: false,
        autoplayTimeout: 5000,
        // mouseDrag:false,
        responsive: {
            1280: {
                items: 1,
            },
            600: {
                items: 1,
            },
            320: {
                items: 1,
            },
        }
    });
    $('.app-slider-lock-btn').on('click', function () {
        $('.app-slider-lock').fadeToggle(600);
    });

    /*Services Box Slider*/
    $("#services-slider").owlCarousel({
        autoplay: false,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        smartSpeed: 1200,
        loop: true,
        nav: false,
        navText: false,
        dots: false,
        mouseDrag: true,
        touchDrag: true,
        center: true,
        responsive: {
            0: {
                items: 1
            },
            640: {
                items: 3
            }
        }
    });
    //service detail
    $("#service-detail").owlCarousel({
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        smartSpeed: 1200,
        loop: true,
        nav: false,
        dots: false,
        mouseDrag: true,
        touchDrag: true,
        margin: 15,
        responsive: {
            0: {
                items: 1,
            },
            640: {
                items: 2,
            }
        }
    });
    var owl6 = $('.owl-blog-item');
    owl6.owlCarousel({
        loop: true,
        dots: false,
        items: 1,
        nav: true,
        navText: ["<i class='fas fa-long-arrow-alt-left'></i>", "<i class='fas fa-long-arrow-alt-right'></i>"]
    });
    //shop detail dual carousel
    let syncCont = $("#shop-dual-carousel");
    let syncCarousel = $("#syncCarousel.owl-carousel");

    if (syncCont) {
        syncCont.append('<div class="owl-carousel carousel-shop-detail-inner owl-theme" id="syncChild"></div>');
        let arrTotal = syncCarousel.find('.item').length - 1;
        let item = '';
        let syncChild = $("#syncChild");
        for (let i = 0; i <= arrTotal; i++) {
            item = syncCarousel.find('.item').eq(i).find('img').attr('src');
            syncChild.append('<!-- Item ' + (i + 1) + '--><div class="item"><img src="' + item + '" alt=""></div>');
        }
    }


    let syncChild = $("#syncChild.owl-carousel");

    syncCarousel.owlCarousel({
        singleItem: true,
        items: 1,
        dots: false,
        slideSpeed: 1000,
        mouseDrag: false,
        nav: true,
        pagination: false,
        afterAction: syncPosition(),
        responsiveRefreshRate: 200,
    });

    syncChild.owlCarousel({
        items: 4,
        pagination: false,
        margin: 0,
        dots: false,
        afterAction: syncPosition(),
    });

    function syncPosition() {
        setTimeout(function () {
            syncChild.find(".owl-item").first().addClass("synced");
        }, 300);
    }

    // Sync nav
    syncCarousel.on('click', '.owl-next', function () {
        let innerActive = syncChild.find('.owl-item.active:first').index();
        let innerActiveLast = syncChild.find('.owl-item.active:last').index();
        let innerActiveSynced = syncChild.find('.owl-item.active.synced').index();
        let innerSynced = syncChild.find('.owl-item.synced').index();
        if (innerActiveSynced === -1) {
            if (innerActive > innerSynced) {
                while (innerActive > innerSynced) {
                    syncChild.trigger('prev.owl.carousel');
                    innerSynced++;
                }
            } else if (innerActive < innerSynced) {
                while (innerActive < innerSynced) {
                    syncChild.trigger('next.owl.carousel');
                    innerSynced--;
                }
            }
        } else if (innerActiveSynced === innerActiveLast) {
            syncChild.trigger('next.owl.carousel');
        }
        let itemBottom = syncChild.find('.owl-item.synced');
        itemBottom.next().addClass('synced').siblings().removeClass('synced');
    });
    syncCarousel.on('click', '.owl-prev', function () {
        let innerActive = syncChild.find('.owl-item.active:first').index();
        let innerActiveSynced = syncChild.find('.owl-item.active.synced').index();
        let innerSynced = syncChild.find('.owl-item.synced').index();
        if (innerActiveSynced === -1) {
            if (innerActive > innerSynced) {
                while (innerActive > innerSynced - 2) {
                    syncChild.trigger('prev.owl.carousel');
                    innerSynced++;
                }
            } else if (innerActive < innerSynced) {
                while (innerActive < innerSynced - 2) {
                    syncChild.trigger('next.owl.carousel');
                    innerSynced--;
                }
            }
        } else if (innerActiveSynced === innerActive) {
            syncChild.trigger('prev.owl.carousel');
        }
        let itemBottom = syncChild.find('.owl-item.synced');
        itemBottom.prev().addClass('synced').siblings().removeClass('synced');
    });

    syncChild.on("click", ".owl-item", function () {
        let number = $(this).index();
        syncCarousel.trigger("to.owl.carousel", number, 300);
        $(this).siblings().removeClass('synced');
        $(this).addClass("synced");
    });
    //fancybox for shop
    $('#syncCarousel [data-fancybox]').fancybox({
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'speedIn': 600,
        'speedOut': 200,
        buttons: [
            'slideShow',
            'fullScreen',
            'thumbs',
            'share',
            'download',
            'zoom',
            'close'
        ],
        afterShow: function () {
            let number = this.index;
            $(syncChild).add(syncCarousel).trigger("to.owl.carousel", number, 300);
            $('#syncChild .owl-item').removeClass("synced").eq(number).addClass('synced');
        }
    });
    //hover effect on shop detail slider image : zooming effect
    $("#syncCarousel .item").on('mousemove', function (e) {
        $(this).find('img').css({
            'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 + '%'
        });
    });
    /*  ---------  gallery hover effect  ----------  */
    $("#product-gallary-details .item").on('mousemove', function (e) {
        $(this).find('img').css({
            'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 + '%'
        });
    });


    /* ----------- Counters ---------- */
    $(".counters").appear(function () {
        $(".count_nums").countTo();
    });


    /* -------copy right year maker------ */
    let copyYear = new Date().getFullYear();
    let copyText = $('#year , #year1');
    if (copyYear === 2019) {
        copyText.text(copyYear);
    } else {
        copyText.text('2019-' + copyYear);
    }

    /* =====================================
            Coming Soon Count Down
    ====================================== */
    let countDown = $(".count_down");
    if (countDown.length) {
        countDown.downCount({
            // month / day / Year
            date: '2/21/2021 12:00:00',
            offset: +10
        });
    }

    /* =====================================
            pagePiling parallax Index
    ====================================== */
    let pagePiling = $('#pagepiling');
    if ($(pagePiling).length) {
        $(pagePiling).pagepiling({
            onLeave: function (index, nextIndex, direction) {
                let i = index;
                let lastIndex = $('#pagepiling section:last').index();
                if (direction === 'down') {
                    $('#para-menu li a').removeClass('current');
                    $('#para-menu li').eq(i).children().addClass('current');
                    $('.para-btn.para-up').removeClass('disabled');
                } else {
                    i -= 2;
                    $('#para-menu li a').removeClass('current');
                    $('#para-menu li').eq(i).children().addClass('current');
                }
                if (i === 0) {
                    $('.para-btn.para-up').addClass('disabled');
                } else if (lastIndex === i) {
                    $('.para-btn.para-down').addClass('disabled');
                } else if (direction === 'up' && i < lastIndex) {
                    $('.para-btn.para-down').removeClass('disabled');
                }
            }
        });
        //PagePiling Arrows
        $('.para-up').on('click', function () {
            $.fn.pagepiling.moveSectionUp();
        });
        $('.para-down').on('click', function () {
            $.fn.pagepiling.moveSectionDown();
        });
    }
    //parallax menu navigation
    $('#para-menu li a').on('click', function (e) {
        e.preventDefault();
        let pageSection = $(this).parent().index();
        let lastPage = $('#pagepiling').find('section').length;
        pageSection++;
        $.fn.pagepiling.moveTo(pageSection);
        $('#para-menu li a').removeClass('current');
        $(this).addClass('current');
        //arrows disabling
        if (pageSection === 1) {
            $('.para-btn.para-up').addClass('disabled');
        } else if (pageSection === lastPage) {
            $('.para-btn.para-down').addClass('disabled');
        }
    });

    //  classic startup text rotation
    let typed = $('#typed-text');
    if (typed.length) {
        let classicStartup = new Typed('#typed-text', {
            strings: ['Front End Developer', 'Front End Designer', 'Front End Master', 'Creative Designer', 'Creative Builder'],
            typeSpeed: 45,
            backSpeed: 22,
            backDelay: 1000,
            smartBackspace: true, // this is a default
            loop: true
        });
    }

    /* =====================================
                CubePortfolio
    ====================================== */
    /* ------Blog Masonry----- */
    $("#blog-measonry").cubeportfolio({
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: "scaleSides",
        gapHorizontal: 30,
        gapVertical: 30,
        gridAdjustment: "responsive",
        mediaQueries: [{
            width: 1500,
            cols: 3
        }, {
            width: 1100,
            cols: 3
        }, {
            width: 992,
            cols: 3
        }, {
            width: 768,
            cols: 3
        }, {
            width: 480,
            cols: 1
        }, {
            width: 320,
            cols: 1,
        }],
    });
    /*services*/
    $("#services-measonry").cubeportfolio({
        layoutMode: 'grid',
        defaultFilter: '*',
        filters: '#services-filter',
        animationType: "scaleSides",
        gapHorizontal: 30,
        gapVertical: 30,
        gridAdjustment: "responsive",
        mediaQueries: [{
            width: 1500,
            cols: 3
        }, {
            width: 1100,
            cols: 3
        }, {
            width: 992,
            cols: 3
        }, {
            width: 768,
            cols: 2
        }, {
            width: 480,
            cols: 1
        }, {
            width: 320,
            cols: 1,
        }],
    });

    /*Testimonials Grids*/
    $("#testimonial-grid").cubeportfolio({
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: "quicksand",
        gapHorizontal: 0,
        gapVertical: 0,
        gridAdjustment: "responsive",
        mediaQueries: [{
            width: 1500,
            cols: 4,
        }, {
            width: 1100,
            cols: 4
        }, {
            width: 800,
            cols: 3
        }, {
            width: 480,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
    });

    /*Testimonials Grids*/
    $("#price-grid").cubeportfolio({
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: "quicksand",
        gapHorizontal: 50,
        gapVertical: 50,
        gridAdjustment: "responsive",
        mediaQueries: [{
            width: 1500,
            cols: 3
        }, {
            width: 1100,
            cols: 3
        }, {
            width: 800,
            cols: 2
        }, {
            width: 480,
            cols: 1
        }]
    });

    /*Gallery without spaces*/
    $("#grid-mosaic").cubeportfolio({
        filters: "#mosaic-filter",
        layoutMode: 'grid',
        defaultFilter: "*",
        animationType: "rotateSides",
        gapHorizontal: 0,
        gapVertical: 0,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1500,
            cols: 3,
        }, {
            width: 1100,
            cols: 3,
        }, {
            width: 767,
            cols: 2,
        }, {
            width: 480,
            cols: 1,
        }],
        plugins: {
            loadMore: {
                element: '#js-loadMore-mosaic',
                action: 'click',
                loadItems: 3,
            }
        },
    });


    /* =====================================
                Revolution Slider
    ====================================== */
    /* -----Main Index Slider------ */
    $("#rev_main").show().revolution({
        sliderType: "standard",
        jsFileLocation: "js/revolution/",
        sliderLayout: "fullscreen",
        dottedOverlay: "none",
        delay: 9000,
        navigation: {
            keyboardNavigation: "off",
            keyboard_direction: "horizontal",
            mouseScrollNavigation: "off",
            mouseScrollReverse: "default",
            onHoverStop: "off",
            touch: {
                touchenabled: "on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            },
            bullets: {
                enable: true,
                hide_onmobile: true,
                style: "numbered",
                hide_onleave: false,
                hide_under: 767,
                direction: "vertical",
                h_align: "left",
                v_align: "center",
                h_offset: 20,
                v_offset: 0,
                space: 5,
                tmp: '<div class="tp-bullet-number"><span class="tp-count">{{param1}}</span><span class="tp-bullet-line"></span></div>'
            },
            arrows: {
                style: "",
                enable: false,
            }
        },
        viewPort: {
            enable: true,
            outof: "pause",
            visible_area: "80%",
            presize: false
        },
        responsiveLevels: [1240, 1024, 778, 480],
        visibilityLevels: [1240, 1024, 778, 480],
        gridwidth: [1140, 1024, 768, 480],
        gridheight: [660, 650, 600, 490],
        lazyType: "none",
        parallax: {
            type: "mouse",
            origo: "slidercenter",
            speed: 2000,
            speedbg: 0,
            speedls: 0,
            levels: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 20, 25, 55],
            disable_onmobile: "on"
        },
        shadow: 0,
        spinner: "off",
        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,
        shuffle: "off",
        autoHeight: "off",
        hideThumbsOnMobile: "off",
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLimit: 0,
        debugMode: false,
        fallbacks: {
            simplifyAll: "off",
            nextSlideOnWindowFocus: "off",
            disableFocusListener: false,
        }
    });

    //revolution slider arrows
    $("#rev_arrows").show().revolution({
        sliderType: "standard",
        jsFileLocation: "js/revolution/",
        sliderLayout: "fullscreen",
        autoHeight: 'off',
        dottedOverlay: "none",
        delay: 9000,
        navigation: {
            keyboardNavigation: "off",
            keyboard_direction: "horizontal",
            mouseScrollNavigation: "off",
            mouseScrollReverse: "default",
            onHoverStop: "on",
            touch: {
                touchenabled: "on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            },
            arrows: {
                style: "zeus",
                enable: true,
                hide_onmobile: true,
                hide_under: 600,
                hide_onleave: true,
                hide_delay: 200,
                hide_delay_mobile: 1200,
                tmp: '<div class="tp-title-wrap"> <div class="tp-arr-imgholder"></div> </div>',
                left: {
                    h_align: "left",
                    v_align: "center",
                    h_offset: 30,
                    v_offset: 0
                },
                right: {
                    h_align: "right",
                    v_align: "center",
                    h_offset: 30,
                    v_offset: 0
                }
            }
        },
        viewPort: {
            enable: true,
            outof: "pause",
            visible_area: "80%",
            presize: false
        },
        responsiveLevels: [1240, 1024, 778, 480],
        visibilityLevels: [1240, 1024, 778, 480],
        gridwidth: [1140, 1024, 768, 480],
        gridheight: [668, 650, 600, 490],
        lazyType: "none",
        parallax: {
            type: "mouse",
            origo: "slidercenter",
            speed: 2000,
            speedbg: 0,
            speedls: 0,
            levels: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 20, 25, 55],
            disable_onmobile: "on"
        },
        shadow: 0,
        spinner: "off",
        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,
        shuffle: "off",

        hideThumbsOnMobile: "off",
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        debugMode: false,
        fallbacks: {
            simplifyAll: "off",
            nextSlideOnWindowFocus: "off",
            disableFocusListener: false,
        }
    });

    //interactive classic revolution slider
    let indexPort = new $("#rev_interactive").show().revolution({
        sliderType: "carousel",
        jsFileLocation: "js/revolution/",
        sliderLayout: "fullscreen",
        dottedOverlay: "none",
        delay: 9000,
        navigation: {
            keyboardNavigation: "off",
            keyboard_direction: "horizontal",
            mouseScrollNavigation: "off",
            mouseScrollReverse: "default",
            onHoverStop: "off",
            touch: {
                touchenabled: "on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            },
            bullets: {
                style: "",
                enable: true,
                hide_onmobile: true,
                hide_under: 480,
                hide_onleave: false,
                hide_delay: 200,
                direction: "horizontal",
                space: 10,
                h_align: "center",
                v_align: "bottom",
                h_offset: 0,
                v_offset: 30
            },
            arrows: {
                style: "",
                enable: false,
            }
        },
        viewPort: {
            enable: true,
            outof: "pause",
            visible_area: "80%",
            presize: false
        },
        responsiveLevels: [1240, 1024, 778, 480],
        visibilityLevels: [1240, 1024, 778, 480],
        gridwidth: [1140, 1024, 768, 480],
        gridheight: [660, 650, 600, 490],
        lazyType: "none",
        parallax: {
            type: "mouse",
            origo: "slidercenter",
            speed: 2000,
            speedbg: 0,
            speedls: 0,
            levels: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 20, 25, 55],
            disable_onmobile: "on"
        },
        shadow: 0,
        spinner: "off",
        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,
        shuffle: "off",
        autoHeight: "off",
        hideThumbsOnMobile: "off",
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLimit: 0,
        debugMode: false,
        fallbacks: {
            simplifyAll: "off",
            nextSlideOnWindowFocus: "off",
            disableFocusListener: false,
        }
    });
    indexPort.on('revolution.slide.onchange', function (event, data) {
        let slideIndex = data.slideIndex;
        slideIndex--;
        $('.tp-bullets').find('.tp-bullet').eq(slideIndex).addClass('active').siblings().removeClass('active');
        setTimeout(function () {
            $('.tp-bullets').find('.tp-bullet').eq(slideIndex).addClass('selected').siblings().removeClass('selected');
        }, 300);
    });

    //single item indexes
    $("#rev_single").show().revolution({
        sliderType: "hero",
        jsFileLocation: "js/revolution",
        sliderLayout: "fullscreen",
        scrollbarDrag: "true",
        dottedOverlay: "none",
        delay: 9000,
        navigation: {},
        responsiveLevels: [1240, 1024, 778, 480],
        visibilityLevels: [1240, 1024, 778, 480],
        gridwidth: [1170, 1024, 778, 480],
        gridheight: [868, 768, 960, 720],
        lazyType: "none",
        parallax: {
            type: "scroll",
            origo: "slidercenter",
            speed: 400,
            levels: [10, 15, 20, 25, 30, 35, 40, -10, -15, -20, -25, -30, -35, -40, -45, 55]
        },
        shadow: 0,
        spinner: "off",
        autoHeight: "off",
        fullScreenAutoWidth: "off",
        fullScreenAlignForce: "off",
        fullScreenOffsetContainer: "",
        disableProgressBar: "on",
        hideThumbsOnMobile: "off",
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        debugMode: false,
        fallbacks: {
            simplifyAll: "off",
            disableFocusListener: false
        }
    });

    //creative agency index
    $("#rev_creative").show().revolution({
        sliderType: "standard",
        sliderLayout: "fullscreen",
        scrollbarDrag: "true",
        dottedOverlay: "none",
        navigation: {
            keyboardNavigation: "off",
            keyboard_direction: "horizontal",
            mouseScrollNavigation: "off",
            bullets: {
                style: "",
                enable: true,
                rtl: false,
                hide_onmobile: false,
                hide_onleave: false,
                hide_under: 767,
                hide_over: 9999,
                tmp: '',
                direction: "horizontal",
                space: 10,
                h_align: "center",
                v_align: "bottom",
                h_offset: 0,
                v_offset: 40
            },
            arrows: {
                enable: false,
                hide_onmobile: true,
                hide_onleave: false,
                hide_under: 767,
                left: {
                    h_align: "left",
                    v_align: "center",
                    h_offset: 20,
                    v_offset: 30
                },
                right: {
                    h_align: "right",
                    v_align: "center",
                    h_offset: 20,
                    v_offset: 30
                }
            },
            touch: {
                touchenabled: "on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            }
        },
        viewPort: {
            enable: true,
            outof: "pause",
            visible_area: "90%"
        },
        responsiveLevels: [4096, 1024, 778, 480],
        gridwidth: [1140, 1024, 750, 480],
        gridheight: [600, 500, 500, 350],
        lazyType: "none",
        parallax: {
            type: "mouse",
            origo: "slidercenter",
            speed: 9000,
            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50]
        },
        shadow: 0,
        spinner: "off",
        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,
        shuffle: "off",
        autoHeight: "off",
        hideThumbsOnMobile: "off",
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        disableProgressBar: "off",
        hideAllCaptionAtLilmit: 0,
        debugMode: false,
        fallbacks: {
            simplifyAll: "off",
            nextSlideOnWindowFocus: "off",
            disableFocusListener: false
        }
    });

    //one page index
    $("#rev_one_page").show().revolution({
        sliderType: "standard",
        sliderLayout: "fullscreen",
        scrollbarDrag: "true",
        dottedOverlay: "none",
        navigation: {
            keyboardNavigation: "off",
            keyboard_direction: "horizontal",
            mouseScrollNavigation: "off",
            bullets: {
                style: "",
                enable: true,
                rtl: false,
                hide_onmobile: false,
                hide_onleave: false,
                hide_under: 767,
                hide_over: 9999,
                tmp: '',
                direction: "vertical",
                space: 10,
                h_align: "right",
                v_align: "center",
                h_offset: 40,
                v_offset: 0
            },
            arrows: {
                enable: false,
                hide_onmobile: true,
                hide_onleave: false,
                hide_under: 767,
                left: {
                    h_align: "left",
                    v_align: "center",
                    h_offset: 20,
                    v_offset: 30
                },
                right: {
                    h_align: "right",
                    v_align: "center",
                    h_offset: 20,
                    v_offset: 30
                }
            },
            touch: {
                touchenabled: "on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            }
        },
        viewPort: {
            enable: true,
            outof: "pause",
            visible_area: "90%"
        },
        responsiveLevels: [4096, 1024, 778, 480],
        gridwidth: [1140, 1024, 750, 480],
        gridheight: [600, 500, 500, 350],
        lazyType: "none",
        parallax: {
            type: "mouse",
            origo: "slidercenter",
            speed: 9000,
            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50]
        },
        shadow: 0,
        spinner: "off",
        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,
        shuffle: "off",
        autoHeight: "off",
        hideThumbsOnMobile: "off",
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        disableProgressBar: "off",
        hideAllCaptionAtLilmit: 0,
        debugMode: false,
        fallbacks: {
            simplifyAll: "off",
            nextSlideOnWindowFocus: "off",
            disableFocusListener: false
        }
    });

    //Design Studio Index
    $("#rev_slider_8_1").show().revolution({
        sliderType: "standard",
        jsFileLocation: "//localhost/revslider/revslider/public/assets/js/",
        sliderLayout: "fullscreen",
        dottedOverlay: "none",
        delay: 9000,
        navigation: {
            keyboardNavigation: "off",
            keyboard_direction: "horizontal",
            mouseScrollNavigation: "off",
            mouseScrollReverse: "default",
            onHoverStop: "on",
            touch: {
                touchenabled: "on",
                touchOnDesktop: "off",
                swipe_threshold: 75,
                swipe_min_touches: 50,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            },
            arrows: {
                style: "uranus",
                enable: true,
                hide_onmobile: true,
                hide_under: 600,
                hide_onleave: true,
                hide_delay: 200,
                hide_delay_mobile: 1200,
                tmp: '<div class="hvr-pulse"></div>',
                left: {
                    h_align: "left",
                    v_align: "center",
                    h_offset: 30,
                    v_offset: 0
                },
                right: {
                    h_align: "right",
                    v_align: "center",
                    h_offset: 30,
                    v_offset: 0
                }
            },
            bullets: {
                enable: true,
                hide_onmobile: true,
                hide_under: 600,
                style: "hephaistos",
                hide_onleave: true,
                hide_delay: 200,
                hide_delay_mobile: 1200,
                direction: "horizontal",
                h_align: "center",
                v_align: "bottom",
                h_offset: 0,
                v_offset: 30,
                space: 5,
                tmp: ''
            }
        },
        responsiveLevels: [1240, 1024, 778, 480],
        visibilityLevels: [1240, 1024, 778, 480],
        gridwidth: [1240, 1024, 778, 480],
        gridheight: [868, 600, 500, 400],
        lazyType: "smart",
        parallax: {
            type: "mouse",
            origo: "slidercenter",
            speed: 2000,
            speedbg: 0,
            speedls: 0,
            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50, 10, 11, 12, 13, 14, 55],
        },
        shadow: 0,
        spinner: "off",
        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,
        shuffle: "off",
        autoHeight: "off",
        fullScreenAutoWidth: "off",
        fullScreenAlignForce: "off",
        fullScreenOffsetContainer: "",
        fullScreenOffset: "",
        hideThumbsOnMobile: "off",
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        debugMode: false,
        fallbacks: {
            simplifyAll: "off",
            nextSlideOnWindowFocus: "off",
            disableFocusListener: false,
        }
    });

    //modern agency index
    $("#vertical-bullets").show().revolution({
        sliderType: "standard",
        sliderLayout: "fullscreen",
        scrollbarDrag: "true",
        dottedOverlay: "none",
        navigation: {
            keyboardNavigation: "off",
            keyboard_direction: "horizontal",
            mouseScrollNavigation: "off",
            mouseScrollReverse: "default",
            onHoverStop: "off",
            bullets: {
                enable: true,
                hide_onmobile: true,
                hide_under: 767,
                hide_onleave: false,
                direction: "vertical",
                h_align: "left",
                v_align: "center",
                h_offset: 30,
                v_offset: 0,
                space: 5,
                tmp: '<div class="tp-bullet-inner"></div><div class="tp-line"></div>'
            },
            touch: {
                touchenabled: "on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            },
        },
        viewPort: {
            enable: true,
            outof: "pause",
            visible_area: "90%",
            presize: true
        },
        responsiveLevels: [4096, 1200, 778, 480],
        gridwidth: [1140, 1024, 750, 480],
        gridheight: [600, 500, 500, 350],
        lazyType: "none",
        parallax: {
            type: "mouse",
            origon: "slidercenter",
            speed: 9000,
            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
        },
        shadow: 0,
        spinner: "off",
        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,
        shuffle: "off",
        autoHeight: "off",
        hideThumbsOnMobile: "off",
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 360,
        hideAllCaptionAtLilmit: 360,
        debugMode: false,
        fallbacks: {
            simplifyAll: "off",
            nextSlideOnWindowFocus: "off",
            disableFocusListener: false,
        }
    });

});

/* form validation */

/* check confirmed password */

$("#password").on("keyup", function () {
    if ($(this).val() != $("#password2").val()) {
        $("#password2").addClass("border-danger");
        $("#reg_btn").attr("disabled", true);
    } else {
        $("#password2").removeClass("border-danger");
        $("#reg_btn").removeAttr("disabled");
    }
});

$("#password2").on("keyup", function () {
    if ($("#password").val() != $(this).val()) {
        $(this).addClass("border-danger");
        $("#reg_btn").attr("disabled", true);
    } else {
        $(this).removeClass("border-danger");
        $("#reg_btn").removeAttr("disabled");
    }
});

/* check confirmed new password
is the same as new password  */
$("#newPass").on("keyup", function () {
    if ($(this).val() != $("#retypeNewPass").val()) {
        $("#retypeNewPass").addClass("border-danger");
        $("#save-new-pass-btn").attr("disabled", true);
    } else {
        $("#retypeNewPass").removeClass("border-danger");
        $("#save-new-pass-btn").removeAttr("disabled");
    }
});

$("#retypeNewPass").on("keyup", function () {
    if ($("#newPass").val() != $(this).val()) {
        $(this).addClass("border-danger");
        $("#save-new-pass-btn").attr("disabled", true);
    } else {
        $(this).removeClass("border-danger");
        $("#save-new-pass-btn").removeAttr("disabled");
    }
});

/* check reset password is the same as confirmed one 
 */
$("#resetNewPass").on("keyup", function () {
    if ($(this).val() != $("#resetReNewPass").val()) {
        $("#resetReNewPass").addClass("border-danger");
        $("#reset_pass_btn").attr("disabled", true);
    } else {
        $("#resetReNewPass").removeClass("border-danger");
        $("#reset_pass_btn").removeAttr("disabled");
    }
});

$("#resetReNewPass").on("keyup", function () {
    if ($("#resetNewPass").val() != $(this).val()) {
        $(this).addClass("border-danger");
        $("#reset_pass_btn").attr("disabled", true);
    } else {
        $(this).removeClass("border-danger");
        $("#reset_pass_btn").removeAttr("disabled");
    }
});

/* refresh page after clicking close icon on form messages */
$('#notification i').on('click', function () {
    window.location = window.location.href.split("?")[0];
})
//keep track of user click and typing on a page to expire sessions // to uncomment
function send_active_signal() {
    $.ajax({
        url: 'session_time.php',
        type: 'post',
        data: {
            is_clicked: true,
            is_typed: true,
            current_email: $('#current_user_email').text(),

        },
        success: function (response) {
            if (response === "timeOut") {
                location.href = 'logout.php';
                alert("Session time out...Please Login again");
            }
            if (response === "loggedOut") {
                location.href = 'index.php';
                alert("You logged out of you account... Please Login again");
            }
        },
    });
}
/* send active signal to track user activity on profile page for session time out */
$('#profile_body').on('click', function () {
    send_active_signal();
})

/* resend account verification email */

$('#resend_verify_email').on('click', function () {
    $.ajax({
        url: 'process.php',
        type: 'post',
        data: {
            request_name: 'resend verification email',
            _token: $('#_token').val()
        },
        beforeSend: function () {
            // Show preloader
            $('.loader').css('display', 'block');
        },
        success: function (response) {
            $('.loader').css('display', 'none');
            switch (response) {
                case 'Email sent success':
                    $('#resend_verify_email_res').text('Please check your email to verify your account');
                    $('#resend_verify_email_res').removeClass().addClass("text-success mt-3 text-center");
                    window.setTimeout(function () {
                        $('#resend_verify_email_res').removeClass().addClass("text-success mt-3 d-none");
                    }, 5000);
                    break;
                case 'Email not sent':
                    $('#resend_verify_email_res').text('Email not sent! please try again later.');
                    $('#resend_verify_email_res').removeClass().addClass("text-danger mt-3 text-center");
                    window.setTimeout(function () {
                        $('#resend_verify_email_res').removeClass().addClass("text-danger mt-3 d-none");
                    }, 5000);
                    break;
                case 'db error':
                    $('#resend_verify_email_res').text('Server not responding! please try again later')
                    $('#resend_verify_email_res').removeClass().addClass("text-danger mt-3 text-center");
                    window.setTimeout(function () {
                        $('#resend_verify_email_res').removeClass().addClass("text-danger mt-3 d-none");
                    }, 5000);
                    break;
                default:
                    break;
            }
        },
    });
})

/* forget password check box display send code button and remove password field */
$("#forgetPassCheckBox").change(function () {
    if (this.checked) {
        $('#sendCodeBtn').removeClass().addClass('button top10 gradient-btn');
        $('#loginBtn').removeClass().addClass('d-none');
        $('#loginPass').removeClass().addClass('d-none');
        $('#loginTitle').text('Enter your email address to receive password reset code');

    } else {
        $('#sendCodeBtn').removeClass().addClass('d-none');
        $('#loginBtn').removeClass().addClass('button gradient-btn');
        $('#loginPass').removeClass().addClass('col-md-12 col-sm-12');
        $('#loginTitle').text('login');

    }
});

//send password reset code to email
$('#sendCodeBtn').on('click', function () {
    $.ajax({
        url: 'process.php',
        type: 'post',
        data: {
            request_name: 'send activation code to email',
            _token: $('#_logInToken').val(),
            email: $('#loginEmail').val()
        },
        beforeSend: function () {
            // Show preloader
            $('.loader').css('display', 'block');
        },
        success: function (response) {
            $('.loader').css('display', 'none');
            switch (response) {
                //success
                case 'codesent':
                    $('#codeSendResult').text('Please check your email for password reset code');
                    $('#codeSendResult').removeClass().addClass("text-center text-success border border-success border-rounded");
                    window.setTimeout(function () {
                        $('#codeSendResult').removeClass().addClass("d-none");
                        $('#forgetPassCheckBox').prop('checked', false);
                        location.href = 'reset-pass.php';
                    }, 5000);
                    break;
                    //failed
                case 'unabletosendemail':
                    $('#codeSendResult').text('Unable to send email! Please your internet connection and try again later.');
                    $('#codeSendResult').removeClass().addClass("text-center text-danger border border-danger border-rounded");
                    break;
                case 'emailinvalid':
                    $('#codeSendResult').text('Email format invalid');
                    $('#codeSendResult').removeClass().addClass("text-center text-danger border border-danger border-rounded");
                    break;
                case 'serverProblem':
                    $('#codeSendResult').text('Something wrong with the server! please try again later');
                    $('#codeSendResult').removeClass().addClass("text-center text-danger border border-danger border-rounded");
                    break;
                default:
                    break;
            }
        },
    });
})

//product selection functions
/* -------------------------- */

/* display all products */

function selectAllProducts() {
    $.ajax({
        url: 'process.php',
        type: 'post',
        data: {
            request_name: 'get all products',
            _token: $('#_token').val()
        },
        beforeSend: function () {
        },
        success: function (response) {

            if (response == 'server error') {
                $('#products-body #notification').removeClass()
                    .addClass('text-center text-danger border border-danger border-rounded');
            } else {
                // display products
                result = JSON.parse(response);
                for (i = 0; i < result.length; i++) {
                    $('#productList').append(
                        '<div class="col-lg-3 col-md-4 col-sm-6 col-6 wow fadeIn" data-wow-delay="300ms">' +
                        '<div class="shopping-box bottom30">' +
                        '<div class="image sale" data-sale=' + result[i].discount + '>' +
                        "<img src='images/img-list/" + result[i].imgFolder + "/" + result[i].id + "-thumb.jpg' alt='shop'>" +
                        '<div class="overlay center-block">' +
                        "<a class='w-100 h-100' href='product-details.php?k=" + result[i].id + "'" + "></a>"+
                        '</div>' +
                        '</div>' +
                        '<div class="shop-content text-center">' +
                        "<h4 class='darkcolor'><a href='product-details.php?k=" + result[i].id + "'" + ">" + result[i].brand + "</a></h4>" +
                        '<p>' + result[i].name + '</p>' +
                        '<h4 class="price-product">' + result[i].price + '</h4>' +
                        '</div>' +
                        '</div>' +
                        '</div>'
                    );
                }
                //set product counter                
                $("#product-quantity").text(result.length);
            }
        },
    });

}

/* set all products filter */

function selectAllFilters() {
    $.ajax({
        url: 'process.php',
        type: 'post',
        data: {
            request_name: 'get all filters',
            _token: $('#_token').val()
        },
        beforeSend: function () {},
        success: function (response) {
            if (response == 'server error') {
                $('#products-body #notification').removeClass()
                    .addClass('text-center text-danger border border-danger border-rounded');
            } else {
                // display products
                result = JSON.parse(response);
                var brands = categories = sizes = colors = [];
                for (i = 0; i < result.length; i++) {
                    //set brands
                    if (($.inArray(result[i].brand, brands) < 0)) {
                        $('#filter-products-modal #brand-select').append(
                            "<option>" + result[i].brand + "</option>"
                        );
                        brands.push(result[i].brand);
                    }
                    //set category
                    if (($.inArray(result[i].category, categories) < 0)) {
                        $('#filter-products-modal #category-select').append(
                            "<option>" + result[i].category + "</option>"
                        );
                        categories.push(result[i].category);
                    }
                    // gender is set in html
                    // set size
                    if (($.inArray(result[i].size, sizes) < 0)) {
                        $('#filter-products-modal #size-select').append(
                            "<option>" + result[i].size + "</option>"
                        );
                        sizes.push(result[i].size);
                    }
                    //set color
                    if (($.inArray(result[i].color, colors) < 0)) {
                        $('#filter-products-modal #color-select').append(
                            "<option>" + result[i].color + "</option>"
                        );
                        colors.push(result[i].color);
                    }
                    //discount is set in html

                }
            }
        },
    });
}

/* display filtered products */
function filterProducts() {
    $.ajax({
        url: 'process.php',
        type: 'post',
        data: {
            request_name: 'filter products',
            _token: $('#_token').val(),
            brand: $('#brand-select option:selected').text(),
            category: $('#category-select option:selected').text(),
            gender: $('#gender-select option:selected').text(),
            size: $('#size-select option:selected').text(),
            color: $('#color-select option:selected').text(),
            orderBy: $('#sort-by-select option:selected').text()
        },
        beforeSend: function () {},
        success: function (response) {
            if (response == 'server error') {
                $('#products-body #notification').removeClass()
                    .addClass('text-center text-danger border border-danger border-rounded');
            } else {
                // display products
                result = JSON.parse(response);
                var id = [];
                $('#productList').children().remove();
                for (i = 0; i < result.length; i++) {
                    if (($.inArray(result[i].product_id, id) < 0)) {
                        $('#productList').append(
                            '<div class="col-lg-3 col-md-4 col-sm-6 col-6 wow fadeIn" data-wow-delay="300ms">' +
                            '<div class="shopping-box bottom30">' +
                            '<div class="image sale" data-sale=' + result[i].discount + '>' +
                            "<img src='images/img-list/" + result[i].imgFolder + "/" + result[i].product_id + "-thumb.jpg' alt='shop'>" +
                            '<div class="overlay center-block">' +
                            '<a class="opens" href="shop-cart.html" title="Add To Cart"><i ' +
                            'class="fa fa-shopping-cart"></i></a>' +
                            '</div>' +
                            '</div>' +
                            '<div class="shop-content text-center">' +
                            "<h4 class='arkcolor'><a href='product-details.php?k=" + result[i].product_id + "'" + ">" + result[i].brand + "</a></h4>" +
                            '<p>' + result[i].name + '</p>' +
                            '<h4 class="price-product">' + result[i].price + '</h4>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                        );
                        id.push(result[i].product_id);
                    }
                }
                //set product counter
                $("#product-quantity").text(id.length);
            }

        },
    });

}
// filter products when user selects different filter

$("#brand-select,#category-select,#gender-select,#size-select,#color-select,#sort-by-select")
    .on("change", function () {
        filterProducts();
    });
//filter and show suggested products by name, category, brand

$("#search-product").keyup(function () {
    //ajax call for product list
    if ($('#search-product').val() !== "") {
        $.ajax({
            url: 'process.php',
            type: 'post',
            data: {
                request_name: 'search products',
                _token: $('#_token').val(),
                keyWord: $('#search-product').val()
            },
            beforeSend: function () {},
            success: function (response) {
                if (response !== 'server error') {
                    // display products
                    result = JSON.parse(response);
                    $("#search-product").autocomplete({
                            minLength: 1,
                            source: result,
                        })
                        .autocomplete("instance")._renderItem = function (ul, item) {
                            return $(
                                    "<a class='d-flex flex-column flex-sm-row'" +
                                    "id ='auto-complete-li' href='product-details.php?k=" + item.id + "'" +
                                    "><li")
                                .append("<p class='font-weight-bold mb-0 mb-sm-3'>" + item.value +
                                    "</p>" +
                                    "<p class='mb-0 mb-sm-3'>" + item.label +
                                    "</p>" +
                                    "<img id ='project-icon' src='images/img-list/" + item.imgFolder + "/" + item.id +
                                    "-thumb.jpg" + "' class = 'p-0 border-0 mr-auto ml-2 ml-sm-auto mr-sm-2 mb-2 mb-sm-0 mt-0 mt-sm-2' alt = '' >" +
                                    "</li></a>"
                                )
                                .appendTo(ul);
                        };
                }
            },
        });
    }

});
// make auto complete ul the same size as input box
jQuery.ui.autocomplete.prototype._resizeMenu = function () {
    var ul = this.menu.element;
    ul.outerWidth(this.element.outerWidth());
}
//get price based on selected size and color

function calculatePrice(productData,color,size)
{
    var result=[null,null];
    for(i=0;i<productData.length;i++)
    {
        if(((productData[i].size)==size)&&(productData[i].color)==color)
        {
            result[0]=productData[i].price;
            result[1]=productData[i].discount;
        }
    }
    return result;
}

//get product details

function getProductDetails(colorSeleced,sizeSelected) {
    $.ajax({
        url: 'process.php',
        type: 'post',
        data: {
            request_name: 'get product details',
            _token: $('#_token').val(),
            product_id: $('#product-id').val()
        },
        beforeSend: function () {},
        success: function (response) {

            if ((response == 'server error') || (response.length <1)) {
                document.location.href = 'products.php';
            } else {
                result = JSON.parse(response);
                var colors = [];
                var colorImg = [];
                var sizes = [];
                var images = result[2];
                colorSeleced = (((colorSeleced)==null)?result[1][0].color:colorSeleced);
                sizeSelected = (((sizeSelected)==null)?result[1][0].size:sizeSelected);

                //display brand and name
                $('#brand-name').empty().append(
                    result[0][0].brand+
                     "<span class='divider-left'></span>"
                );
                $('#gallary-name').text(result[0][0].name);
                //find available colors and sizes
                for (i = 0; i < result[1].length; i++) {
                    if (($.inArray(result[1][i].color, colors) < 0)) {
                        colors.push(result[1][i].color);
                    }
                    if (($.inArray(result[1][i].size, sizes) < 0)) {
                        sizes.push(result[1][i].size);
                    }
                }
                //display colors 
                $('#product-colors-list').empty();
                for (i = 0; i < colors.length; i++) {
                    $('#product-colors-list').append(
                        "<div class = 'position-relative'" +
                        "data-toggle = 'tooltip'" +
                        "data-placement = 'top'" +
                        "title ='" + colors[i] + "'>" +
                        "<img src = 'images/img-list/" + result[0][0].imgFolder +
                        "/" + result[0][0].id + "-" + colors[i] + "-1.jpg'" +
                        "id ='"+colors[i] +"'"+"class = 'rounded-circle shadow product-color-selector"+
                        ((colors[i]==colorSeleced)?" selected":"")+"'>" +
                        "<i id='checked' class = 'fas fa-check"+ 
                        ((colors[i]==colorSeleced)? "":" d-none")+"'></i> </div>");
                }
    
                //display sizes
                $('#product-sizes-list').empty();
                for (i = 0; i < sizes.length; i++) {
                    $('#product-sizes-list').append("<div class='product-size-selector position-relative'>"+
                    "<p value='"+sizes[i]+"'"+"id='"+(i+1)+"'"+
                     "class='pt-4 text-center"+((sizes[i]==sizeSelected)?" selected'":"'")+
                     "'>"+sizes[i]+"</p>"+
                    "<i id='checked' class='fas fa-check"+((sizes[i]==sizeSelected)?"'":" d-none'")+
                    "></i></div>");
                }
                //display images
                $('#imgList').empty();
                $('#imgListZoom').empty();
                for (i = 0; i < (images.length); i++) {
                    var imgSource = "images/img-list/" + result[0][0].imgFolder + "/" +images[i]+".jpg'";
                    $('#imgList').append(
                        "<div class = 'carousel-item" +((i==0)?" active":"")+"'>"+
                        "<img class = 'w-100'" +
                        "src = '" +imgSource+
                        "alt = ''></div>"
                    );
                    /* zoom gallary */
                    $('#imgListZoom').append(
                        "<div class = 'carousel-item" +((i==0)?" active":"")+"'>"+
                        "<img class = ''" +
                        "src = '" +imgSource+
                        "alt = ''></div>"
                    );
                }
                $('#product-color-name').text(
                    ($('#product-colors-list img.selected').attr('id'))
                );
                //show size names
                $('#product-size-name').text(
                    $("#product-sizes-list p.selected").text()
                );
                //product description
                $("#product-description").text(
                    result[0][0].description
                );

                //product number
                $("#product-number").text(
                   "Product number : "+ result[0][0].id
                );
                // calculate and display price and discount
                var pricePackage = calculatePrice(result[1],colorSeleced,sizeSelected);
                if(pricePackage[0]==null)
                {
                    $('#price-discount-list').empty();
                    $('#price-discount-list').append(
                        "<h4 class='text-danger'>Out of stock !</h4>"
                    );
                    $('#add-to-cart').attr('disabled',true);
                }
                else
                {
                    var price =parseFloat(((pricePackage[0])*(pricePackage[1]))/100).toFixed(2);
                    $('#price-discount-list').empty();
                    $('#price-discount-list').append("<div>$"+price+"</div>").append(
                        "<del class='ml-3 text-danger'>"+"$"+pricePackage[0]+"</del>"
                    );
                    $('#add-to-cart').attr('disabled',false);

                }
                //display related products
                $('#related-products-list').empty();
                for (i = 0; i < result[3].length; i++) {
                    if((result[3][i].name) !=(result[0][0].name))
                    {
                        $('#related-products-list').append(
                            '<div class="col-lg-3 col-md-4 col-sm-6 col-6 wow fadeIn" data-wow-delay="300ms">' +
                            '<div class="shopping-box bottom30">' +
                            '<div class="image sale" data-sale=' + result[3][i].discount + '>' +
                            "<img src='images/img-list/" + result[3][i].imgFolder + "/" + result[3][i].id + "-thumb.jpg' alt='shop'>" +
                            '<div class="overlay center-block">' +
                            "<a class='w-100 h-100' href='product-details.php?k=" + result[3][i].id + "'" + "></a>"+
                            '</div>' +
                            '</div>' +
                            '<div class="shop-content text-center">' +
                            "<h4 class='darkcolor'><a href='product-details.php?k=" + result[3][i].id + "'" + ">" + result[3][i].brand + "</a></h4>" +
                            '<p>' + result[3][i].name + '</p>' +
                            '<h4 class="price-product">' +parseFloat(result[3][i].price).toFixed(2) + '</h4>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                        );

                    }
                }
            }
        },
    });
}



$('.carousel').carousel({
    interval: false,
});

//image gallary zoom page
$('#zoom-icon').on('click',function(){
    $('#gallary-zoom').removeClass().addClass('gallary-zoom ');
    $('#img-galary-zoom').removeClass().addClass('img-galary-zoom');
})

//close image gallary zoom page
$('#close').on('click', function () {
    $('#gallary-zoom').removeClass().addClass('gallary-zoom d-none');
    $('#img-galary-zoom').removeClass().addClass('img-galary-zoom d-none');
})

//check and uncheck color selected by user and mark selected 
$(document).on("click", "#product-colors-list div", function(event) {
    $("#product-colors-list div i").each(function () {
        $(this).removeClass().addClass('fas fa-check d-none');
    });
    $("#product-colors-list div img").each(function () {
        $(this).removeClass().addClass('rounded-circle shadow product-color-selector');
    });
    $("#" + event.target.id).next().removeClass().addClass('fas fa-check');
    $("#" + event.target.id).removeClass().addClass('rounded-circle shadow product-color-selector selected');
    //show color names
    $('#product-color-name').text(
        ($('#product-colors-list img.selected').attr('id'))
    );
    //calculate new price based on size and color selected
    getProductDetails(event.target.id,$("#product-sizes-list p.selected").text());

});

//check and uncheck size selected by user and mark selected
$(document).on("click", "#product-sizes-list div", function(event) {

    $("#product-sizes-list div i").each(function () {
        $(this).removeClass().addClass('fas fa-check d-none');
    });
    $("#product-sizes-list div p").each(function () {
        $(this).removeClass().addClass('pt-4 text-center');
    });
    $("#" + event.target.id).next().removeClass().addClass('fas fa-check');
    $("#" + event.target.id).removeClass().addClass('pt-4 text-center selected');
        //show size names
        $('#product-size-name').text(
            $("#" + event.target.id).text()
        );
    //calculate new price based on size and color selected
    getProductDetails($("#product-colors-list img.selected").attr('id'),$("#" + event.target.id).text());
});

//add items to cart
$('#add-to-cart').on("click",function(){
    $.ajax({
        url: 'process.php',
        type: 'post',
        data: {
            request_name: 'add items to basket',
            _token: $('#_token').val(),
            product_id:$('#product-id').val(),
            size: $("#product-size-name").text(),
            color:$("#product-color-name").text(),
            quantity:$("#add-cart-quantity").val()
        },
        beforeSend: function () {},
        success: function (response) {
            switch (response)
            {
                case'item saved success':
                    $('#proceed-checkout h4').empty().append("<b>"+$("#add-cart-quantity").val()+"</b>"+" x new item(s) added to the basket");
                    $('#proceed-checkout').modal({backdrop: 'static', keyboard: false});
                break;

                case 'quantity not available':
                    $('#proceed-checkout h4').removeClass().addClass('text-danger')
                    .empty().append("Quantity is more than stock available for this item");
                    $('#proceed-checkout').modal({backdrop: 'static', keyboard: false});
                    $('#proceed-checkout-btn').removeClass().addClass('btn-common gradient-btn d-none');
                    break;

                case 'server error':
                    $('#proceed-checkout h4').removeClass().addClass('text-danger')
                    .empty().append("Something wrong with server. Please try again later");
                    $('#proceed-checkout').modal({backdrop: 'static', keyboard: false});
                    $('#proceed-checkout-btn').removeClass().addClass('btn-common gradient-btn d-none');
                    break;

                case 'invalid params':
                    break;

                default:
                break;
            }

        },
    });
})

//refresh the page after clicking countinue shopping
$('#continue-shopping').on('click',function(){
    location.reload();
})

//get shopping basket data and display

function getShoppingBasketDetails()
{
    $.ajax({
        url: 'process.php',
        type: 'post',
        data: {
            request_name: 'get shopping basket',
            _token: $('#_token').val()
        },
        beforeSend: function () {},
        success: function (response) {
            if(response !== "server error")
            {
                result = JSON.parse(response);
                total_price =0.00;
                for(i=0; i<result.length;i++)
                {
                    price = parseFloat(((result[i][0].price)-(((result[i][0].price)*(result[i][0].discount))/100))).toFixed(2);
                    total = parseFloat((price)*(result[i][2])).toFixed(2);
                    total_price+= parseFloat(total);
                    $('#basket_items').append(
                        "<tr id='"+i+"' basket='"+result[i][1]+"' value='"+result[i][0].id+"'"+"quantity='"+result[i][2]+"' price='"+total+"'>"+
                        "<td>"+
                           "<div class='d-table'>"+
                              "<div class='d-block d-lg-table-cell'>"+
                                 "<a class='shopping-product' href='product-details.php?k="+result[i][0].id+"'"+"><img src='"+"images/img-list/"+result[i][0].imgFolder+"/"+result[i][0].FK_product_id_inv_prod+"-thumb.jpg'"+"></a>"+
                              "</div>"+
                              "<div class='d-block d-lg-table-cell'>"+
                                 "<h4 class='darkcolor product-name'><a href='product-details.php?k="+result[i][0].id+"'>"+result[i][0].brand+"</a></h4>"+
                                 "<p>"+result[i][0].name+"</p>"+
                              "</div>"+
                           "</div>"+
                        "</td>"+
                        "<td>"+
                           "<h4 class='default-color text-center'>"+price+"</h4>"+
                        "</td>"+
                        "<td class='text-center'>"+
                           "<div class='quote text-center'>"+
                              "<h4 id='basket_item_quantity' class='default-color text-center'>"+result[i][2]+"</h4>"+
                           "</div>"+
                        "</td>"+
                        "<td>"+
                           "<h4 id='basket_item_price' class='default-color text-center'>"+total+"</h4>"+
                        "</td>"+
                        "<td class='text-center'><a class='btn-close' value='"+result[i][1]+"' id='delete_basket_items'><i class='fas fa-times'></i></a></td>"+
                     "</tr>"
                    );
                }
                $('#total_order_price strong').text("$"+total_price);
                $('#total_order_shipping strong').text("$9.99"
                );
                if(total_price == 0.00)
                {
                    $('#order_shipping_info').removeClass().addClass('row d-none');
                }

            }
        },
    });
}

//delete items in the basket

$(document).on("click", "#delete_basket_items", function(event) {
    var basket = $(this).attr('value');
    $.ajax({
        url: 'process.php',
        type: 'post',
        data: {
            request_name: 'delete basket items',
            _token: $('#_token').val(),
            basket_name : basket
        },
        beforeSend: function () {

        },
        success: function (response) {
            if(response !== "server error")
            {
                location.reload();
            }
        
        },
    });
    
});

//shipping prices option change
$(document).on("click", "#delivery_options input", function(event) {
    var option = $(this).attr('value');
    $('#total_order_shipping strong').text("$"+option);
    $('#total_order_toPay strong').text("");
    $('#confirm_order_btn').removeClass().addClass("button btn-dark margin10 d-none");
});
/* Calculate total amount*/
$('#calculate_shipping_btn').on('click',function(){
    total_price =Number($("#total_order_price strong").text().replace(/[^0-9.-]+/g,""));
    total_tax =Number($("#total_order_tax strong").text().replace(/[^0-9.-]+/g,""));
    total_shipping =Number($('#total_order_shipping strong').text().replace(/[^0-9.-]+/g,""));
    sum = (total_price + total_tax + total_shipping).toFixed(2);

    $('#total_order_toPay strong').text("$"+sum);
    $('#confirm_order_btn').removeClass().addClass("button btn-dark margin10");
    //set total amount for payment
    $('#amount_for_payment').val(sum).text(sum);

})

//alert user to set at least one delivery addresss to place an order

if($('#delivery_addresses option').length <2)
{
    $('#delivery_address_warning').removeClass()
    .addClass('text-danger ');
}

//select delivery address and enable calculate shipping btn

$('#delivery_addresses').on('change',function(){
    //remove confirm order btn
    $('#confirm_order_btn').removeClass().addClass("button btn-dark margin10 d-none");
    //remove calculate shippoing btn
    $('#calculate_shipping_btn').removeClass()
        .addClass('button btn-primary mt-3 d-none');
    $('#selected_delivery_address').empty()
    .append($('#delivery_addresses option:selected').val());
    if($('#delivery_addresses option:selected').val() !== 'Please select a delivery address')
    {
        $('#calculate_shipping_btn').removeClass()
        .addClass('button btn-primary mt-3');
    }
})
$(document).on("click", "#confirm_order_btn", function(event) {
    saveOrder();
});

//save order info and delete shopping basket then ask to proceed to payment
function saveOrder()
{
    //prepare basket items 
    var basket_items= [];
    for(i=0; i<$('#basket_items').children().length;i++)
    {
        basket_items[i]= [
        $('#basket_items tr')[i].attributes[1].value,
        $('#basket_items tr')[i].attributes[2].value,
        $('#basket_items tr')[i].attributes[3].value,
        $('#basket_items tr')[i].attributes[4].value];
    }
    basket_items =JSON.stringify(basket_items);
    $.ajax({
        url: 'process.php',
        type: 'post',
        data: {
            request_name: 'save order',
            _token: $('#_token').val(),
            user_id: $('#recipient_user_id').val(),
            address_id:$('#delivery_addresses option:selected').attr('id'),
            delivery_price: $('#total_order_shipping strong').text().replace("$",""),
            total_price:$('#total_order_toPay').text().replace("$",""),
            order_items:basket_items

        },
        beforeSend: function () {
                        // Show preloader
            $('.loader').css('display', 'block');
        },
        success: function (response) {
            $('.loader').css('display', 'none');
            result = JSON.parse(response);
            switch(result[0])
            {
                case 'order save success':
                    $('#order_process_error').text("");
                    $('#order_id_for_payment').val(result[1]);
                    $('#paymentModal').modal({backdrop: 'static', keyboard: false});
                break;

                case 'order save failed':
                    $('#order_process_error').text('Order can not be processed !');
                break;

                case 'order save failed-inventory or cart object':
                    $('#order_process_error').text('Order can not be processed now! Please try again later');
                break;

                default:
                    break;
            }
        },
    });
}


//refresh the page after clicking countinue shopping
$('#paymentModal #close').on('click',function(){
    location.reload();
})

// get all orders and payment for a user

function getAllOrders(){
    $.ajax({
        url: 'process.php',
        type: 'post',
        data: {
            request_name: 'get all orders',
            _token: $('#_token').val()
        },
        beforeSend: function () {
        },
        success: function (response) {

            result = JSON.parse(response);
            
            switch(result[0])
            {
                case true:
                    for(i=0; i<result[1].length; i++)
                    {
                        payment_method = '';
                        payment_reference ='';
                        if((result[1][i].status)== '1')
                        {
                            for(j=0; j<result[2].length; j++)
                            {
                                if((result[2][j].FK_order_id_pay_order)==(result[1][i].id))
                                {
                                    payment_method = (result[2][j].payment_method)+'****'+(result[2][j].last_four_digit);  
                                    payment_reference = result[2][j].payment_ref;
                                }
                            }
                        }
                    $('#order_history').append(
                        "<tr id='"+result[1][i].id+"'>"+ 
                            "<td class='p-2'>"+
                                "<h4 class='default-color text-center'>"+result[1][i].id+"</h4>"+
                            "</td>"+
                            "<td class='text-center p-2'>"+
                                "<h4 class='default-color text-center'>"+result[1][i].total_price+"</h4>"+
                            "</td>"+
                            "<td class='p-2'>"+
                                "<h4 class='default-color text-center'>"+result[1][i].created_at+"</h4>"+                             
                            "</td>"+
                            "<td class='p-2'>"+
                                ((result[1][i].status)=='1'?"<h4 class='default-color text-center'>"+payment_method+"</h4>":
                                "<button id='"+result[1][i].id+"' value='"+result[1][i].total_price +"'type='button' class='button btn-primary payBtn'>Pay</button>")+
                            "</td>"+
                            "<td class='p-2'>"+
                                "<h4 class='default-color text-center'>"+payment_reference+"</h4>"+
                            "</td>"+
                            "<td class='p-2'>"+
                            "<h4 class='"+((result[1][i].status)=='1'?'text-center text-success':'text-center text-danger')+"'>"+((result[1][i].status)=='1'?"Complete":"Pending")+"</h4>"+                                    
                            "</td>"+
                            "<td class='p-2'>"+
                                "<button id='"+result[1][i].id+"' type='button' class='button btn-primary detailsBtn'>Details</button>"+
                            "</td>"+
                        "</tr>"
                    );
                    }
                break;

                case false:
                break;

                default:
                    break;
            }
        },
    });

}


//open payment modal to pay pending orders
$(document).on("click", "#order_history button.payBtn", function(event) {
    $('#paymentModal').modal({backdrop: 'static', keyboard: false});
    $("#amount_for_payment").val(this.value);
    $("#order_id_for_payment").val(this.id);
})

//open order details modal in order history

$(document).on("click", "#order_history button.detailsBtn", function(event) {
    $('#order_details_modal').modal();
    order_id = this.id;
    $.ajax({
        url: 'process.php',
        type: 'post',
        data: {
            request_name: 'get order details',
            _token: $('#_token').val(),
            order_id: order_id
        },
        beforeSend: function () {
        },
        success: function (response) {

            result = JSON.parse(response);
            switch(result[0])
            {
                case true:
                    numOfItems = result[1].length;
                    $('#order_details_modal #order_items').empty();
                    $('#order_details_modal #order_id').text(order_id);
                    for(i=0; i<numOfItems;i++)
                    {
                        $('#order_details_modal #order_items').append(
                            "<div class='row border-top mt-2'>"+
                                "<div class='col-9'>"+
                                    "<h4 class='mt-2'>"+result[1][i].name+"</h4>"+
                                    "<h4 class='mt-2 font-light'>Quanity : <span>"+result[1][i].quantity+"</span></h4>"+
                                    "<h4 class='mt-2 font-light'>Color : <span>"+result[1][i].color+"</span></h4>"+
                                    "<h4 class='mt-2 font-light'>Size : <span>"+result[1][i].size+"</span></h4>"+
                                "</div>"+
                                "<div class='col-3'>"+
                                    "<img src='images/img-list/"+result[1][i].imgFolder+"/"+result[1][i].id+"-thumb.jpg'"+ "class='w-100'>"+
                                "</div>"+
                            "</div>"
                        );
                    }
                    $('#order_details_modal #order_items').append(
                        "<div class='row border-top mt-2'>"+
                            "<div class='col-6'>"+
                                "<h4 class='mt-2'>Delivery price: </h4>"+
                                "<h4 class='mt-2'>Total price: </h4>"+
                            "</div>"+
                            "<div class='col-6'>"+
                                "<h4 class='mt-2 text-right'>"+result[1][0].delivery_price+"</h4>"+
                                "<h4 class='mt-2 text-right'>"+result[1][0].total_price+"</h4>"+
                            "</div>"+
                        "</div>"
                    );
                break;

                case false:
                    $('#order_details_modal #order_items').empty().append('<h4 class="text-danger"> Unable to fetch order information </h4>');
                break;

                default:
                    break;
            }
        },
    });
})

//update contact preferences
$(document).on("click", "#contact_pref_options input", function(event) {
    $('#update_contact_pref_btn').attr('disabled',false);
});

$('#update_contact_pref_btn').on('click', function(){
    $.ajax({
        url: 'process.php',
        type: 'post',
        data: {
            request_name: 'change contact preferences',
            _token: $('#_token').val(),
            contact_pref: $('#contact_pref_options input[name="contactPref"]:checked').val()
        },
        beforeSend: function () {
            // Show preloader
            $('.loader').css('display', 'block');
        },
        success: function (response) {
            $('.loader').css('display', 'none');
            result = JSON.parse(response);
            switch(result[0])
            {
                case true:
                    $("#save-contact-det-result").removeClass()
                    .addClass('text-success mt-3 float-center text-center')
                    .text('Your contact preferences updated successfully.');
                    break;
                
                case false:
                    $("#save-contact-det-result").removeClass()
                    .addClass('text-danger mt-3 float-center text-center')
                    .text('Unable to update your contact preferences !');
                    break;

                default:
                    break;
            }

        },
    });


});

//add review
                         
$('#add_review_btn').on("click",function(){
    if(
    ($('#reviewer_email').val())&&
    ($('#reviewer_comment_text').val())&&
    ($('#ratingText').text()!==('Please Select')))
        {
            $('#review_submit_result').removeClass()
            .addClass('d-none w-100 ')
            .text('');
            $.ajax({
                url: 'process.php',
                type: 'post',
                data: {
                    request_name: 'add review',
                    _token: $('#_token').val(),
                    email:$('#reviewer_email').val(),
                    text:$('#reviewer_comment_text').val(),
                    product_id:$('#product-id').val(),
                    rating_text:$('#ratingText').text()
                },
                beforeSend: function () {
                },
                success: function (response) {
                    switch(response)
                    {
                        case 'invalid parameters':
                            $('#review_submit_result').removeClass()
                            .addClass('w-100 text-danger')
                            .text('Invalid parameters submitted. please check your inputs.');
                        break;

                        case 'Database error':
                            $('#review_submit_result').removeClass()
                            .addClass('w-100 text-danger')
                            .text('Unable to submit review at the moment. Please try again later.');
                        break;
                        
                        case 'item is not ordered before':
                            $('#review_submit_result').removeClass()
                            .addClass('w-100 text-danger')
                            .text('You can only submit review for purchased items.');
                        break;
                        
                        case 'You already submitted review for this product':
                            $('#review_submit_result').removeClass()
                            .addClass('w-100 text-danger')
                            .text('You already submitted review for this product.');
                        break;

                        case 'unable to submit review':
                            $('#review_submit_result').removeClass()
                            .addClass('w-100 text-danger')
                            .text('Unable to submit review at the moment. Please try again later.');
                        break;

                        case 'success':
                            $('#review_submit_result').removeClass()
                            .addClass('w-100 text-success')
                            .text('Your review has been submitted successfully.');
                        break;
                    }        
                },
            });
        }
        else
        {
            $('#review_submit_result').removeClass()
            .addClass('text-danger w-100 ')
            .text('Please fill out all fields !');
        }

})




