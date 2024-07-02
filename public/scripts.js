jQuery(document).ready(function ($) {
    $('.fsbw-main-icon').on('click', function () {
        $('#fsbw-buttons').toggleClass('_show');
    });

    $(document).on('click', function (event) {
        if (!$(event.target).closest('#fsbw-container').length) {
            $('#fsbw-buttons').removeClass('_show');
        }
    });
});
