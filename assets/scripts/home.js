(function () {
	// SELECT ALL DOM EL's NEEDED
	const $recap = {
		products: document.querySelector('.dashboard .recap .recap-products'),
	   	history: document.querySelector('.dashboard .recap .recap-historic'),
	   	product_content: [], history_content: []
	};
	$recap.product_content = $recap.products.querySelectorAll('.recap-product');
	$recap.history_content = $recap.history.querySelectorAll('.recap-product');
	// Test products number to adap 'display: flex' in css
	const showRecap = () => {
		if ($recap.product_content.length > 5) $recap.products.style.flexDirection = 'row';
		if ($recap.history_content.length > 5) $recap.history.style.flexDirection = 'row';
	}
	showRecap();
})();
