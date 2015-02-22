<h2> Agenda </h2>

<?php
    $d = new DateTime('now');
    $d->modify('first day of this month');
//    echo $d->format('N');
?>

<center><table class="table table-striped table-responsive table-bordered">
	<div class="panel_heading">
	     <thead>
		<tr> 
		     <th> Lundi </th>
		     <th> Mardi </th>
		     <th> Mercredi </th>
		     <th> Jeudi </th>
		     <th> Vendredi </th>
		     <th> Samedi </th>
		     <th> Dimanche </th>
		</tr>
	     </thead>
	 </div >
	 <tbody>
<?php
for($week=1;$week<6;$week++)
{
	echo "<tr>";

	for($day=1;$day<8;$day++)
	{
		echo "<td>";

		if($week==1)
		{
			if($day==$d->format('N'))
			{
				echo $d->format('j');
				$d->modify('next day');
			}
		}
		else if($week==5)
		{
			if($d->format('j')!=1)
			{
				echo $d->format('j');
				$d->modify('next day');
			}
		}
		else
		{
			echo $d->format('j');
			$d->modify('next day');
		}
		echo "</td>";
	}

	echo "</tr>";
}
?>
</table></center>
