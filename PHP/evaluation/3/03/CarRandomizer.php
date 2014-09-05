<form>
	<label for="cars">Enter cars</label> <input name="cars" id="cars">
	<button>Show result</button>
</form>

<?php
$cars;
if (isset ( $_GET ['cars'] ))
	$cars = $_GET ['cars'];
$colors = [ 
		'blue',
		'yellow',
		'green',
		'red',
		'black' 
];

$carsArr = explode ( ", ", $cars );

?>
<table style="width:150px">
<thead>
	<tr>
		<th>Car</th>
		<th>Color</th>
		<th>Count</th>
	</tr>
	</thead>
	<tbody>
	<?php
	
foreach ( $carsArr as $value ) {
		$count = rand ( 1, 5 );
		$color = $colors [rand ( 0, 4 )];
		?>
	<tr>
		<td><?=$value?></td>
		<td><?= $color?></td>
		<td><?=$count?></td>
	</tr>
	<?php  } ?>
	</tbody>
</table>

	 <style> 
 	td{ 
	border:solid; 
 	} 
 	table{
 border:solid;
 	}
	</style>
	
	
	