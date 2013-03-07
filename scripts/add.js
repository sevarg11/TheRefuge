(function() 
{
	$("#idNumber").mask("999999");               // Add a mask to the phone input
	$("#phone").mask("(999) 999-9999");          // Add a mask to the phone input
	$("#parent1Contact").mask("(999) 999-9999"); // Add a mask to the parent phone input
	$("#parent2Contact").mask("(999) 999-9999"); // Add a mask to the parent phone input
	$("#dateOfBirth").mask("99/99/9999");        // Add a mask to the date input
	$('#grade').dropkick();						 // Customize dropdown menu

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


	// Add an onClick function to the submit button
	$("input[type=submit]").click(function(event)
	{
		var isBlank = false;
		var inputsToCheck = ["idNumber", "first", "last", "dateOfBirth", "address", "phone", "school", "church", "parent1", "parent1Contact"];

		// Go through each input to see if the user has filled each one out
		$("input[type=text], textarea, select").each(function()
		{
			var nameOfInput = $(this).attr('name');

			if($.inArray(nameOfInput, inputsToCheck) != -1)
			{
				var label       = $("label[for='" + nameOfInput + "']");
				var nameOfLabel = label.html();

				// If it has not been filled out, make the label red and add an asterisk
				if(!$(this).val())
				{
					if(nameOfLabel.indexOf('*') < 0)
					{
						label.html(nameOfLabel + ' *');
							label.addClass('needToFillOut');
					}
				}
				// Else remove asterisk if there is one and remove the red if it is red.
				else
				{
					label.html(nameOfLabel.replace('*', ''));
					label.removeClass('needToFillOut');
				}

				isBlank = isBlank || !$(this).val();
			}
		});

		if(isBlank)
		{
			event.preventDefault();
			// Don't do anything, show errors.
		}
	});

})();