function notify(message, style = false, element = false){
	$('.notifyjs-corner').empty();
	if(element != false)
	{
		if(style == false)
		{
			$(element).notify(message);
		}
		else
		{
			$(element).notify(message,style);
		}		
	}
	else
	{
		if(style == false)
		{
			$.notify(message);
		}
		else
		{
			$.notify(message,style);
		}

	}

}