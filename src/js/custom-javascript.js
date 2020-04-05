$('.js--accessibility__font__size li').click(function( ev ) {

    var selectedClass = 'current';

    // Remove current class from the list
    if( $(this).parent().find('li a').hasClass( selectedClass ) ) {
        $(this).parent().find('li a').removeClass( selectedClass );
    }

    // Add current class to clicked element
    $(this).find('a').addClass( selectedClass );

    // Add the font class to the wrapper
    $('body').attr('id', $(this).attr('id'));

    // Set the cookie for the clicked item
    // if (Cookies.enabled) {
    //     Cookies.set('font_size', $(this).attr('id'));
    // }

    ev.preventDefault();

});