$(window, document, undefined).ready(function() {

    $('.group input').blur(function() {
        var $this = $(this);
        if ($this.val())
            $this.addClass('used');
        else
            $this.removeClass('used');
    });
});

//dropdown list
$('body').click(function() {
    if ($('.custom-select .drop-down-list').is(':visible')) {
        $('.custom-select').parent().removeClass('focus');
    }
    $('.custom-select .drop-down-list:visible').slideUp();
});

$('.custom-select .active-list').click(function() {
    $(this).parent().parent().addClass('focus');
    $(this).parent().find('.drop-down-list').stop(true, true).delay(10).slideToggle(300);
});

$('.custom-select .drop-down-list li').click(function() {
    var listParent = $(this).parent().parent();
    //listParent.find('.active-list').trigger("click");
    listParent.parent('.select-block').removeClass('focus').addClass('added');
    listParent.find('.active-list').text($(this).text());
    listParent.find('input.list-field').attr('value', $(this).text());
});