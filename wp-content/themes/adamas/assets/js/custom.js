/**
 * Custom Javascript for Adamas
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

jQuery(document).ready(function($) {
    'use strict';

    var $window     = $(window),
        $document   = $(document),
        body        = $('body'),
        preloader   = false;

    window.SITE = {

        // Initialization
        init: function() {
            var self = this,
                obj;

            for ( var obj in self ) {
                if ( self.hasOwnProperty(obj) ) {
                    var _method = self[obj];
                    if ( _method.selector !== undefined && _method.init !== undefined ) {
                        if ( $(_method.selector).length > 0 ) {
                            _method.init();
                        }
                    }
                }
            }
        },


        /* ---------------------------------------------- /*
         *  Page loader
        /* ---------------------------------------------- */
        pageLoader: {
        	selector: '#wpus-preloader',
        	init: function() {
        
        	    setTimeout( function() {
        			$('#wpus-preloader').fadeOut(600);
        		}, 1200 );
        
        		preloader = true;
        		
        	},
        },


        /* ---------------------------------------------- /*
         *  Back to top
        /* ---------------------------------------------- */
        backToTop: {
            selector: '#back-to-top',
            init: function() {
        
                var base      = this,
                    container = $(base.selector);
        
                $window.scroll( function() {
                    if ( $window.scrollTop() > 300 ) {
                        container.stop().animate({'opacity': 1}, 200, "easeOutSine");
                    } else {
                        container.stop().animate({'opacity': 0}, 200, "easeOutSine");
                    }
                });
        
                container.click( function(e) {
                    $('body, html').animate({ scrollTop: 0 }, 800 );
                    e.preventDefault();
                });
        
            }
        },


        /* ---------------------------------------------- /*
         *  Fixed header
        /* ---------------------------------------------- */
        fixedHeader: {
        	selector: '.has-sticky-header',
        	init: function() {
        
        		$window.on('scroll', function() {
        
        			var scrollTopValue   = $window.scrollTop(),
        			    $topHeaderHeight = parseInt($('#top-bar').height()),
        			    transparentClass = $('#masthead').data('transparent');
        
        			if ( $('#top-bar').length ) {
        				if (scrollTopValue >= $topHeaderHeight) {
        					$('#masthead').addClass('is-sticky');
        		        } else {
        		        	$('#masthead').removeClass('is-sticky');
        		        }
        			}
        
        			if ( transparentClass ) {
        				if (scrollTopValue >= 5) {
        					$('#masthead').removeClass(transparentClass);
        		        } else {
        		        	$('#masthead').addClass(transparentClass);
        		        }
        		    }
        
        			if ( scrollTopValue >= 300 ) {
        				$('#masthead').addClass('is-shrunk');
        	        } else {
        	        	$('#masthead').removeClass('is-shrunk');
        	        }
        
        		}).trigger('scroll');
        
        	}
        },


        /* ---------------------------------------------- /*
         *  Menu fix
        /* ---------------------------------------------- */
        headerMenuFix: {
            selector: '#site-menu li',
            init: function() {
        
                $window.on('resize', function() {
                    $("#site-menu li").not('.mega-menu').hover(function() {
                        if ( $(this).children('ul').length > 0 ) {
                            var win_w     = $(window).width(),
                                children  = $(this).find('> ul'),
                                elem      = $(this),
                                elemOff   = parseInt($(this).offset().left),
                                elemWidth = elem.width();
                            if ( (elemOff + 200 + elemWidth) > win_w ) {
                                children.addClass('edge');
                            }
                        }
                    }, function() {
                        $(this).find('> ul').removeClass('edge');
                    });
                }).trigger('resize');
        
            }
        },


        /* ---------------------------------------------- /*
         *  Megamenu
        /* ---------------------------------------------- */
        megaMenu: {
            selector: '.site-menu > .mega-menu',
            init: function() {
        
                $('.site-menu > .mega-menu').mouseenter( function() {  
                    if ($(this).children('.sub-menu').length > 0) {
        
                        var submenu             = $(this).children('.sub-menu');
        
                        submenu.removeAttr('style');
        
                        var window_width        = parseInt($(window).innerWidth());
                        var submenu_width       = parseInt(submenu.width());
                        var submenu_offset_left = parseInt(submenu.offset().left);
                        var submenu_adjust      = window_width - submenu_width - submenu_offset_left;
        
                        if (submenu_adjust < 0) {
                            submenu.css('left', submenu_adjust - 30 + 'px');
                        }
        
                        if (submenu_offset_left < 0) {
                            submenu.css('left', Math.abs(submenu_offset_left) + 30 + 'px');
                        }
        
                    }
                });
        
            }
        },


        /* ---------------------------------------------- /*
         *  Side menu
        /* ---------------------------------------------- */
        sideMenu: {
            selector: '#menu-bars',
            init: function() {
        
                $document.on('click', '#menu-bars', function(e) {
                    body.addClass('show-overlay');
                    setTimeout( function() {
                        body.addClass('show-navigation');
                    }, 400 );
                    e.preventDefault();
                });
        
                $('#side-menu .menu-item-has-children').children('a').addClass('parent').append('<i class="adamas-icon-chevron-down"></i>');
        
                $('#side-menu').on('click', '.parent', function(e) {
        
                    var active = $(this).hasClass('active') ? true : false;
                    var href   = $(this).attr('href');
        
                    $(this).closest('ul').find('.active').removeClass('active').next().slideUp();
        
                    if ( '#' === href ) {
                        e.preventDefault();
                    }
        
                    if ( !active ) {
                        $(this).next().slideDown();
                        $(this).toggleClass('active');
                    }
                });
            }
        },


        /* ---------------------------------------------- /*
         *  Close overlay
        /* ---------------------------------------------- */
        closeOverlay: {
        	selector: '.wpus-close, #site-overlay',
        	init: function() {
        
        		$document.on('click', '.wpus-close, #site-overlay', function(e) {
        
        			body.removeClass('show-navigation show-cart');
        
        			setTimeout( function() {
        				body.removeClass('show-overlay');
        				$('#side-menu').find('.active').removeClass('active').next().slideUp();
        		    	$('#side-menu').find('.show').removeClass('show');
        			}, 400 );
        
        			e.preventDefault();
        
        		});
        
        	}
        },


        /* ---------------------------------------------- /*
         *  Side menu scroll bar
        /* ---------------------------------------------- */
        menuScrollBar: {
        	selector: '#side-navigation',
        	init: function() {
        
        		$('#side-navigation').perfectScrollbar({
        			wheelPropagation: 0,
        			scrollYMarginOffset: 20,
        			suppressScrollX: 0
        		});
        
        	},
        },


        /* ---------------------------------------------- /*
         *  Search form
        /* ---------------------------------------------- */
        searchForm: {
        	selector: '#menu-search',
        	init: function() {
        
        	    $document.on('click', '#menu-search', function(e) {
        	    	$('#site-search').addClass('show-site-search');
        	    	setTimeout(function() {
        				$('#site-search #s').focus();
        			}, 400);
        	        e.preventDefault();
        	    });
        
        	    $('#site-search').click( function(e) {
        	    	if ( 'site-search' === e.target.id ) {
        	    		$(this).removeClass('show-site-search');
        	    	}
        	    	e.preventDefault();
        	    });
        
        	}
        },


        /* ---------------------------------------------- /*
         *  Fixed footer
        /* ---------------------------------------------- */
        fixedFooter: {
        	selector: '.footer-fixed',
        	init: function() {
        
        		var base      = this,
        		    container = $(base.selector);
        
        		$window.on('resize', function() {
        
        			var footerHeight = container.height()-2;
        			var windowWidth  = Math.floor( $window.width() );
        
        	        if ( windowWidth >= 992 ) {
        	        	$('#content').css({'margin-bottom': footerHeight + 'px'});
        	        } else {
        	        	$('#content').css({'margin-bottom': 0});
        	        }
        
        	    }).trigger('resize');
        
            },
        },


        /* ---------------------------------------------- /*
         *  Full height page header
        /* ---------------------------------------------- */
        fullHeightPageHeader: {
        	selector: '.hero-full-screen',
        	init: function() {
        
        		$window.on('resize', function() {
        
        			var winH = $(window).height();
        
        			if ( $('.site-top-bar').length ) {
        				winH = winH - $('.site-top-bar').height();
        			}
        
        			if ( $('#masthead').hasClass('transparent-light') || $('#masthead').hasClass('transparent-dark') ) {
        			} else {
        				winH = winH - $('#masthead').height();
        			}
        
        		    $('.hero-full-screen').css({'height': winH + 'px'});
        
        		}).trigger('resize');
        
        	},
        },


        /* ---------------------------------------------- /*
         *  Responsive font size
        /* ---------------------------------------------- */
        responsiveFontSize: {
        	selector: '.wpus-responsive-heading',
        	init: function() {
        
        		$window.on('resize', function() {
        			$('.wpus-responsive-heading .wpus-heading-tag').each(function(){
        				var that   = $(this),
        					sizeMD = that.data('md'),
        					sizeSM = that.data('sm'),
        					sizeXS = that.data('xs');
        
        				if ( Modernizr.mq('(max-width: 480px)') ) {
        					that.css('font-size', sizeXS);
        				} else if ( Modernizr.mq('(min-width: 481px) and (max-width: 991px)') ) {
        					that.css('font-size', sizeSM);
        				} else {
        					that.css('font-size', sizeMD);
        				}
        
        			});
        		}).trigger('resize');
        
        	},
        },


        /* ---------------------------------------------- /*
         *  Site Slider (Beta Version)
        /* ---------------------------------------------- */
        siteSlider: {
        	selector: '.wpus-theme-slider',
        	init: function() {
        
        		var base      = this,
        		    container = $(base.selector);
        
            	container.each( function() {
        
        			var self        = $(this),
        				autoplay    = self.data('autoplay') ? true : false,
        				timeout     = self.data('timeout')  ? self.data('timeout') : 5000,
        				loop        = self.data('loop') ? true : false,
        				arrows      = self.data('arrows') ? true : false,
        				arrowsColor = self.data('arrows-color'),
        				dots        = self.data('dots') ? true : false,
        				dotsColor   = self.data('dotsColor'),
        				delay       = preloader ? 2300 : 500;
        
        			/** Slider initialized */
        			self.on('initialized.owl.carousel', function(event) {
        
        				var el = event.target;
        
        				setTimeout( function() {
        					animateEl($('.active', el).find('.wpus-slide-title'));
        					animateEl($('.active', el).find('.wpus-slide-desc'));
        					animateEl($('.active', el).find('.wpus-slide-button'));
        					animateEl($('.active', el).find('.wpus-slide-image'));
        				}, delay );
        
        				var newArrowsColor = $('.active', el).find('[data-arrows-color]').data('arrows-color');
        				if ( newArrowsColor ) {
        					self.removeClass(arrowsColor).addClass(newArrowsColor);
        				}
        
        				var newDotsColor = $('.active', el).find('[data-dots-color]').data('dots-color');
        				if ( newDotsColor ) {
        					self.removeClass(dotsColor).addClass(newDotsColor);
        				}
        
        			});
        
        			/** Slider init */
        			self.owlCarousel({
        				items: 1,
        				autoplay: autoplay,
        				autoplayTimeout: timeout,
        				autoplayHoverPause: true,
        				loop: loop,
        				nav: arrows,
        				dots: dots,
        				navSpeed: 800,
        				dotsSpeed: 800,
        				dragEndSpeed: 800,
        				navText: ['<i class="adamas-icon-arrow-left"></i>','<i class="adamas-icon-arrow-right"></i>'],
        				themeClass: '',
        			});
        
        			/** Slider events: changed */
        			self.on('changed.owl.carousel', function(event) {
        
        				var el = event.target;
        
        				self.find('.animate').removeClass('animate');
        
        				setTimeout( function() {
        					animateEl($('.active', el).find('.wpus-slide-title'));
        					animateEl($('.active', el).find('.wpus-slide-desc'));
        					animateEl($('.active', el).find('.wpus-slide-button'));
        					animateEl($('.active', el).find('.wpus-slide-image'));
        				}, 1000 );
        
        				setTimeout( function() {
        					self.removeClass('dots-dark dots-gray dots-accent dots-light');
        					var newDotsColor = $('.active', el).find('[data-dots-color]').data('dots-color');
        					if ( newDotsColor ) {
        						self.addClass(newDotsColor);
        					} else {
        						self.addClass(dotsColor);
        					}
        				}, 100 );
        
        				setTimeout( function() {
        					self.removeClass('arrows-dark arrows-gray arrows-accent arrows-light');
        					var newArrowsColor = $('.active', el).find('[data-arrows-color]').data('arrows-color');
        					if ( newArrowsColor ) {
        						self.addClass(newArrowsColor);
        					} else {
        						self.addClass(arrowsColor);
        					}
        				}, 100 );
        			});
        
        			/** Animate elements */
        			function animateEl(el) {
        				if ( el.data('delay') ) {
        					setTimeout( function() {
        						el.addClass('animate');
        					}, el.data('delay') );
        				} else {
        					el.addClass('animate');
        				}
        			}
        
        			/** Slider full screen */
        			if ( self.hasClass('slider-full-screen') ) {
        				$window.on('resize', function() {
        					var winH = $(window).height();
        					if ( $('.site-top-bar').length ) {
        						winH = winH - $('.site-top-bar').height();
        					}
        
        					if ( !$('#masthead[data-transparent]') ) {
        						winH = winH - $('#masthead').height();
        					}
        					self.find('.wpus-theme-slide').css({'height': winH + 'px'});
        				}).trigger('resize');
        			}
        
        		});
            },
        },


        /* ---------------------------------------------- /*
         *  Grid
        /* ---------------------------------------------- */
        grid: {
        	selector: '.wpus-grid',
        	init: function() {
        
        		var base      = this,
        		    container = $(base.selector);
        
        		container.each( function() {
        
        			var that         = $(this),
        				loadmore     = that.next('.wpus-load-more').find('a'),
        				filter       = that.prev('.wpus-filter'),
        
        				col          = that.data('column-lg') ? that.data('column-lg') : 4,
        				col_md       = that.data('column-md') ? that.data('column-md') : 3,
        				col_sm       = that.data('column-sm') ? that.data('column-sm') : 2,
        				col_xs       = that.data('column-xs') ? that.data('column-xs') : 1,
        
        				marginRight  = that.data('margin-right')   ? that.data('margin-right') : false,
        				marginBottom = that.data('margin-bottom')  ? that.data('margin-bottom') : false,
        				layout       = that.data('layout')  ? that.data('layout')  : 'masonry',
        				colNum       = 1,
        				i            = 1;
        
        			$window.on('resize load', function() {
        
        				var windowWidth  = Math.floor($(window).width());
        				var contentWidth = Math.floor(that.parent().width() + marginRight);
        
        				that.css({ width:contentWidth + marginRight });
        
        
        				if ( Modernizr.mq('(min-width:1200px)') ) {
        					colNum = col;
        				} else if ( Modernizr.mq('(min-width:992px) and (max-width:1199px)') ) {
        			    	colNum = col_md;
        			    } else if ( Modernizr.mq('(min-width:768px) and (max-width:991px)') ) {
        			    	colNum = col_sm;
        			    } else if ( Modernizr.mq('(max-width:767px)') ) {
        			    	colNum = col_xs;
        			    }
        
        		        var colWidth = Math.floor(contentWidth/colNum) - marginRight;
        
        		        that.find('.wpus-grid-item').css({ width:colWidth, marginRight:marginRight, marginBottom:marginBottom });
        
        		        if ( 'packery' == layout ) {
        		        	that.find( '.wpus-grid-item' ).css({ height:colWidth });
        
        		        	if ( windowWidth >= 480 ) {
        		        		that.find( '.size-tall, .size-widetall' ).css({ height:colWidth*2+marginRight });
        		        		that.find( '.size-wide, .size-widetall' ).css({ width:colWidth*2+marginRight });
        		        	}
        		        }
        
        			}).trigger('resize');
        
        			that.imagesLoaded(function() {
        
        				// Initialize Packery
        				that.isotope({
        					itemSelector: '.wpus-grid-item',
        					isInitLayout: false,
        					sortBy: 'origorder',
        					layoutMode: layout,
        				});
        
        				// Packery event: "layoutComplete"
        				that.isotope( 'once', 'layoutComplete', function() {
        					that.addClass('show');
        				});
        
        				that.isotope();
        
        	            window.SITE.animation.init();
        
        				filter.on( 'click', 'a', function() {
        					var selector    = $(this).attr('data-filter');
        
        			        $(this).closest('.wpus-filter').find('a').removeClass('active');
        			        $(this).addClass('active');
        			        that.isotope({ filter: selector });
        
        			        return false;
        			    });
        
        			});
        
        			loadmore.on('click', function(e)  {
        				e.preventDefault();
        
        				var self       = $(this);
        				var $content   = '.wpus-grid';
        				var $anchor    = '.wpus-load-more a';
        				var $next_href = $($anchor).attr('href');
        
        				var text       = loadmore.text();
        				var nomore     = loadmore.data('nomore');
        				var loading    = loadmore.data('loading');
        
        				self.text(loading).addClass('disable-hover');
        
        				$.get($(this).attr('href') + '', function(data) {
        
        					var $new_content = $($content, data).wrapInner('').html(); // Grab just the content
        					$next_href = $($anchor, data).attr('href'); // Get the new href
        					var d = $.parseHTML($.trim($new_content));
        
        					$(d).appendTo(that).hide().imagesLoaded(function() {
        						window.SITE.lazyLoadImages.init();
        						$(d).show();
        						that.isotope( 'appended', $(d) );
        						$(window).trigger('resize');
        						that.isotope('layout');
        						window.SITE.carousel.init();
        					    $('body, html').animate({ scrollTop: $window.scrollTop() + 1 }, 100 );
        					});
        
        					if($('.wpus-load-more a').data('count') > i) {
        	                    $('.wpus-load-more a').attr( 'href', $next_href); // Change the next URL
        	                    self.text(text).removeClass('disable-hover');
        	                } else {
        	                    self.text(nomore).addClass('disable-hover');
        	                }
        				});
        
        				i++;
        
        			});
        
        		});
        	}
        },


        /* ---------------------------------------------- /*
         *  Animation
        /* ---------------------------------------------- */
        animation: {
        	selector: '.wow',
        	init: function() {
        
        		var delay = preloader ? 1800 : 0;
        
        		setTimeout( function() {
        			new WOW().init();
        		}, delay );
        
        	},
        },


        /* ---------------------------------------------- /*
         *   Columns height adjustment
        /* ---------------------------------------------- */
        equalColumnsHeight: {
        	selector: '.equal-columns-height',
        	init: function() {
        
        		$('.equal-columns-height').find('.wpus-column').matchHeight();
        
        	},
        },


        /* ---------------------------------------------- /*
         *   Vertical Align Content
        /* ---------------------------------------------- */
        valignColumn: {
        	selector: '.wpus-valign',
        	init: function() {
        
        		if(jQuery().matchHeight) {
        			$.fn.matchHeight._afterUpdate = function() {
        				$('.wpus-valign').each( function() {
        
        					var elHeight  = $(this).height();
        					var elHeight2 = $(this).children('.wpus-column-wrapper').height();
        
        					var setHeight = (elHeight - elHeight2) / 2;
        
        					$(this).children('.wpus-column-wrapper').css({'padding-top': setHeight + 'px'});
        
        			    });
        			}
        		}
        
        	},
        },


        /* ---------------------------------------------- /*
         *   Lazy load images
        /* ---------------------------------------------- */
        startLoadingImages: {
        	selector: '.wpus-lazy-load',
        	start: function() {
        
                var $images = $('.wpus-lazy-load'),
                    loaded_images = 0;
        
                $images.each( function(i, el) {
        
                    var $img   = $(el),
                        loader = new Image(),
                        src    = $img.data('src'),
                      	afterLoaded = function() {
        	                $img.attr( 'src', src ).data('loaded', true).removeAttr('data-src');
        	                loaded_images++;
        	            };
        
                    loader.src     = src;
                    loader.onload  = afterLoaded;
                    loader.onerror = afterLoaded;
        
                });
            },
        },
        
        lazyLoadImages: {
        	selector: '.wpus-lazy-load',
        	init: function() {
        
            	$window.on('load', function() {
        	        $('.wpus-lazy-load').data('loaded', true);
        	        window.SITE.startLoadingImages.start();
        		}).trigger('resize');
        
            },
        },


        /* ---------------------------------------------- /*
         *   Carousel
        /* ---------------------------------------------- */
        carousel: {
        	selector: '.wpus-carousel',
        	init: function() {
        
        		var base      = this,
        		    container = $(base.selector);
        
            	container.each( function() {
        
        			var self       = $(this),
        				colLg      = self.data('column-lg')   ? self.data('column-lg') : 4,
        				colMd      = self.data('column-md')   ? self.data('column-md') : 3,
        				colSm      = self.data('column-sm')   ? self.data('column-sm') : 2,
        				colXs      = self.data('column-xs')   ? self.data('column-xs') : 1,
        				margin     = self.data('margin')      ? self.data('margin')    : 0,
        				timeout    = self.data('timeout')     ? self.data('timeout')   : 5000,
        				autoplay   = self.data('autoplay')    ? self.data('autoplay')  : false,
        				loop       = self.data('loop')        ? self.data('loop')      : false,
        				nav        = self.data('arrows')      ? self.data('arrows')    : false,
        				dots       = self.data('dots')        ? self.data('dots')      : false,
        				autoHeight = self.data('auto-height') ? true : false,
        				singleItem = self.data('single')      ? true : false,
        				dataSlider = self.data('slider'),
        				dataThumb  = self.data('thumb'),
        				flag       = false;
        
        			if ( singleItem ) {
        				colLg = colMd = colSm = colXs = 1;
        			}
        
        			self.owlCarousel({
        				items: colLg,
        				margin: margin,
        				loop: loop,
        				autoplay: autoplay,
        				autoplayTimeout: timeout,
        				autoplayHoverPause: true,
        				nav: nav,
        				dots: dots,
        				autoHeight:autoHeight,
        				navRewind: false,
        				navText: ['<i class="adamas-icon-arrow-left"></i>','<i class="adamas-icon-arrow-right"></i>'],
        				navSpeed: 600,
        				dotsSpeed: 600,
        				dragEndSpeed: 500,
        				themeClass: '',
        				responsive: {
        					0    : { items: colXs },
        			        480  : { items: colXs },
        			        767  : { items: colSm },
        			        991  : { items: colMd },
        			        1199 : { items: colLg },
        			    },
        			});
        
        			self.on('changed.owl.carousel', function(e) {
        				if ( !flag ) {
        					flag = false;
        					$(dataThumb).trigger('to.owl.carousel', [e.item.index, 200, true]);
        					$(dataThumb).find('.owl-item').removeClass('current');
        					$(dataThumb).find('.owl-item:eq(' + e.item.index + ')').addClass('current');
        					flag = false;
        				}
        			});
        
        
        			if ( dataSlider && self.hasClass('wpus-slider-thumb') ) {
        				self.find('.owl-item:eq(0)').addClass('current');
        				self.on('click', '.owl-item', function () {
        					$(dataSlider).trigger('to.owl.carousel', [$(this).index(), 200, true]);
        				});
        			}
        
        		});
        
            },
        },


        /* ---------------------------------------------- /*
         *   Carousel custom navigation
        /* ---------------------------------------------- */
        carouselCustomNav: {
        	selector: '.wpus-carousel-nav',
        	init: function() {
        
        		$('.wpus-carousel-nav').on('click', 'span', function() {
        			var id = $(this).parent().data('id');
                    $('#'+id).trigger($(this).data('trigger'), [300]);
                });
        
            },
        },


        /* ---------------------------------------------- /*
         *   Lightbox
        /* ---------------------------------------------- */
        lightbox: {
        	selector: '.wpus-lightbox',
        	init: function() {
        
            	$('.wpus-lightbox').magnificPopup({
        	        type: $(this).data('type') ? $(this).data('type') : 'image',
        	        mainClass: 'mfp-zoom-in',
        	        removalDelay: 300,
        	        callbacks: {
        	            imageLoadComplete: function() {
        	                var self = this;
        	                setTimeout(function() {self.wrap.addClass('mfp-image-loaded'); }, 16);
        	            }
        	        }
        	    });
        
            },
        },


        /* ---------------------------------------------- /*
         *   Gallery lightbox
        /* ---------------------------------------------- */
        galleryLightbox: {
        	selector: '.wpus-gallery-lightbox, .gallery',
        	init: function() {
        
        		var base      = this,
        		    container = $(base.selector);
        
            	container.each( function() {
        		    $(this).magnificPopup({
        		        delegate: 'a',
        		        type: 'image',
        		        gallery: {enabled: true},
        		        mainClass: 'mfp-zoom-in',
        		        removalDelay: 300,
        		        callbacks: {
        
        		            beforeOpen: function() {
        		               container.find('a').each(function(){
        		                    $(this).attr('title', $(this).find('img').attr('alt'));
        		                });
        		            },
        
        		            open: function() {
        		                $.magnificPopup.instance.next = function() {
        		                    var self = this;
        		                    self.wrap.removeClass('mfp-image-loaded');
        		                    setTimeout(function() {$.magnificPopup.proto.next.call(self); }, 120);
        		                }
        		                $.magnificPopup.instance.prev = function() {
        		                    var self = this;
        		                    self.wrap.removeClass('mfp-image-loaded');
        		                    setTimeout(function() {$.magnificPopup.proto.prev.call(self); }, 120);
        		                }
        		            },
        
        		            imageLoadComplete: function() {
        		                var self = this;
        		                setTimeout(function() {self.wrap.addClass('mfp-image-loaded'); }, 16);
        		            }
        
        		        }
        		    });
        		});
        
            },
        },


        /* ---------------------------------------------- /*
         *   Parallax
        /* ---------------------------------------------- */
        parallax: {
        	selector: '.wpus-parallax, .has-fade-content',
        	init: function() {
        
        		var wpusParallax = skrollr.init({
        			forceHeight: false,
        			smoothScrolling: false,
        			mobileCheck: function() {
        				return false;
        			}
        		});
        
        		wpusParallax.refresh($('.wpus-parallax, .has-fade-content'));
        	},
        },


        /* ---------------------------------------------- /*
         *   YouTube video background
        /* ---------------------------------------------- */
        youtubeVideoBackground: {
        	selector: '[data-videoid]',
        	init: function() {
        
        		$('[data-videoid]').each( function () {
        
        			var $self     = $(this),
        				youtubeId = $self.data('videoid');
        
        			insertYoutubeVideoBackground($self, youtubeId);
        
        		} );
        
        		// Insert youtube video into element
        		function insertYoutubeVideoBackground($element, youtubeId, counter) {
        
        			if ( 'undefined' === typeof(YT.Player) ) {
        
        				counter = 'undefined' === typeof(counter) ? 0 : counter;
        				if ( 100 < counter ) {
        					console.warn('Too many attempts to load YouTube api');
        					return;
        				}
        				setTimeout( function() {
        					insertYoutubeVideoBackground($element, youtubeId, counter++);
        				}, 100 );
        
        				return;
        			}
        
        			var $container = $element.prepend('<div class="wpus-video-bg"><div class="wpus-video-bg-inner"></div></div>').find('.wpus-video-bg-inner');
        
        			new YT.Player($container[0], {
        				width: '100%',
        				height: '100%',
        				videoId: youtubeId,
        				playerVars: {
        					playlist: youtubeId,
        					iv_load_policy: 3,
        					enablejsapi: 1,
        					disablekb: 1,
        					autoplay: 1,
        					controls: 0,
        					showinfo: 0,
        					rel: 0,
        					loop: 1
        				},
        				events: {
        					onReady: function (event) {
        						event.target.mute().setLoop(true);
        					}
        				}
        			} );
        
        			resizeYoutubeVideoBackground($element);
        
        			jQuery(window).bind( 'resize', function() {
        				resizeYoutubeVideoBackground($element);
        			} );
        
        		}
        
        		// Resize background video iframe so that video content covers whole area
        		function resizeYoutubeVideoBackground($element) {
        
        			var iframeW,
        				iframeH,
        				marginLeft,
        				marginTop,
        				containerW = $element.innerWidth(),
        				containerH = $element.innerHeight(),
        				ratio1 = 16,
        				ratio2 = 9;
        
        			if ( (containerW / containerH) < (ratio1 / ratio2) ) {
        				iframeW = containerH * (ratio1 / ratio2);
        				iframeH = containerH;
        				marginLeft = - Math.round( (iframeW - containerW) / 2 ) + 'px';
        				marginTop  = - Math.round( (iframeH - containerH) / 2 ) + 'px';
        				iframeW += 'px';
        				iframeH += 'px';
        			} else {
        				iframeW = containerW;
        				iframeH = containerW * (ratio2 / ratio1);
        				marginTop  = - Math.round( (iframeH - containerH) / 2 ) + 'px';
        				marginLeft = - Math.round( (iframeW - containerW) / 2 ) + 'px';
        				iframeW += 'px';
        				iframeH += 'px';
        			}
        
        			$element.find('.wpus-video-bg iframe').css( {
        				maxWidth: '1000%',
        				marginLeft: marginLeft,
        				marginTop: marginTop,
        				width: iframeW,
        				height: iframeH
        			} );
        		}
        
        	}
        },


        /* ---------------------------------------------- /*
         *   Full height section
        /* ---------------------------------------------- */
        fullHeightSection: {
        	selector: '.full-height-section',
        	init: function() {
        
        		$window.on('resize', function() {
        
        			var winH = $(window).height();
        
        		    $('.full-height-section').each( function() {
        
                        var rowH = $(this).find('.row').outerHeight();
        
                        if ( rowH < winH ) {
        		            $(this).css({'height': winH + 'px'});
                        } else {
        
                            $(this).find('.row').first().css({'padding-top': '60px', 'padding-bottom': '60px'});
        
                            var newRowH = $(this).find('.row').first().outerHeight();
        
                            $(this).css({'height': newRowH + 'px'});
                        }
        
        		        $(this).find('.wpus-google-map').css({'height': winH + 'px'});
        
        		    });
        
        		}).trigger('resize');
        
        	},
        },


        /* ---------------------------------------------- /*
         *   Responsive height
        /* ---------------------------------------------- */
        responsiveHeight: {
        	selector: '[data-height-class]',
        	init: function() {
        
        		$window.on('resize load', function() {
        			$('[data-height-class]').each( function(){
        
        				var self     = $(this),
        					heightLg = self.data('height-lg'),
        				    heightMd = self.data('height-md'),
        				    heightSm = self.data('height-md'),
        				    heightXs = self.data('height-xs'),
        				    delay    = preloader ? 2300 : 500;
        
        				if ( self.data('height-class') === 'this' ) {
        					var $el = self;
        				} else {
        					var $el = self.find('.'+$el);
        				}
        
        				if ( Modernizr.mq('(max-width: 767px)') ) {
        					$el.css({'height': heightXs }).addClass('');
        				} else if ( Modernizr.mq('(min-width:768px) and (max-width:991px)') ) {
        					$el.css({'height': heightSm }).addClass('');
        				} else if ( Modernizr.mq('(min-width:992px) and (max-width:1199px)') ) {
        					$el.css({'height': heightMd }).addClass('');
        				} else {
        					$el.css({'height': heightLg });
        				}
        
        				if ( !self.hasClass('loading') ) {
        					setTimeout( function() {
        						$el.addClass('loading');
        					}, delay );
        				}
        
        			});
        		}).trigger('resize');
        
        	},
        },


        /* ---------------------------------------------- /*
         *   Counter
        /* ---------------------------------------------- */
        counter: {
        	selector: '.wpus-counter-value',
        	init: function() {
        
        		$('.wpus-counter-value').counterUp({
        			delay: 10,
        			time: 1500,
        		});
        
        	},
        },


        /* ---------------------------------------------- /*
         *   Pie chart
        /* ---------------------------------------------- */
        pieChart: {
        	selector: '.wpus-pie-chart',
        	init: function() {
        
                $('.wpus-pie-chart').each( function() {
        
                	var _that = $(this);
        
                    _that.waypoint( function() {
                        _that.easyPieChart({
                            scaleColor: false,
                            barColor: _that.data('barcolor'),
                            trackColor: _that.data('trackcolor'),
                            lineCap: _that.data('linecap'),
                            lineWidth: _that.data('width'),
                            animate: _that.data('percent') * 20,
                            size: _that.data('size'),
                        });
                    },{
                    	offset: '90%'
                    });
                });
        
        	}
        },


        /* ---------------------------------------------- /*
         *   Message Box
        /* ---------------------------------------------- */
        messageBox: {
        	selector: '.wpus-message-close',
        	init: function() {
                $('.wpus-message-close').on('click', function(e) {
                	e.preventDefault();
                    $(this).parent().animate({'opacity':'0'}, 300).slideUp(300);
                });
            }
        },


        /* ---------------------------------------------- /*
         *   Progres bar
        /* ---------------------------------------------- */
        progressBar: {
        	selector: '.wpus-bar-active[data-width]',
        	init: function() {
        
        		var $progressBar = $('.wpus-bar-active[data-width]');
        
        		if ( $progressBar.length ) {
        			$progressBar.each( function() {
        				var width = $(this).data('width');
                        var $el = $(this);
        		        $el.waypoint( function() {
        		            $el.animate({width: width + '%'}, width * 16);
        		        },{offset: '90%'});
        		    });
        		}
        
        		var $progressBarCss = $('.wpus-bar-active[data-width-css]');
        
        		if ( $progressBarCss.length ) {
        			$progressBarCss.each( function() {
        		        $(this).css({width: $(this).data('width-css') + '%'});
        		    });
        		}
        
        	},
        },


        /* ---------------------------------------------- /*
         *   Flip box
        /* ---------------------------------------------- */
        flipBox: {
        	selector: '.wpus-flip-box',
        	init: function() {
        
        		$window.on('resize', function() {
        			$('.wpus-section').each( function(index) {
        
        				var self        = $(this),
        					$box        = self.find('.wpus-flip-box'),
        					frontHeight = 0,
        					backHeight  = 0,
        					maxHight    = '';
        
        				$box.removeAttr('style');
        
        				self.find('.wpus-flip-box-front').each( function(index, elem) {
        			        if ( $(elem).outerHeight() > frontHeight) {
        			        	frontHeight = $(elem).outerHeight();
        			        }
        			    });
        
        			    self.find('.wpus-flip-box-back').each( function(index, elem) {
        			        if ( $(elem).outerHeight() > backHeight) {
        			        	backHeight = $(elem).outerHeight();
        			        }
        			    });
        
        			    maxHight = frontHeight > backHeight ? frontHeight : backHeight
        
        		        $box.css({'height':maxHight});
        
        			});
        		}).trigger('resize');
        
        	},
        },


        /* ---------------------------------------------- /*
         *   Accordion
        /* ---------------------------------------------- */
        accordion: {
        	selector: '.wpus-toggle[data-type="accordion"]',
        	init: function() {
        
        		var base      = this,
        		    container = $(base.selector);
        
        	    container.each( function() {
        
        	        var $that  = $(this),
        	        	active = $that.data('active') - 1,
        	            tab    = $that.find('.wpus-toggle-header'),
        	            show   = $(tab[active]);
        
        	        show.addClass('active').next('.wpus-toggle-content').show();
        
        	        $that.on( 'click', '.wpus-toggle-header', function(e) {
        
                        var $_that = $(this);
        
        		        $that.find('.wpus-toggle-header.active').removeClass('active').next().slideUp(300);
        
        		        if ( $_that.next().is(':hidden') ) {
        		            $_that.toggleClass('active').next().slideDown(300);
        		        }
        
        		        e.preventDefault();
        
                    });
        
        	    });
        
        	},
        },


        /* ---------------------------------------------- /*
         *   Toggle
        /* ---------------------------------------------- */
        toggle: {
        	selector: '.wpus-toggle[data-type="toggle"]',
        	init: function() {
        
        		var base      = this,
        		    container = $(base.selector);
        
        		container.each( function() {
        	        var $that  = $(this),
        	        	active = $that.data('active') - 1,
        	            tab    = $that.find('.wpus-toggle-header'),
        	            show   = $(tab[active]);
        
        	        show.addClass('active').next().show();
        
        	        $that.on( 'click', '.wpus-toggle-header', function(e) {
                        var $that = $(this);
        
        		        if ( $that.hasClass('active') ) {
        		            $that.removeClass('active').next().slideUp(300);
        		        } else {
        		            $that.addClass('active').next().slideDown(300);
        		        }
        
        		        e.preventDefault();
                    });
        
        	    });
        
        	},
        },


        /* ---------------------------------------------- /*
         *   Tab
        /* ---------------------------------------------- */
        tab: {
        	selector: '.wpus-tab-wrapper',
        	init: function() {
        
        		var $tabs = $('.wpus-tab-wrapper');
        
        	    if ( $tabs.length ) {
        	        $tabs.each( function() {
        
        	            var content,
        	                click  = $(this).find('.wpus-tab-header a'),
        	                nav    = $(this).find('.wpus-tab-header'),
        	                active = $(click[0]);
        
        	            active.addClass('active') ;
        	            content = $(active.attr( 'href' ));
        
        	            $(this).find('.wpus-tab-content').first().show().animate({'opacity':'1'},300);
        
        	            click.not(active).each(function() {
        	                $($(this).attr('href')).hide();
        	            });
        
        	            nav.on('click','a', function(e) {
        	                active.removeClass('active');
        	                content.stop( true,true ).hide();
        	                content.animate({'opacity':'0'},300);
        
        	                active = $(this);
        	                content = $($(this).attr( 'href' ));
        
        	                active.addClass('active');
        	                content.stop(true,true).show();
        	                content.animate({'opacity':'1'},300);
        	                $(window).trigger('resize');
        
        	                return false;
        	            });
        	        });
        	    }
        
        	},
        },


        /* ---------------------------------------------- /*
         *   WooCommerce: Product thumbnails
        /* ---------------------------------------------- */
        singleProductThumbnails: {
        	selector: '.product-thumbnails',
        	init: function() {
        
        		var base       = this,
        		    container  = $(base.selector),
        		    slideCount = container.data('count');
        
        		var product_thumbnails_swiper = container.swiper({
        			direction:'vertical',
        			slidesPerView: slideCount,
        			onTap: function(swiper, event) {
        
        				console.log(product_thumbnails_swiper.clickedIndex);
        
        				$('#woo-product-images').trigger('to.owl.carousel', [product_thumbnails_swiper.clickedIndex, 200, true]);
        
        				for ( var i = 0; i < product_thumbnails_swiper.slides.length; i++ ) {
        					product_thumbnails_swiper.slides[i].style.opacity = 0.2;
        				}
        
        				product_thumbnails_swiper.slides[product_thumbnails_swiper.clickedIndex].style.opacity = 1;
        				product_thumbnails_swiper.slideTo(product_thumbnails_swiper.clickedIndex-1, 200, '');
        			}
        		});
        
        		$('#woo-product-images').on('translate.owl.carousel', function (e) {
        			for ( var i = 0; i < product_thumbnails_swiper.slides.length; i++ ) {
        				product_thumbnails_swiper.slides[i].style.opacity = 0.2;
        			}
        			product_thumbnails_swiper.slides[e.item.index].style.opacity = 1;
        			product_thumbnails_swiper.slideTo(e.item.index-1, 300, '');
        		});
        
        	},
        },


        /* ---------------------------------------------- /*
         *   WooCommerce: Add to cart
        /* ---------------------------------------------- */
        addToCart: {
        	selector: '.wpus-product',
        	init: function() {
        		$('body').on( 'adding_to_cart', function ( event, $button, data ) {
        			$button.closest('.wpus-product').addClass('product-loading');
        		} ).on( 'added_to_cart', function ( event, fragments, cart_hash, $button ) {
        			$button.closest('.wpus-product').removeClass('product-loading').addClass('product-load');
        			setTimeout( function() {
        				$button.closest('.wpus-product').removeClass('product-load');
        			}, 1500 );
        		} );
        	},
        },


        /* ---------------------------------------------- /*
         *   WooCommerce: Open / Close cart
        /* ---------------------------------------------- */
        openCart: {
        	selector: '#menu-cart',
        	init: function() {
        	    $document.on('click', '#menu-cart', function(e) {
        			body.addClass('show-overlay');
        			setTimeout( function() {
        				body.addClass('show-cart');
        			}, 400 );
        			e.preventDefault();
        	    });
        	}
        },


    }

    // on Ready
    $document.ready(function() {
        window.SITE.init();
    });

    // on Load
    $window.load(function(){
        $('.variations select').trigger('chosen:updated');
        if(jQuery().matchHeight) {
            $.fn.matchHeight._update();
        }
    });

}); //jQuery