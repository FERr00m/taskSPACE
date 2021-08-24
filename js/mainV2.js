$(document).ready(function () {
    try {
        var headerData = $('.promo').attr('data-name');
        var title = $('title');
        var header = $('.promo__header');

        //Скрываем лоадер после загрузки DOM
        $('.overlay-loader').fadeOut(1000);
        header.fadeTo(3000, 1);
        //===============

        // Меняем title
        title.text(headerData[0].toUpperCase() + headerData.slice(1))
        //=============

        //News Details кнопка назад=====
        $('.back').on('click', function () {
            history.go(-1);
        })
        //====================

        //Flex Slider========
        // $('.flexslider').flexslider({
        //     animation: "slide",

        // });
        //=============

        //Удаление/добавление класса в навигации для правильного отображения для мобильных
        var divNav = $('#wrapper-div-nav');
        if ($('.navbar-toggler').css('display') !== 'none') {
            divNav.removeClass('btn-group');
        } else {
            divNav.addClass('btn-group');
        }
        $(window).on('resize', function() {
            if ($('.navbar-toggler').css('display') !== 'none') {
                divNav.removeClass('btn-group');
            } else {
                divNav.addClass('btn-group');
            }
        })
        //================

        //кнопка прокрутки
        $(window).scroll(function() {
            if ($(this).scrollTop() > 400) {
                $('.pageup').fadeIn('slow');
            } else {
                $('.pageup').fadeOut('slow');
            }
        });

        $('a.pageup').click(function(){
            const _href = $(this).attr("href");
            $("html, body").animate({scrollTop: ($(_href).offset() + 90).top+"px"});
            return false;
        });
        //==================

        //Popup cookies
        var popupCookie = $("#popup-cookie");

        function popup_hide(popup) {
            popup.animate({bottom: "-550px"}, 1000, function(){popup.fadeOut(1000);});
        }

        function popup_show(popup){
            popup.fadeIn(1000);
            var popUpHeight = popup.height() / 2 + 1;
            popup.animate({bottom: `-${popUpHeight}px`}, 1000);
            $('.popup-cookie-btn').on('click', function(){
                $.cookie('visit', true, { expires: 7, path: '/' });
                popup_hide(popup)
            });
            $(window).on('resize', function() {
                var popUpHeight = popup.height() / 2 + 1;
                popup.css({
                    'bottom': `-${popUpHeight}px`
                });
            })

        }

        if ( $.cookie('visit') == undefined) {
            popup_show(popupCookie);
        }

        //==================

        //Сортировка новостей
        $('#sort-news-select').on('change', function() {
            $.ajax({
                type: "get",
                url: "../news/sorted.php",
                data: `sort=${$(this).val()}`,
                beforeSend: function() {
                    $('.loader-news').fadeIn();
                },
                success: function (response) {
                    $('.loader-news').fadeOut('slow', function () {
                        $('.news-list__items').html(response);
                    });
                },
                error: function (error) {
                    console.error(error);
                }
            });
        });
        //==================


    } catch (e) {
        console.error('Ошибка', e);
    }

})
