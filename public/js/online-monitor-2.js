

$().ready(function(){
	if(!navigator.onLine) { 
		notify('You are working offline!','error');
	}
	var offlineState = false;
	window.addEventListener('online',  function (){
		if(offlineState)
		{
			offlineState = true;
			notify("Connection re-established!",'success');
		}
	});
	window.addEventListener('offline',  function (){
		if(offlineState)
		{
			notify('You are working offline!','error');
		}
		else
		{
			notify('Connection to Emploi was lost!','error');
		}
		offlineState = true;
	});
});
