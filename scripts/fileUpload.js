(function() 
{
	// With customized file uploads, we need a way to show the user something happened.
	// This function takes the files selected and outputs it to the customized button.
	fileInputs = function() {
		var $this     = $(this),
		$uploadedFile = $this.val(),
		filePathArray = $uploadedFile.split('\\'),
		shortPath     = filePathArray[filePathArray.length-1],
		$button       = $this.siblings('.button'),
		$fakeFile     = $this.siblings('.file-holder');

		if(shortPath !== '') 
		{
		    $button.text(shortPath);
		    if(!$button.siblings('img').length)
		    	$button.after('<img src="images/checkmark.png" />');
		    $button.css('background', '#167DA3')
		    $this.unbind('hover');
		    if($fakeFile.length === 0) 
		    {
		      //$button.after('' + shortPath + '');
		    } 
		    else 
		    {
		      $fakeFile.text(shortPath);
		    }
		}
	};
	$('.fileUpload input[type=file]').bind('change focus click', fileInputs);


	 // Add hover events to customized file upload buttons
	$(".fileUpload input[type=file]").hover(
		function () 
		{
			$(this).siblings('.button').css('background', '#C65200');
		}, 
		function () 
		{
			$(this).siblings('.button').css('background', '#5D3E3C');
		}
	);

})();