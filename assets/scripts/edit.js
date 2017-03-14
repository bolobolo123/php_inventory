(function() {
	const $edits = document.querySelectorAll('.edit-btn'),
		 $inputs = document.querySelectorAll('.products input, .products textarea');
	let onSubmit = false;
	// CHECK FOR SUBMITS
	for (let i = 0; i < $edits.length; i++) {
		$edits[i].addEventListener('click', function(e) {
			// Récup THIS + INPUTS
			let _this = this,
			$_inputs = _this.parentElement.parentElement.parentElement.querySelectorAll('input, textarea');

			if (!onSubmit){
				// PREVENT THE GET SUBMIT
				e.preventDefault();
				onSubmit = true;
				_this.querySelector('img').setAttribute('src', '../../img/check-icon.png');
				// ENABLE INPUTS
				for (let i = 0; i < $_inputs.length; i++) $_inputs[i].removeAttribute('disabled');
			}
			else {
				onSubmit = false;
				_this.querySelector('img').setAttribute('src', '../../img/edit-icon.png');
				// SUBMIT THE MODIFICATIONS
				_this.click();
			}
		});
	}
	// CHECK ANY CHANGE ON INPUTS AND TRANSFER TO PHP
	for (let i = 0; i < $inputs.length; i++) {
		$inputs[i].addEventListener('change', function(e) {
			let _this = this;
			if ( (_this.getAttribute('name') == "quantity") || (_this.getAttribute('name') == "description") ) {
				submit = _this.parentElement.parentElement.querySelector('.edit-btn');
				console.log('bite');
			} else {
				submit = _this.parentElement.parentElement.parentElement.querySelector('.edit-btn');
				console.log('cool');
				console.log(submit);
			}   
			console.log(_this.value);
			submit.setAttribute('href', submit.getAttribute('href')+'& edit['+_this.name+']='+_this.value);
		});
		// SPECIAL INPUT
		if ($inputs[i].getAttribute('name') == "stock") {
			$inputs[i].addEventListener('click', function(e) {
				_this = this;
				submit = _this.parentElement.parentElement.parentElement.querySelector('.edit-btn');
				if (_this.classList.contains('sell')) {
					_this.classList.remove('sell');
					_this.classList.add('stockonly');
					submit.setAttribute('href', submit.getAttribute('href')+'& edit[stock]=stockonly');
				} else {
					_this.classList.remove('stockonly');
					_this.classList.add('sell');
					submit.setAttribute('href', submit.getAttribute('href')+'& edit[stock]=sell');
				}
			});
		}
	}
})()
