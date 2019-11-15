$('.counter').countUp();
// Truncating Text
$(function() {
    $(".truncate").succinct({
        size: 100,
    });
    $(".truncate-long").succinct({
        size: 150,
    })
})