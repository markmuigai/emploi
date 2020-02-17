
<div class="card">
    <div class="card-body">
        <h4>
            
<?php
if(is_array($invite))
{
	if(count($invite) == 2)
	{
		print "Email: <b>" .$invite[0]."</b><br>Name: ".$invite[1];
	}

	if(count($invite) == 3)
	{
		print "Email: <b>".$invite[0]."</b><br>Name: ".$invite[1]."<br>Role: ".$invite[2];
	}
	if(count($invite) == 4)
	{
		print "Email: <b>" .$invite[0]."</b><br>Name: ".$invite[1]."<br>Role: ".$invite[2]."<br>Message: ".$invite[3];
	}
}	
else
{
	print "Email: <b>$invite</b>";
}
?>
			</h4>
	</div>
</div>