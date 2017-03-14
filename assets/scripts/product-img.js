(function() {
let $fileImg  = document.querySelector('#fileImg'),
	$refreshImg = document.querySelector('.show-img');
	// MAIN FUNC
	function readURL(input) {
		// IF THE INPUT ISNT EMPTY
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        // ONLOAD WE PUT THE IMG
	        reader.onload = function (e) {
	            $refreshImg.setAttribute('src', e.target.result);
	        }
	        // READING URL
	        reader.readAsDataURL(input.files[0]);
	    }
	}
	// EVENT
	$fileImg.addEventListener('change', function() {
		readURL(this);
	});
})()