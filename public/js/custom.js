//$('.counter').countUp();
// Truncating Text
$(function() {
    $(".truncate-short").succinct({
        size: 30,
    });
    $(".truncate").succinct({
        size: 100,
    });
    $(".truncate-long").succinct({
        size: 150,
    })
})