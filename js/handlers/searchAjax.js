'use strict';
$('#search').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        type: "get",
        url: "search.php",
        data: `query=${$(this[0]).val()}`,
        beforeSend: function() {
            $('.loader-search').fadeIn();
        },
        success: function (response) {
            if (response.length > 2) {
                $('.loader-search').fadeOut('slow', function () {
                    $('#result').html(response);
                });
            } else {
                $('.loader-search').fadeOut('slow', function () {
                    $('#result').html('<p style="color: #fc3d21;">Ничего не найдено. Попробуйте изменить запрос.</p>');
                });
            }
        },
        error: function (error) {
            console.error(error);
        }
    });
})
