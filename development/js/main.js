$(document).ready(function(){
	var templates = {
		autor_reg: Handlebars.compile($('#autor_reg').html())
	},
	myPopup;

	$(document).on('click', '.js-auto_reg', function() {
		var data = $(this).data('button');
		// ajax запрос, получить JSON данные
		myPopup = new PopupModule($('.pop-ups'));
		myPopup.show(templates.autor_reg, popup);

		return false;
	});

	$(document).on('click', '.js-close_popup', function() {
		myPopup.hide();
		return false;
	});

	$(document).on('click', '.js-info_btn', function() {
		var 
			$this = $(this),
			dataInfo  = $(this).data('info') - 1,
			arrInfoBl = $('.company-about-info');

		if (!arrInfoBl.length) {		
			arrInfoBl = $('.user-profile-main_inform-bl');
		} 

		changeActiveInfo(arrInfoBl, $this, dataInfo);

		return false;
	});

	// Перекдючалки на userProfile и  companyProfile
	function changeActiveInfo(arrInfoBl, thisBtn, dataInfo) {
		thisBtn.siblings().removeClass('link-active');
		thisBtn.addClass('link-active');

		arrInfoBl.siblings().removeClass('info-active');
		arrInfoBl.eq(dataInfo).addClass('info-active');
	}
});