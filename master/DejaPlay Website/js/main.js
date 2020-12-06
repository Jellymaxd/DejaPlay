 AOS.init({
 	duration: 800,
 	easing: 'slide',
 	once: false
 });

jQuery(document).ready(function($) {

	"use strict";

	

	var siteMenuClone = function() {

		$('.js-clone-nav').each(function() {
			var $this = $(this);
			$this.clone().attr('class', 'site-nav-wrap').appendTo('.site-mobile-menu-body');
		});


		setTimeout(function() {
			
			var counter = 0;
      $('.site-mobile-menu .has-children').each(function(){
        var $this = $(this);
        
        $this.prepend('<span class="arrow-collapse collapsed">');

        $this.find('.arrow-collapse').attr({
          'data-toggle' : 'collapse',
          'data-target' : '#collapseItem' + counter,
        });

        $this.find('> ul').attr({
          'class' : 'collapse',
          'id' : 'collapseItem' + counter,
        });

        counter++;

      });

    }, 1000);

		$('body').on('click', '.arrow-collapse', function(e) {
      var $this = $(this);
      if ( $this.closest('li').find('.collapse').hasClass('show') ) {
        $this.removeClass('active');
      } else {
        $this.addClass('active');
      }
      e.preventDefault();  
      
    });

		$(window).resize(function() {
			var $this = $(this),
				w = $this.width();

			if ( w > 768 ) {
				if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
			}
		})

		$('body').on('click', '.js-menu-toggle', function(e) {
			var $this = $(this);
			e.preventDefault();

			if ( $('body').hasClass('offcanvas-menu') ) {
				$('body').removeClass('offcanvas-menu');
				$this.removeClass('active');
			} else {
				$('body').addClass('offcanvas-menu');
				$this.addClass('active');
			}
		}) 

		// click outisde offcanvas
		$(document).mouseup(function(e) {
	    var container = $(".site-mobile-menu");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {
	      if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
	    }
		});
	}; 
	siteMenuClone();


	var sitePlusMinus = function() {
		$('.js-btn-minus').on('click', function(e){
			e.preventDefault();
			if ( $(this).closest('.input-group').find('.form-control').val() != 0  ) {
				$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) - 1);
			} else {
				$(this).closest('.input-group').find('.form-control').val(parseInt(0));
			}
		});
		$('.js-btn-plus').on('click', function(e){
			e.preventDefault();
			$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) + 1);
		});
	};
	// sitePlusMinus();


	var siteSliderRange = function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
	};
	// siteSliderRange();


	var siteMagnificPopup = function() {
		$('.image-popup').magnificPopup({
	    type: 'image',
	    closeOnContentClick: true,
	    closeBtnInside: false,
	    fixedContentPos: true,
	    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
	     gallery: {
	      enabled: true,
	      navigateByImgClick: true,
	      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
	    },
	    image: {
	      verticalFit: true
	    },
	    zoom: {
	      enabled: true,
	      duration: 300 // don't foget to change the duration also in CSS
	    }
	  });

	  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
	    disableOn: 700,
	    type: 'iframe',
	    mainClass: 'mfp-fade',
	    removalDelay: 160,
	    preloader: false,

	    fixedContentPos: false
	  });
	};
	siteMagnificPopup();


	var siteCarousel = function () {
		if ( $('.nonloop-block-13').length > 0 ) {
			$('.nonloop-block-13').owlCarousel({
		    center: false,
		    items: 1,
		    loop: true,
				stagePadding: 0,
				autoplay: true,
		    margin: 20,
		    nav: true,
		    dots: true,
				navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
		    responsive:{
	        600:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 1
	        },
	        1000:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 2
	        },
	        1200:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 3
	        }
		    }
			});
		}



		if ( $('.nonloop-block-14').length > 0 ) {
			$('.nonloop-block-14').owlCarousel({
		    center: false,
		    items: 1,
		    loop: true,
				stagePadding: 0,
				autoplay: true,
		    margin: 20,
		    nav: true,
		    dots: true,
				navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
		    responsive:{
	        600:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 1
	        },
	        1000:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 2
	        }
	        
		    }
			});
		}

		if ( $('.nonloop-block-15').length > 0 ) {
			$('.nonloop-block-15').owlCarousel({
		    center: false,
		    items: 1,
		    loop: true,
				stagePadding: 0,
				autoplay: true,
		    margin: 20,
		    nav: true,
		    dots: true,
				navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
		    responsive:{
	        600:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 1,
	          nav: false,
		    		dots: true
	        },
	        1000:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 2,
	          nav: true,
		    		dots: true
	        },
	        1200:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 3,
	          nav: true,
		    		dots: true
	        }
		    }
			});
		}

		if ( $('.slide-one-item').length > 0 ) {
			$('.slide-one-item').owlCarousel({
		    center: false,
		    items: 1,
		    loop: true,
				stagePadding: 0,
		    margin: 0,
		    autoplay: true,
		    pauseOnHover: false,
		    animateOut: 'fadeOut',
    		animateIn: 'fadeIn',
		    nav: true,
		    navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">']
		  });
	  }
	};
	siteCarousel();

	var siteStellar = function() {
		$(window).stellar({
	    responsive: false,
	    parallaxBackgrounds: true,
	    parallaxElements: true,
	    horizontalScrolling: false,
	    hideDistantElements: false,
	    scrollProperty: 'scroll'
	  });
	};
	siteStellar();

	var siteCountDown = function() {

		if ( $('#date-countdown').length > 0 ) {
			$('#date-countdown').countdown('2020/10/10', function(event) {
			  var $this = $(this).html(event.strftime(''
			    + '<span class="countdown-block"><span class="label">%w</span> weeks </span>'
			    + '<span class="countdown-block"><span class="label">%d</span> days </span>'
			    + '<span class="countdown-block"><span class="label">%H</span> hr </span>'
			    + '<span class="countdown-block"><span class="label">%M</span> min </span>'
			    + '<span class="countdown-block"><span class="label">%S</span> sec</span>'));
			});
		}
				
	};
	siteCountDown();

	var siteDatePicker = function() {

		if ( $('.datepicker').length > 0 ) {
			$('.datepicker').datepicker();
		}

	};
	siteDatePicker();


	var windowScrolled = function() {


		$(window).scroll(function() {

			var $w = $(this), st = $w.scrollTop(), navbar = $('.js-site-navbar') ;

			if ( st > 100 ) {
				navbar.addClass('scrolled');
			} else {
				navbar.removeClass('scrolled');
			}
			
		})

	}
	windowScrolled();

	var toolTipInit = function() {
		$('[data-toggle="tooltip"]').tooltip()
	};
	toolTipInit();


	var simUnload=function(){
		$('#simbody').on('beforeunload',function(){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "deletefiles.php", true);
			xmlhttp.send();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					
					}

				}
		});

		$('#simbody').on('unload',function(){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "deletefiles.php", true);
			xmlhttp.send();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					
					}

				}
		});
	}
	simUnload();

	var checkSimDiv=function() {
		if($('#similarplaysdiv').is(':visible')){ //if the container is visible on the page
			var xmlhttp = new XMLHttpRequest();

			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				//alert('ready');
				document.getElementById("plays1-5").innerHTML = xmlhttp.responseText;
				checkGifready1();
				}


			else{
				document.getElementById("plays1-5").innerHTML = 
				'<div class="sim-loading"><img src="images/loadinggear.gif" alt="sample play" class="loadingimg"></img><p>Retrieving Similar Plays...</p></div>'
					
				} 
		
			}
			var id=document.getElementById('similarplaysdiv').getAttribute('name');
			xmlhttp.open("GET", "Ajaxrequesthandler.php?gettactics=false&getgif=false&similar=true&seq_id=".concat(id), true);
			xmlhttp.send();

		  } 
		else {
			 //wait 50 ms, then try again
		  }

	}

	checkSimDiv();


	var checkTacDiv=function() {
		if($('#tacticplaysdiv').is(':visible')){ //if the container is visible on the page
			var xmlhttp = new XMLHttpRequest();

			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				//alert('ready');
				document.getElementById("tacloading").innerHTML = '';
				document.getElementById("tachead").innerHTML='<div class="container" style="background-color:white"><br><h2> Tactic Used </h2><br><h3> Ranked By Likelihood </h3></div>'
				document.getElementById("tac1-5").innerHTML = xmlhttp.responseText;
				
				}


			else{
				document.getElementById("tacloading").innerHTML = 
				'<div class="sim-loading"><img src="images/loadingtac.gif" alt="sample play" class="loadingimg"></img><p>Analyzing Tactics...</p></div>'
					
				} 
		
			}
			var id=document.getElementById('tacticplaysdiv').getAttribute('name');
			xmlhttp.open("GET", "Ajaxrequesthandler.php?gettactics=true&getgif=false&similar=false&seq_id=".concat(id), true);
			xmlhttp.send();

		  } 
		else {
			 //wait 50 ms, then try again
		  }

	}

	checkTacDiv();

	var checkGifready1=function(){
		
		if($('#simplaydiv-1').is(':visible')){
			//alert('1'); //if the container is visible on the page
			var xmlhttp = new XMLHttpRequest();
			var id=document.getElementById('simplaydiv-1').getAttribute('name');
			//alert(id);
			xmlhttp.open("GET", "Ajaxrequesthandler.php?gettactics=false&similar=false&getgif=true&gif_id=".concat(id), true);
			xmlhttp.send();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				//alert('ready');
				
				
				//document.getElementById("play-gif-odd-".concat(id)).src = 'images/seq/Event_'.concat(id).concat('.gif');
				//document.getElementById("play-gif-odd-".concat(id)).className='img';
				
				document.getElementById("loader1").innerHTML='<p class="mb-5" ><img id="play-gif-odd-'.concat(id).concat('" src="images/seq/Event_'.concat(id).concat('.gif" alt="Image" class="img" width="700" height="auto"></p>'));
				document.getElementById("loader1").style.marginLeft="0em";
				//document.getElementById("loadtxt1").innerHTML='';
				checkGifready2();
				
			}

			else{
				
			}

		  }
		} 
	}
	
	var checkGifready2=function(){
		if($('#simplaydiv-2').is(':visible')){ //if the container is visible on the page
			//alert('2');
			var xmlhttp = new XMLHttpRequest();
			var id=document.getElementById('simplaydiv-2').getAttribute('name');
			//alert(id);
			xmlhttp.open("GET", "Ajaxrequesthandler.php?gettactics=false&similar=false&getgif=true&gif_id=".concat(id), true);
			xmlhttp.send();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				//alert('ready');

				//document.getElementById("play-gif-even-".concat(id)).className='simplay-img';
				//document.getElementById("play-gif-even-".concat(id)).src = 'images/seq/Event_'.concat(id).concat('.gif');
				document.getElementById("loader2").innerHTML='<p class="mb-5" ><img id="play-gif-even-'.concat(id).concat('" src="images/seq/Event_'.concat(id).concat('.gif" alt="Image" class="img" width="700" height="auto"></p>'));
				document.getElementById("loader2").style.marginLeft="0em";
				//document.getElementById("loadtxt2").innerHTML='';
				checkGifready3();
				
		
			}

			else{

			}


		  } 
			 //wait 50 ms, then try again
		}
	}

	var checkGifready3=function(){
		
		if($('#simplaydiv-3').is(':visible')){
			//alert('3'); //if the container is visible on the page
			var xmlhttp = new XMLHttpRequest();
			var id=document.getElementById('simplaydiv-3').getAttribute('name');
			//alert(id);
			xmlhttp.open("GET", "Ajaxrequesthandler.php?gettactics=false&similar=false&getgif=true&gif_id=".concat(id), true);
			xmlhttp.send();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				//alert('ready');

				//document.getElementById("play-gif-odd-".concat(id)).className='simplay-img';
				//document.getElementById("play-gif-odd-".concat(id)).src = 'images/seq/Event_'.concat(id).concat('.gif');
				document.getElementById("loader3").innerHTML='<p class="mb-5" ><img id="play-gif-odd-'.concat(id).concat('" src="images/seq/Event_'.concat(id).concat('.gif" alt="Image" class="img" width="700" height="auto"></p>'));
				document.getElementById("loader3").style.marginLeft="0em";
				//document.getElementById("loadtxt3").innerHTML='';
				checkGifready4();
				
			}

			else{

			}

		  }
		} 
	}

	var checkGifready4=function(){
		if($('#simplaydiv-4').is(':visible')){ //if the container is visible on the page
			//alert('4');
			var xmlhttp = new XMLHttpRequest();
			var id=document.getElementById('simplaydiv-4').getAttribute('name');
			//alert(id);
			xmlhttp.open("GET", "Ajaxrequesthandler.php?gettactics=false&similar=false&getgif=true&gif_id=".concat(id), true);
			xmlhttp.send();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				//alert('ready');

				//document.getElementById("play-gif-odd-".concat(id)).className='simplay-img';
				//document.getElementById("play-gif-even-".concat(id)).src = 'images/seq/Event_'.concat(id).concat('.gif');
				document.getElementById("loader4").innerHTML='<p class="mb-5" ><img id="play-gif-even-'.concat(id).concat('" src="images/seq/Event_'.concat(id).concat('.gif" alt="Image" class="img" width="700" height="auto"></p>'));
				document.getElementById("loader4").style.marginLeft="0em";
				//document.getElementById("loadtxt4").innerHTML='';
				checkGifready5();
				
		
			}

			else{

			}


		  } 
			 //wait 50 ms, then try again
		}
	}

	var checkGifready5=function(){
		
		if($('#simplaydiv-5').is(':visible')){
			//alert('5'); //if the container is visible on the page
			var xmlhttp = new XMLHttpRequest();
			var id=document.getElementById('simplaydiv-5').getAttribute('name');
			//alert(id);
			xmlhttp.open("GET", "Ajaxrequesthandler.php?gettactics=false&similar=false&getgif=true&gif_id=".concat(id), true);
			xmlhttp.send();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				//alert('ready');

				//document.getElementById("play-gif-odd-".concat(id)).className='simplay-img';
				//document.getElementById("play-gif-odd-".concat(id)).src = 'images/seq/Event_'.concat(id).concat('.gif');
				document.getElementById("loader5").innerHTML='<p class="mb-5" ><img id="play-gif-odd-'.concat(id).concat('" src="images/seq/Event_'.concat(id).concat('.gif" alt="Image" class="img" width="700" height="auto"></p>'));
				document.getElementById("loader5").style.marginLeft="0em";
				//document.getElementById("loadtxt5").innerHTML='';

				
			}

			else{

			}

		  }
		} 
	}

	var checkdatefilterclicked=function(){
		(document. getElementById('datebtn').onclick= function(){
			var xmlhttp = new XMLHttpRequest();
			var date=document. getElementById('dname').value;
			alert('true');
			xmlhttp.open("GET", "Ajaxrequesthandler.php?gettactics=false&similar=false&getgif=false&searchfilter=true$searchid=".concat(date), true);
			xmlhttp.send();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("singleplaysection").innerHTML=xmlhttp.responseText;

				
			}
            
		
	   }
		}
		)}
    checkdatefilterclicked();

});



