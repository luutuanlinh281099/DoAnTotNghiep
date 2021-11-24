$(function() {
    $('.checkbox_all').on('click', function() {
        $(this).parents('').find('.checkbox_wrapper').prop('checked', $(this).prop('checked'));
    });
});