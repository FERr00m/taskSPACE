$(document).ready(function () {
    try {
        var menuLinks = $('.dropdown-item');
        var headerData = $('.promo').attr('data-name');
        var title = $('title');
        var links = $('.nav-link');
        var header = $('.promo__header');

        //Скрываем лоадер после загрузки DOM
        $('.overlay-loader').fadeOut(1000);
        header.fadeTo(3000, 1);
        //===============

        // Меняем title
        title.text(headerData[0].toUpperCase() + headerData.slice(1))
        //=============

        // Устанавливаем куки по которому будем ориентироваться при запросе с БД
        menuLinks.on('click', function (e) {
            document.cookie = `planet=${$(this).attr('id')}; path=/; expires=Tue, 19 Jan 2038 03:14:07 GMT`;
        })
        //============

        //News Details кнопка назад=====
        $('.back').on('click', function () {
            history.go(-1);
        })
        //====================

        //Flex Slider========
        $('.flexslider').flexslider({
            animation: "slide",

        });
        //=============

        //Удаление/добавление класса в навигации для правильного отображения для мобильных
        var divNav = $('#wrapper-div-nav');
        if ($('.navbar-toggler').css('display') !== 'none') {
            divNav.removeClass('btn-group');
        } else {
            divNav.addClass('btn-group');
        }
        $(window).resize(function() {

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

    } catch (e) {
        console.error('Ошибка', e);
    }

})
