jQuery('img.svg').each(function(){
    var $img = jQuery(this);
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');

    jQuery.get(imgURL, function(data) {
        // Get the SVG tag, ignore the rest
        var $svg = jQuery(data).find('svg');

        // Add replaced image's ID to the new SVG
        if(typeof imgID !== 'undefined') {
            $svg = $svg.attr('id', imgID);
        }
        // Add replaced image's classes to the new SVG
        if(typeof imgClass !== 'undefined') {
            $svg = $svg.attr('class', imgClass+' replaced-svg');
        }

        // Remove any invalid XML tags as per http://validator.w3.org
        $svg = $svg.removeAttr('xmlns:a');

        // Replace image with new SVG
        $img.replaceWith($svg);

    }, 'xml');

});
$('#btn-hamburger').on('click',(e)=> {
    console.log($("this"));
    e.preventDefault();
    $('#btn-hamburger').toggleClass("animeOpenClose");
    $('.menu').toggleClass("active");
})

let baivietlq = $('.baivietlienquan').offset().top;
window.addEventListener("scroll", function(event) {
    let flag = false;
    var top = this.scrollY;
    if(baivietlq <= top && flag == false && $(window).width() > 767){
        let width = $('.baivietlienquan').width();
        $('.baivietlienquan').addClass('fix');
        $('.fix').width(width);
        flag = true;
    }else{
        $('.baivietlienquan').removeClass('fix');
        flag = false;
        $('.baivietlienquan').width('inherit');
    }
}, false);
$( document ).ready(function() {
    console.log($('.baivietlienquan').width());
    $('.fix').width($('.baivietlienquan').width());
});