$(document).ready(function() {
    $(".table-links").css({
        'width': ($(".table-links-wrap").width() + 'px')
    });
    setInterval(function () {
        $(".table-links").css({
            'width': ($(".table-links-wrap").width() + 'px')
        });
    },100);
});