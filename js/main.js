$(document).ready(function () {
    try {
        var menuLinks = $('.dropdown-item');
        var header = $('.promo__header');
        var headerData = $('.promo').attr('data-name');
        var title = $('title');
        var links = $('.nav-link');

        header.fadeTo(2000, 1);

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
    } catch (e) {
        console.error('Ошибка', e);
    }

})

