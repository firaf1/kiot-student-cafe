var THEMEIM = THEMEIM || {};

(function($) {

  /*!----------------------------------------------
      # This beautiful code written with heart
      # by Sonia Shurmi <>
      # In Dhaka, BD at the WD IT workstation.
      ---------------------------------------------*/
  // USE STRICT
  "use strict";

  THEMEIM.initialize = {
    init: function() {
      THEMEIM.initialize.general();
      THEMEIM.initialize.svgconvert();
      THEMEIM.initialize.slickslider();
      THEMEIM.initialize.countDown();
      THEMEIM.initialize.sectionBackground();
      THEMEIM.initialize.masonry();
      THEMEIM.initialize.customaudio();
      THEMEIM.initialize.vegas();
      THEMEIM.initialize.waypoint();
      THEMEIM.initialize.gmap();
      THEMEIM.initialize.typeJs();
      THEMEIM.initialize.alloffcanvas();
    },

    /*========================================================*/
    /*=           all small codes           =*/
    /*========================================================*/
    general: function() {
      //Video Play With Poster
      $('.youtube-wrapper').on('click', function(event) {
        event.preventDefault();
        var fr = $(this).find('iframe');
        var fadr = $(this).find('iframe').attr('src');
        var fuadr = fadr + '?autoplay=1';

        $(this).toggleClass('reveal');
        fr.attr('src', fuadr);
        console.log(fadr);
      });

      //back to top
      var backtotop = $(".backtotop");

      var windo = $(window),
        HtmlBody = $('html, body');

      backtotop.on('click', function() {
        HtmlBody.animate({
          scrollTop: 0
        }, 1500);
      });

      // average color
      $('.js-fillcolor').fillColor();


      // Schedule tab details flip

      $(".schedule-btn").on("click", function() {
        $(this).parent().toggleClass('active');
        $(this).toggleClass('active');
      });


      $(".program-schedule-all").mCustomScrollbar({
        theme: "rounded"
      });



      // Pricing table details show and hide toggle class
      //
      $('.package-details-list-wrapper span').on('click', function(e) {
        $(this).parent().toggleClass('active');
      });

      //cart item increase decrease
      $(".minus").on("click", function() {
        var input = $(this).siblings(".cart__quantity-selector"),
          qty = parseInt(input.val(), 10);

        if (qty > 1) {
          input.val(qty - 1)
        }

      });

      $(".plus").on("click", function() {
        var input = $(this).siblings(".cart__quantity-selector"),
          qty = parseInt(input.val(), 10);

        input.val(qty + 1)

      });

      //AOS animation init

      AOS.init({
        once: true
      });


      // Event list isotope

      var $grid = $('.list-item').isotope({
        // options
        itemSelector: '.single-filter-event',
        stagger: 30,
      });



      $('.event-list-filter-btn .filter').on('click', function() {
        $('.event-list-filter-btn .filter').removeClass('active');
        $(this).addClass('active');
      });


      $('.event-list-filter-btn').on('click', 'li', function() {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({
          filter: filterValue
        });
      });



      // Gallery isotope


      $('.gallery-item-wrapper').imagesLoaded(function() {

        var $grid = $('.single-gallery-items').isotope({
          // options
          itemSelector: '.single-gallery'
        });




        $('.gallery-filter-btn .filter').on('click', function() {
          $('.gallery-filter-btn .filter').removeClass('active');
          $(this).addClass('active');
        });


        $('.gallery-filter-btn').on('click', 'li', function() {
          var filterValue = $(this).attr('data-filter');
          $grid.isotope({
            filter: filterValue
          });
        });

      });


      // venobox

      $('.venobox').venobox();

      // Mobile  menu


      $('#dl-menu').dlmenu();


      // Search open on click

      $('.open-search').on('click', function() {

        $('.search-fullwidth').toggleClass('open');
        $('.close-search').on('click', function() {
          $('.search-fullwidth').removeClass('open');

        });

      });


    },

    /*========================================================*/
    /*=           All popup          =*/
    /*========================================================*/
    alloffcanvas: function() {

      // Offcanvus menu trigger
      $('.hamburger').on('click', function(e) {
        e.preventDefault();
        var mask = '<div class="mask-overlay">';

        $('.off-canvus-menu').addClass('open');
        $(mask).hide().appendTo('body').fadeIn('fast');
        $('.mask-overlay, .close-offcanvus').on('click', function() {
          $('.off-canvus-menu').removeClass('open');
          $('.mask-overlay').remove();
        });
      });

      // wc cart step show hide
      $('.wc-billing-step').hide();
      $('.wc-billing-step').each(function(i, el) {
        if (i == 0) {
          $(this).show();
        }
      });

      $('.im-cart-btn,.woocommerce-billing-list li a').on('click', function(e) {
        e.preventDefault;
        var $this = $(this),
          nextItem = $this.attr('href'),
          allStep = $('.wc-billing-step');
        allStep.hide();
        $(nextItem).fadeIn(1000);

        if ($(".im-cart-btn").attr('href')) {
          if ($(".woocommerce-billing-list li a").attr('href')) {
            $(this).parent("li").addClass('active').prev('li').addClass('back');
          }
        }
      });

      // wc cart step popup
      $('.checkout-button').on('click', function(e) {
        e.preventDefault();
        var mask = '<div class="woocommerce-billing-overlay">';

        $('.woocommerce-billing-info').addClass('open');
        $(mask).hide().appendTo('body').fadeIn('fast');
        $(".woocommerce-billing-overlay").on('click', function() {
          $('.woocommerce-billing-info').removeClass('open');
          $('.woocommerce-billing-overlay').fadeOut(2000);
        });
      });

      // wc cart step popup
      $('.price-btn').on('click', function(e) {
        e.preventDefault();
        var mask = '<div class="woocommerce-billing-overlay">';

        $('.woocommerce-billing-info').addClass('open');
        $(mask).hide().appendTo('body').fadeIn('fast');
        $(".woocommerce-billing-overlay").on('click', function() {
          $('.woocommerce-billing-info').removeClass('open');
          $('.woocommerce-billing-overlay').fadeOut(2000);
        });
      });

    },

    /*========================================================*/
    /*=           SvgConvert          =*/
    /*========================================================*/
    svgconvert: function() {
      $('img.svg').each(function() {
        var $img = $(this),
          imgID = $img.attr('id'),
          imgClass = $img.attr('class'),
          imgURL = $img.attr('src');

        $.get(imgURL, function(data) {
          // Get the SVG tag, ignore the rest
          var $svg = $(data).find('svg');

          // Add replaced image's ID to the new SVG
          if (typeof imgID !== 'undefined') {
            $svg = $svg.attr('id', imgID);
          }
          // Add replaced image's classes to the new SVG
          if (typeof imgClass !== 'undefined') {
            $svg = $svg.attr('class', imgClass);
          }

          // Remove any invalid XML tags as per http://validator.w3.org
          $svg = $svg.removeAttr('xmlns:a');

          // Replace image with new SVG
          $img.replaceWith($svg);
        }, 'xml');
      });
    },

    /*========================================================*/
    /*=           Slickslider         =*/
    /*========================================================*/
    slickslider: function() {


      $(".post-gallery-slickSlider").slick({
        autoplay: true,
        autoplaySpeed: 10000,
        speed: 900,
        slidesToShow: 1,
        slidesToScroll: 1,
        pauseOnHover: false,
        dots: false,
        pauseOnDotsHover: true,
        cssEase: 'linear',
        fade: true,
        draggable: true,
        prevArrow: '<button class="PrevArrow"><i class="fas fa-arrow-left"></i></button>',
        nextArrow: '<button class="NextArrow"><i class="fas fa-arrow-right"></i></button>',
      });

      $(".previlege-slider").slick({
        autoplay: true,
        autoplaySpeed: 10000,
        speed: 900,
        slidesToShow: 2,
        slidesToScroll: 2,
        pauseOnHover: false,
        dots: false,
        pauseOnDotsHover: true,
        cssEase: 'linear',
        draggable: true,
        prevArrow: '<button class="PrevArrow"><i class="fas fa-arrow-left"></i></button>',
        nextArrow: '<button class="NextArrow"><i class="fas fa-arrow-right"></i></button>',
        responsive: [{
          breakpoint: 450,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }]

      });

      $(".sonsers-logo-without-navigation").slick({
        autoplay: true,
        loop: true,
        autoplaySpeed: 10000,
        speed: 900,
        slidesToShow: 4,
        slidesToScroll: 4,
        pauseOnHover: false,
        dots: false,
        arrows: false,
        cssEase: 'linear',
        draggable: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });

      $(".sponser-slider-list-1").slick({
        autoplay: true,
        loop: true,
        autoplaySpeed: 10000,
        speed: 900,
        slidesToShow: 4,
        slidesToScroll: 4,
        pauseOnHover: false,
        prevArrow: '<button class="PrevArrow"><i class="fas fa-arrow-left"></i></button>',
        nextArrow: '<button class="NextArrow"><i class="fas fa-arrow-right"></i></button>',
        cssEase: 'linear',
        draggable: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,


            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });

      $(".event-goal-slider").slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        vertical: true,
        autoplaySpeed: 10000,
        speed: 900,
        autoplay: true,
        draggable: true,
        cssEase: 'linear',
        dots: true
      });

      $(".discussion-member-slider").slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        vertical: true,
        autoplaySpeed: 5000,
        speed: 900,
        autoplay: false,
        draggable: true,
        cssEase: 'linear',
        dots: false,
        focusOnSelect: true
      });

      $(".about-boxed-slider").slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplaySpeed: 5000,
        speed: 900,
        autoplay: false,
        draggable: true,
        cssEase: 'linear',
        dots: true,
        focusOnSelect: true,
        arrows: false
      });

      $(".twitter-content").slick({

        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplaySpeed: 500,
        speed: 1300,
        autoplay: true,
        draggable: false,
        arrows: false,
        //rtl: true
        //variableWidth: true
      });

      $(".staff-carousel").slick({
        autoplay: true,
        autoplaySpeed: 10000,
        speed: 900,
        slidesToShow: 3,
        slidesToScroll: 1,
        pauseOnHover: false,
        dots: true,
        pauseOnDotsHover: true,
        cssEase: 'linear',
        draggable: true,
        prevArrow: '<button class="PrevArrow"><i class="fas fa-arrow-left"></i></button>',
        nextArrow: '<button class="NextArrow"><i class="fas fa-arrow-right"></i></button>',
        responsive: [{
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]

      });

      $(".testimonial-slider-one").slick({
        autoplay: true,
        autoplaySpeed: 10000,
        speed: 900,
        slidesToShow: 1,
        slidesToScroll: 1,
        pauseOnHover: false,
        dots: true,
        pauseOnDotsHover: true,
        cssEase: 'linear',
        draggable: true,
        arrows: false,

        responsive: [{
          breakpoint: 450,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }]

      });

    },

    /*=================================*/
    /*=           Count Down          =*/
    /*=================================*/
    countDown: function() {
      $('.countdown').each(function(index, value) {
        var count_year = $(this).attr("data-count-year");
        var count_month = $(this).attr("data-count-month");
        var count_day = $(this).attr("data-count-day");
        var count_date = count_year + '/' + count_month + '/' + count_day;
        $(this).countdown(count_date, function(event) {
          $(this).html(
            event.strftime('')
          );
        });
      });
    },

    /*==========================================*/
    /*=           Section Background           =*/
    /*==========================================*/
    sectionBackground: function() {
      // Section Background Image
      $('[data-bg-image]').each(function() {
        var img = $(this).data('bg-image');
        $(this).css({
          backgroundImage: 'url(' + img + ')',
        });
      });

      //Parallax Background
      if ($(window).width() > 768) {
        $(window).on('scroll', function() {
          $('[data-parallax="image"]').each(function() {
            var actualHeight = $(this).position().top;
            var speed = $(this).data('parallax-speed');
            var reSize = actualHeight - $(window).scrollTop();
            var makeParallax = -(reSize / 2);
            var posValue = makeParallax + "px";

            $(this).css({
              backgroundPosition: '50% ' + posValue,
            });
          });
        });
      }
    },

    /*=================================*/
    /*=           Masonry          =*/
    /*=================================*/
    masonry: function() {
      var $grid = $('.grid').masonry({
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        percentPosition: true
      });

      $grid.imagesLoaded().progress(function() {
        $grid.masonry();
      });
    },


    /*=================================*/
    /*=           Type writer effect          =*/
    /*=================================*/

    typeJs: function() {
      $('.slider-heading-video').each(function() {



        var _createClass = function() {
          function defineProperties(target, props) {
            for (var i = 0; i < props.length; i++) {
              var descriptor = props[i];
              descriptor.enumerable = descriptor.enumerable || false;
              descriptor.configurable = true;
              if ("value" in descriptor) descriptor.writable = true;
              Object.defineProperty(target, descriptor.key, descriptor);
            }
          }
          return function(Constructor, protoProps, staticProps) {
            if (protoProps) defineProperties(Constructor.prototype, protoProps);
            if (staticProps) defineProperties(Constructor, staticProps);
            return Constructor;
          };
        }();

        function _classCallCheck(instance, Constructor) {
          if (!(instance instanceof Constructor)) {
            throw new TypeError("Cannot call a class as a function");
          }
        } // ——————————————————————————————————————————————————

        var
          TextScramble = function() {
            function TextScramble(el) {
              _classCallCheck(this, TextScramble);
              this.el = el;
              this.chars = '.............';
              this.update = this.update.bind(this);
            }
            _createClass(TextScramble, [{
              key: 'setText',
              value: function setText(
                newText) {
                var _this = this;
                var oldText = this.el.innerText;
                var length = Math.max(oldText.length, newText.length);
                var promise = new Promise(function(resolve) {
                  return _this.resolve = resolve;
                });
                this.queue = [];
                for (var i = 0; i < length; i++) {
                  var from = oldText[i] || '';
                  var to = newText[i] || '';
                  var start = Math.floor(Math.random() * 80);
                  var end = start + Math.floor(Math.random() * 80);
                  this.queue.push({
                    from: from,
                    to: to,
                    start: start,
                    end: end
                  });
                }
                cancelAnimationFrame(this.frameRequest);
                this.frame = 0;
                this.update();
                return promise;
              }
            }, {
              key: 'update',
              value: function update() {
                var output = '';
                var complete = 0;
                for (var i = 0, n = this.queue.length; i < n; i++) {
                  var _queue$i =
                    this.queue[i],
                    from = _queue$i.from,
                    to = _queue$i.to,
                    start = _queue$i.start,
                    end = _queue$i.end,
                    char = _queue$i.char;
                  if (this.frame >= end) {
                    complete++;
                    output += to;
                  } else if (this.frame >= start) {
                    if (!char || Math.random() < 0.28) {
                      char = this.randomChar();
                      this.queue[i].char = char;
                    }
                    output += '<span class="dud">' + char + '</span>';
                  } else {
                    output += from;
                  }
                }
                this.el.innerHTML = output;
                if (complete === this.queue.length) {
                  this.resolve();
                } else {
                  this.frameRequest = requestAnimationFrame(this.update);
                  this.frame++;
                }
              }
            }, {
              key: 'randomChar',
              value: function randomChar() {
                return this.chars[Math.floor(Math.random() * this.chars.length)];
              }
            }]);
            return TextScramble;
          }();


        // ——————————————————————————————————————————————————
        // Example
        // ——————————————————————————————————————————————————

        var phrases = [
          '',
          // '<h2>PROPHET MIRACLE TEKA</h2>',
          // '',
          // '<h2>ነብይ ሚራክል ተካ</h2>',
          // '',
          ''
        ];


        var el = document.querySelector('.text');
        var fx = new TextScramble(el);

        var counter = 0;
        var next = function next() {
          fx.setText(phrases[counter]).then(function() {
            setTimeout(next, 1000);
          });
          counter = (counter + 1) % phrases.length;
        };

        next();


      });

    },

    /*=================================*/
    /*=           Customaudio          =*/
    /*=================================*/
    customaudio: function() {
      $(".format-audio").each(function() {
        var aud = $('audio')[0];
        $('.play-pause').on('click', function() {
          if (aud.paused) {
            aud.play();
            $('.play-pause').removeClass('icon-play');
            $('.play-pause').addClass('icon-stop');
          } else {
            aud.pause();
            $('.play-pause').removeClass('icon-stop');
            $('.play-pause').addClass('icon-play');
          }
        })
        aud.ontimeupdate = function() {
          $('.progress').css('width', aud.currentTime / aud.duration * 100 + '%')
        }
        var length = aud.duration
        var totalLength = calculateTotalValue(length)
        document.getElementById("end-time").innerHTML = totalLength;


        function calculateTotalValue(length) {
          var minutes = Math.floor(length / 60),
            seconds_int = length - minutes * 60,
            seconds_str = seconds_int.toString(),
            seconds = seconds_str.substr(0, 2),
            time = minutes + ':' + seconds

          return time;
        }
      });

      // var volumeBar    = document.getElementById('volume-bar');
      // //Update the video volume
      // volumeBar.addEventListener("change", function(evt) {function displayMessage(message, canPlay) {
      //     var element = document.querySelector('#message');
      //     element.innerHTML = message;
      //     element.className = canPlay ? 'info' : 'error';
      // }
      //   player.volume = parseInt(evt.target.value) / 10;
      // });
    },

    /*========================================================*/
    /*=           Vegas Slider         =*/
    /*========================================================*/
    vegas: function() {
      $('.slider').vegas({
        overlay: true,
        transition: 'fade',
        transitionDuration: 4000,
        delay: 10000,
        color: 'red',
        animation: 'random',
        animationDuration: 20000,
        slides: [{
            src: "media/images/background/slider1.jpg"
          },
          {
            src: "media/images/background/slider2.jpg"
          },
          {
            src: "media/images/background/slider3.jpg"
          },
          {
            src: "media/images/background/slider1.jpg"
          }

        ]
      });
    },

    /*========================================================*/
    /*=           Waypoints         =*/
    /*========================================================*/
    waypoint: function() {
      //Waypoint svg animation
      var $event_member_svg = $('.event-members-bg-shape');
      $event_member_svg.waypoint(function(direction) {
        if (direction == 'down') {
          $event_member_svg.find('.arrow-line').css("animation", "dash 3s ease-in-out 0ms,dash-fade 3s linear 0ms,fill 1s 1.5s linear both");
        } else {
          $event_member_svg.addClass('swing');
        }
      }, {
        offset: '100%'
      });

      var $event_member_list = $('.event-members-list');
      $event_member_list.waypoint(function(direction) {
        if (direction == 'down') {
          var $event_member_list_child = $(".event-members-list li:nth-child(even)");
          var $event_member_list_child2 = $(".event-members-list li:nth-child(odd)");
          $event_member_list.css("transform", "translateX(0px)").find('li').css("opacity", 1);
          if ($(window).width() > 767) {
            $event_member_list_child.css("transform", "translateY( calc(-100% + 120px) )");
            $event_member_list_child2.css("transform", "translateY(10px)");
          }
        } else {
          $event_member_list.addClass('swingI');
        }
      }, {
        offset: '100%'
      });
    },

    /*========================================================*/
    /*=           Gmap3          =*/
    /*========================================================*/
    gmap: function() {
      $('.gmap3-area,.gmap3-area.another').each(function() {
        var $this = $(this),
          center = [40.8859901, -74.0640706];
        $this.gmap3({
            center: center,
            zoom: 10,
            mapTypeId: "shadeOfGrey",
            mapTypeControlOptions: {
              mapTypeIds: [google.maps.MapTypeId.ROADMAP, "shadeOfGrey"]
            }
          })
          .marker([{
            position: center,
            icon: "media/images/icon/map-marker.png"
          }])
          .on('click', function(marker) {
            marker.setIcon('media/images/icon/map-marker-four.png');
          })

          .styledmaptype(
            "shadeOfGrey", [{
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#e9e9e9"
                  },
                  {
                    "lightness": 17
                  }
                ]
              },
              {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f5f5f5"
                  },
                  {
                    "lightness": 20
                  }
                ]
              },
              {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ffffff"
                  },
                  {
                    "lightness": 17
                  }
                ]
              },
              {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#ffffff"
                  },
                  {
                    "lightness": 29
                  },
                  {
                    "weight": 0.2
                  }
                ]
              },
              {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#ffffff"
                  },
                  {
                    "lightness": 18
                  }
                ]
              },
              {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#ffffff"
                  },
                  {
                    "lightness": 16
                  }
                ]
              },
              {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f5f5f5"
                  },
                  {
                    "lightness": 21
                  }
                ]
              },
              {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#dedede"
                  },
                  {
                    "lightness": 21
                  }
                ]
              },
              {
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "visibility": "on"
                  },
                  {
                    "color": "#ffffff"
                  },
                  {
                    "lightness": 16
                  }
                ]
              },
              {
                "elementType": "labels.text.fill",
                "stylers": [{
                    "saturation": 36
                  },
                  {
                    "color": "#333333"
                  },
                  {
                    "lightness": 40
                  }
                ]
              },
              {
                "elementType": "labels.icon",
                "stylers": [{
                  "visibility": "off"
                }]
              },
              {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f2f2f2"
                  },
                  {
                    "lightness": 19
                  }
                ]
              },
              {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#fefefe"
                  },
                  {
                    "lightness": 20
                  }
                ]
              },
              {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#fefefe"
                  },
                  {
                    "lightness": 17
                  },
                  {
                    "weight": 1.2
                  }
                ]
              }
            ], {
              name: "Shades of Grey"
            });
      });

      $('.gmap3-area.another').each(function() {
        var $this = $(this);

        $this.gmap3()
          .marker([{
              position: [40.8859901, -74.0640706],
              icon: "media/images/icon/map-marker.png"
            },
            {
              position: [43.0500183, -75.3830465],
              icon: "media/images/icon/map-marker.png"
            },
            {
              position: [40.8792875, -74.292512],
              icon: "media/images/icon/map-marker.png"
            },
            {
              position: [40.9606017, -74.1319608],
              icon: "media/images/icon/map-marker.png"
            },
            {
              position: [40.9866837, -74.0385322],
              icon: "media/images/icon/map-marker-two.png"
            },
            {
              position: [41.0113901, -73.8782112],
              icon: "media/images/icon/map-marker-two.png"
            },
            {
              position: [40.9130167, -73.8521297],
              icon: "media/images/icon/map-marker-three.png"
            },
            {
              position: [38.407067, -83.1987903],
              icon: "media/images/icon/map-marker-three.png"
            },
            {
              position: [40.8202783, -73.8335124],
              icon: "media/images/icon/map-marker.png"
            }
          ])
      });




      $('.footer-map').each(function() {
        var $this = $(this),
          center = [40.8859901, -74.0640706];
        $this.gmap3({
            center: center,
            zoom: 10,
            mapTypeId: "shadeOfGrey",
            mapTypeControlOptions: {
              mapTypeIds: [google.maps.MapTypeId.ROADMAP, "shadeOfGrey"]
            }
          })
          .marker([{
            position: center,
            icon: "media/images/icon/map-marker-five.png"
          }])

          .styledmaptype(
            "shadeOfGrey", [{
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [{
                  "color": "#444444"
                }]
              },
              {
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [{
                  "color": "#f2f2f2"
                }]
              },
              {
                "featureType": "poi",
                "elementType": "all",
                "stylers": [{
                  "visibility": "off"
                }]
              },
              {
                "featureType": "road",
                "elementType": "all",
                "stylers": [{
                    "saturation": -100
                  },
                  {
                    "lightness": 45
                  }
                ]
              },
              {
                "featureType": "road.highway",
                "elementType": "all",
                "stylers": [{
                  "visibility": "simplified"
                }]
              },
              {
                "featureType": "road.arterial",
                "elementType": "labels.icon",
                "stylers": [{
                  "visibility": "off"
                }]
              },
              {
                "featureType": "transit",
                "elementType": "all",
                "stylers": [{
                  "visibility": "off"
                }]
              },
              {
                "featureType": "water",
                "elementType": "all",
                "stylers": [{
                    "color": "#6633cc"
                  },
                  {
                    "visibility": "on"
                  }
                ]
              }
            ], {
              name: "Shades of Grey"
            });
      });
    },
  };

  THEMEIM.documentOnReady = {
    init: function() {
      THEMEIM.initialize.init();
    },
  };

  THEMEIM.documentOnLoad = {
    init: function() {
      THEMEIM.initialize.masonry();

      $('.preloader').delay(80).fadeOut(80);

      $('.slider-wrapper').delay(5000).addClass('active');

    },
  };

  THEMEIM.documentOnResize = {
    init: function() {
      THEMEIM.initialize.masonry();



      if ($('body').width() > 575)
        $('.slider').height(780);
      else
        $('.slider').height(490);




    },
  };

  THEMEIM.documentOnScroll = {
    init: function() {
      THEMEIM.initialize.sectionBackground();

      /*=================================*/
      /*=           Scroll Header          =*/
      /*=================================*/


      if ($(this).scrollTop() > 150) {
        $('.header_default').addClass("fixed")
        $('.search-fullwidth').removeClass("open")
      } else {
        $('.header_default').removeClass("fixed")
      }


      if ($(this).scrollTop() > 600) {
        $('.backtotop').addClass("show")
      } else {
        $('.backtotop').removeClass("show")
      }

      /* Back to top */

      /*=================================*/
      /*=    Footer animation trigger          =*/
      /*=================================*/

      if ($(window).scrollTop() + $(window).height() > ($(document).height() - 300)) {
        //you are at bottom
        $(".hexagon-box-footer").addClass("open");
      }
    },
  };

  // Initialize Functions
  $(document).ready(THEMEIM.documentOnReady.init);
  $(window).on('load', THEMEIM.documentOnLoad.init);
  $(window).on('resize', THEMEIM.documentOnResize.init);
  $(window).on('scroll', THEMEIM.documentOnScroll.init);

})(jQuery);