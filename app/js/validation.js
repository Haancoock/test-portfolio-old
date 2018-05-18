var validation = (function(){

	var init = function(){
		_setUpListners();
	};

	var _setUpListners = function(){
		
	};

	var _createQtip = function(element, position){
		if(position === 'right'){
			position = {
				my: 'left center',
				at: 'right center'
			}
		}else{
			position = {
				my: 'right center',
				at: 'left center',
				adjust: {
					method: 'shift none'
				}
			}
		}
	} 


	return {
		init: init
	};


})();


validation.init();