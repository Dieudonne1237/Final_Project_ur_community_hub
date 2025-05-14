$(document).ready(function() {
    window.onscroll = function() {
        myFunction();
        scrollFunction()
    };

    var header = document.getElementById("myHeader");
    var mybutton = document.getElementById("backTop");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }

    function scrollFunction() {
        if (document.body.scrollTop > 250 || document.documentElement.scrollTop > 250) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

});

$(document).ready(function() {
    $('.carosel.partner').each(function() {
        $(this).slick({
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 5,
            slidesToScroll: 2,
            speed: 2000,
            dots: false,
            arrows: false,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                }
            ]
        });
    });
});

$(document).ready(function() {
    $('.carosel.testi').each(function() {
        $(this).slick({
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 2000,
            dots: false,
            arrows: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });
    });
});

$(document).ready(function() {
    $('.carosel.casestudy').each(function() {
        $(this).slick({
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 3,
            slidesToScroll: 2,
            speed: 2000,
            dots: true,
            arrows: false,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });
    });
});

$(document).ready(function() {

    $(".filter-button").click(function() {
        var value = $(this).attr('data-filter');

        if (value == "all") {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        } else {
            $(".filter").not('.' + value).hide('3000');
            $('.filter').filter('.' + value).show('3000');
        }

        if ($(".filter-button").removeClass("active")) {
            $(this).removeClass("active");
        }
        $(this).addClass("active");

    });


});



// contact form
function ValidateEmail(email) {
    // alert(1);
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return expr.test(email);
};
// $("#demo").live("click", function () {
$("#demoContact").click(function() {
    if (!ValidateEmail($("#txtcontact").val())) {
        $("#error").addClass("error-msg-contact-display");
    } else {
        $("#error").removeClass("error-msg-contact-display");
        // $( "#success" ).addClass("success-msg-contact-display");
        $("#success").addClass("success-msg-contact-display").delay(3000).queue(function() {
            $(this).removeClass("success-msg-contact-display").dequeue();
        });
    }

});


// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

// page loader
$(window).on('load', function() {
    $('#loading').hide();
})