<a class="js-go-to u-go-to" href="#"
   data-position='{"bottom": 15, "right": 15 }'
   data-type="fixed"
   data-offset-top="400"
   data-compensation="#header"
   data-show-effect="slideInUp"
   data-hide-effect="slideOutDown">
    <span class="fas fa-arrow-up u-go-to__inner"></span>
</a>

<script src="/frontend/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="/frontend/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="/frontend/assets/vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="/frontend/assets/vendor/bootstrap/bootstrap.min.js"></script>
<script src="/frontend/assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>

<script src="/frontend/assets/vendor/appear.js"></script>
<script src="/frontend/assets/vendor/jquery.countdown.min.js"></script>
<script src="/frontend/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/frontend/assets/vendor/fancybox/jquery.fancybox.min.js"></script>
<script src="/frontend/assets/vendor/slick-carousel/slick/slick.js"></script>
<script src="/frontend/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

<!-- JS Electro -->
<script src="/frontend/assets/js/hs.core.js"></script>
<script src="/frontend/assets/js/components/hs.countdown.js"></script>
<script src="/frontend/assets/js/components/hs.header.js"></script>
<script src="/frontend/assets/js/components/hs.hamburgers.js"></script>
<script src="/frontend/assets/js/components/hs.unfold.js"></script>
<script src="/frontend/assets/js/components/hs.focus-state.js"></script>
<script src="/frontend/assets/js/components/hs.malihu-scrollbar.js"></script>
<script src="/frontend/assets/js/components/hs.fancybox.js"></script>
<script src="/frontend/assets/js/components/hs.onscroll-animation.js"></script>
<script src="/frontend/assets/js/components/hs.slick-carousel.js"></script>
<script src="/frontend/assets/js/components/hs.show-animation.js"></script>
<script src="/frontend/assets/js/components/hs.go-to.js"></script>
<script src="/frontend/assets/js/components/hs.selectpicker.js"></script>
<script src="/frontend/assets/js/components/hs.quantity-counter.js"></script>

<livewire:scripts />
<script>


    $(document).on('ready', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#header'));

        // initialization of animation
        $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
            afterOpen: function () {
                $(this).find('input[type="search"]').focus();
            }
        });

        // initialization of popups
        $.HSCore.components.HSFancyBox.init('.js-fancybox');
        $.HSCore.components.HSQantityCounter.init('.js-quantity');

        // initialization of countdowns
        var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
            yearsElSelector: '.js-cd-years',
            monthsElSelector: '.js-cd-months',
            daysElSelector: '.js-cd-days',
            hoursElSelector: '.js-cd-hours',
            minutesElSelector: '.js-cd-minutes',
            secondsElSelector: '.js-cd-seconds'
        });

        // initialization of malihu scrollbar
        $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

        // initialization of forms
        $.HSCore.components.HSFocusState.init();

        // initialization of show animations
        $.HSCore.components.HSShowAnimation.init('.js-animation-link');

        // initialization of fancybox
        $.HSCore.components.HSFancyBox.init('.js-fancybox');

        // initialization of slick carousel
        $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of hamburgers
        $.HSCore.components.HSHamburgers.init('#hamburgerTrigger');

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
            beforeClose: function () {
                $('#hamburgerTrigger').removeClass('is-active');
            },
            afterClose: function() {
                $('#headerSidebarList .collapse.show').collapse('hide');
            }
        });

        $('#headerSidebarList [data-toggle="collapse"]').on('click', function (e) {
            e.preventDefault();

            var target = $(this).data('target');

            if($(this).attr('aria-expanded') === "true") {
                $(target).collapse('hide');
            } else {
                $(target).collapse('show');
            }
        });

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

        // initialization of select picker
        $.HSCore.components.HSSelectPicker.init('.js-select');
    });
</script>
