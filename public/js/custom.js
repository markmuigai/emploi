$(function() {
    $(document).scroll(function() {
        var $nav = $(".navbar-fixed-top");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
    $(document).scroll(function() {
        var $logo = $(".navbar-brand");
        $logo.remove($(this).scrollTop() > $.height());
    });
});