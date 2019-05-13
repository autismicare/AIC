$('#myCarousel').one('slide.bs.carousel', function (e) {
    e.preventDefault();
    $(this).carousel('pause');
    $('#myButton').text('Cycle')
});