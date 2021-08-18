$(document).ready(function () {
    try {
        var menuLinks = $('.dropdown-item');
        var headerData = $('.promo').attr('data-name');
        var title = $('title');
        var links = $('.nav-link');
        var header = $('.promo__header');

        $('.overlay-loader').fadeOut(1000);

        header.fadeTo(3000, 1);

        // Меняем title
        title.text(headerData[0].toUpperCase() + headerData.slice(1))

        // Устанавливаем куки по которому будем ориентироваться при запросе с БД
        menuLinks.on('click', function (e) {
            document.cookie = `planet=${$(this).attr('id')}; path=/; expires=Tue, 19 Jan 2038 03:14:07 GMT`;
        })

        // Добавляем/удаляем класс active в меню
        links.each(function () {
            if ($(this).attr('data-name') === title.text().toLowerCase()) {
                $(this).addClass('active');
            } else {
                $(this).removeClass('active');
            }
        })


        //AJAX вывод новости подробнее
        function reboot() {
            document.location.reload()
        }


        var btnsMoreNews = $('.more-news');

        btnsMoreNews.on('click', function () {

            $.ajax({
                type: "GET",
                url: "handler.php",
                data: `id=${$(this).attr('id')}`,
                success: function (response) {
                    $('.result').html(response);
                    $('.back').on('click', function (e) {
                        reboot()
                    });
                }
            });
        })

        //Flex Slider
        $('.flexslider').flexslider({
            animation: "slide",

        });


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
    } catch (e) {
        console.error('Ошибка', e);
    }

})
