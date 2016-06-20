// Модуль работы со всплывашками
function PopupModule($popupWrap) {
	this.popupWrap = $popupWrap;
	var self = this;

	this.show = function(template, data) {
		$('body').addClass('body-shadow');
		this.popupWrap.html(_renderTemp(template, data)).fadeIn(500);
	};

	this.hide = function() {
		this.popupWrap.fadeOut(300, function() {
			$('body').removeClass('body-shadow');
			self.popupWrap.html('');
		});
	};

	this.popupMessage = function(template, data) {
		$('body').prepend(_renderTemp(template, data));
	}

	function _renderTemp(template, data) {
		return template(data);
	};
}

$(document).ready(function(){
	var templates = {
		autor_reg: Handlebars.compile($('#autor_reg').html()),
		message: Handlebars.compile($('#message').html())
	},
	myPopup = new PopupModule($('.pop-ups'));

	$(document).on('click', '.js-auto_reg', function() {
		var form = $(this).data('button');
		$.ajax({
			url: "../engine/selectTemplate.php",
			type: "post",
			data: {
				temp: form
			},
			dataType: "json",
			cache: false,
			success: function(data) {
				myPopup.show(templates.autor_reg, data);
			}
		})

		return false;
	});

	$(document).on('click', '.js-close_popup', function() {
		myPopup.hide();
		return false;
	});

	$(document).on('click', '.js-info_btn', function() {
		var 
			$this = $(this),
			dataInfo  = $this.data('info') - 1,
			arrInfoBl = $('.company-about-info');

		if (!arrInfoBl.length) {		
			arrInfoBl = $('.user-profile-main_inform-bl');
		} 

		changeActiveInfo(arrInfoBl, $this, dataInfo);

		return false;
	});

	$(document).on('click', '.js-close_message', function() {
		$('.popup-message').fadeOut(500, function() {
			$(this).remove();
		});
	});

	$(document).on('click', '.js-submit', function() {
		var 
			$thisForm = $(this).closest('form');
			arrFields = $thisForm.find('.js-input-form'),
			arr = [];

		$.ajax({
			url: '../engine/controller.php',
			type: 'POST',
			data: $thisForm.serialize(),
			dataType: 'json',
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
			},
			success: function(data) {
				console.log("data");
				if (data.success === false) {
					myPopup.popupMessage(templates.message, data);
				} else {
					myPopup.hide();
					myPopup.popupMessage(templates.message, data);

					if (data.is_company) {
						document.location.href = '/companyProfile.php';
					}
					setTimeout(function() {
						document.location.href = '/userProf.php';	
					}, 3000);
				}
			}
		});
		return false;
	});

	$(document).on('click', '.js-exit_account', function() {
		$.ajax({
			url: '../engine/exitAccount.php',
			type: 'get',
			data: {
				'delete': true
			},
			success: function() {
				document.location.href = '/';
			}
		});

		return false;
	});

	// Перекдючалки на userProfile и companyProfile
	function changeActiveInfo(arrInfoBl, thisBtn, dataInfo) {
		thisBtn.siblings().removeClass('link-active');
		thisBtn.addClass('link-active');

		arrInfoBl.siblings().removeClass('info-active');
		arrInfoBl.eq(dataInfo).addClass('info-active');
	}
});

(function(){
	if(!$('#map').length) { return false; };
	ymaps.ready(init);

	function init(){
		$('#map').each(function(){
	    var $t = $(this);
	    var address = $t.data('address');

	    ymaps.geocode(address, {
	      results: 1
	    }).then(function (res) {
	      var firstGeoObject = res.geoObjects.get(0),
	          coords = firstGeoObject.geometry.getCoordinates();

	      var myMap = new ymaps.Map($t.attr('id'), {
	        center: coords,
	        zoom: 16,
	        controls: ['zoomControl', 'typeSelector']
	      });
	      myMap.behaviors.disable("scrollZoom");
	      myMap.geoObjects.add(firstGeoObject);
	    });
	  });
	}
})();