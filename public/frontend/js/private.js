$(document).ready(function() {
    if ($('.back-top').length) {
        var scrollTrigger = 300,
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('.back-top').addClass('show');
                } else {
                    $('.back-top').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('.back-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }
})
$('.slide-banner').slick({
    autoplay: false,
    arrow: true,
    dots: false,
    slidesToShow: 1,
    slidesToScroll: 1, 
    prevArrow: '',
    nextArrow: '', 
    prevArrow: '<button class="prev"><i class="fa fa-angle-left"></i> </button>',
    nextArrow: '<button class="next"><i class="fa fa-angle-right"></i> </button>',
});
$('.slide-prod .row').slick({
    autoplay: true,
    arrow: true,
    dots: false,
    slidesToShow: 5,
    slidesToScroll: 1, 
    prevArrow: '',
    nextArrow: '', 
    prevArrow: '<button class="prev"><i class="fa fa-angle-left"></i> </button>',
    nextArrow: '<button class="next"><i class="fa fa-angle-right"></i> </button>',
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
            }
        }
    ]
});

$('.slide-news .row').slick({
    autoplay: false,
    arrow: true,
    dots: false,
    slidesToShow: 3,
    slidesToScroll: 1, 
    prevArrow: '',
    nextArrow: '',
    prevArrow: '<button class="prev"><i class="fa fa-long-arrow-left"></i> </button>',
    nextArrow: '<button class="next"><i class="fa fa-long-arrow-right"></i> </button>',
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
            }
        }
    ]
});
$('.slide-part .row').slick({
    autoplay: false,
    arrow: true,
    dots: false,
    slidesToShow: 6,
    slidesToScroll: 1, 
    prevArrow: '',
    nextArrow: '',
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 6,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 3,
            }
        }
    ]
});
$('.slider-for').slick({
    autoplay: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav',
});
$('.slider-nav').slick({
    autoplay:false,
    arrow:false,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1
            }
        }
    ],
    asNavFor: '.slider-for',
    dots: false,
    centerMode: true,
    centerPadding: 0,
    focusOnSelect: true,
    prevArrow: '', 
    nextArrow: '', 
});
$(".children").click(function() {    
    $(this).parents().children('.sub-cate').toggle(200);
    $(this).toggleClass('active');  
});
$(document).ready(function(){
  $('.size input').click(function(){
    $('.size input').removeClass("active");
    $(this).addClass("active");
  });
});
$(function() {
  $("#price-range").slider({range: true, min: 100000, max: 10000000, values: [100000, 10000000], slide: function(event, ui) {$("#priceRange").val("$" + ui.values[0] + " - $" + ui.values[1]);}
  });
  $("#priceRange").val($("#price-range").slider("values", 0) + " - " + $("#price-range").slider("values", 1));
  $("#mpg-range").slider({range: true, min: 10, max: 100, values: [0, 100], slide: function(event, ui) {$("#MPGRange").val(ui.values[0] + " - " + ui.values[1]);}
  });
  $("#MPGRange").val($("#mpg-range").slider("values", 0) + " - " + $("#mpg-range").slider("values", 1));
  $("#mileage-range").slider({range: true, min: 0, max: 200000, values: [0, 200000], slide: function(event, ui) {$("#mileageRange").val(ui.values[0] + " - " + ui.values[1]);}
  });
  $("#mileageRange").val($("#mileage-range").slider("values", 0) + " - " + $("#mileage-range").slider("values", 1));
});
var numberSpinner = (function() {
  $('.number-spinner>.ns-btn>a').click(function() {
    var btn = $(this),
      oldValue = btn.closest('.number-spinner').find('input').val().trim(),
      newVal = 0;
    if (btn.attr('data-dir') === 'up') {
      newVal = parseInt(oldValue) + 1;
    } else {
      if (oldValue > 1) {
        newVal = parseInt(oldValue) - 1;
      } else {
        newVal = 1;
      }
    }
    btn.closest('.number-spinner').find('input').val(newVal);
  });
  $('.number-spinner>input').keypress(function(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
    }
    return true;
  });
})();
jQuery(document).ready(function( $ ) {
  $("#menu").mmenu({
     "extensions": [
        "fx-menu-zoom"
     ],
     "counters": true
  });
});



var sort_fields = 'date';
var sort_type = 'desc';

jQuery(document).ready(function($) {
    $('.filter-check-box').click(function(event) {
        setParam($(this));
        filterString = getParam();
        param = { 
            filterString : filterString,
            sort_fields : sort_fields,
            sort_type: sort_type,
        }
        getAjaxProducts(param);
    });

    $('#display_fields').change(function(event) {
        display_fields = $(this).find(':selected').data('fields')
        display_count = $(this).val();
        filterString = getParam();
        param = { 
            filterString : filterString,
            display_count : display_count,
            sort_fields : sort_fields,
            sort_type: sort_type,
        }
        getAjaxProducts(param);
    });
});
function getAjaxProducts(param) {
    $.ajax({
        url: window.location.origin + '/filter-products',
        type: 'get',
        data: param,
    })
    .done(function(data) {
        if(data != ''){
            $('#list-products').html(data);
        }
    })
}
function setParam(el) {
    idInput = el.data('id');
    type = el.data('type');
    var selected = [];
    valueInput = $('#'+idInput);
    $('.filter-check-box.'+type).each(function() {
        if ($(this).is(":checked")) {
            selected.push($(this).val());
        }
    });
    valueInput.val(selected.toString());
}
function getParam() {
    string = '';
    $('.input-param').each(function() {
        var param = ($(this)).val();
        if (param.length > 0) {
            var type = $(this).data('type');
            string = string+type+':'+param+'&';
        }
    });
    return string.substring(0, string.length - 1);
}




