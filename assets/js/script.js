$(document).ready(function(){

    // set active for side navigation
    $('.sidenav a').on('click', function(){
        $('.sidenav a').removeClass('side_active');
        $(this).addClass('side_active');
    });

    // set navigation sticky
    $(document).scroll(function(){
        var cor = $(this).scrollTop();
        console.log("coordinate", cor);
        if(cor > 300 ){
            $('.navbar, .backtoTop').css({
                'position' : 'fixed'
            });
           
        } else {
            $('.navbar, .backtoTop').css({
                'position' : 'initial'
            });
        }
    });

    // back to top
    $('.backtoTop').on('click', function() {
        $('html, body').animate({scrollTop : 0},800);
		return false;
    });

});