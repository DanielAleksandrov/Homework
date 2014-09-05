
<!DOCTYPE html">
<html>
<head>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" /> -->
</head>
<body>

<?php
require_once 'HTML/Table.php';

$html = new DOMDocument ( '1.0' );
$html->formatOutput = true;

$form = $html->createElement ( 'form' );

$label = $html->createElement ( 'label', 'Enter number of years ' );
$input = $html->createElement ( 'input' );
$input->setAttribute ( 'name', 'input' );
$submit = $html->createElement ( 'button', 'Show cost' );
$submit->setAttribute ( 'type', 'submit' );
$submit->setAttribute ( 'id', 'sub' );

$form->appendChild ( $label );
$form->appendChild ( $input );
$form->appendChild ( $submit );

$html->appendChild ( $form );
echo $html->saveHTML ();

if (isset ( $_GET ['input'] )) {
	$inYears = $_GET ['input'];
	if ($inYears > 14)
		echo "The year is too further in the past. Insert number of years bellow 14";
	else
		drowTable ( $_GET ['input'] );
}
function drowTable($iputYears) {
	$yarsAndHeader = array (
			array (
					'Year',
					'January',
					'February',
					'March',
					'April',
					'May',
					'June',
					'July',
					'August',
					'September',
					'October',
					'November',
					'December',
					'Total' 
			),
			
			array (
					'hader',
					'2014',
					'2013',
					'2012',
					'2011',
					'2010',
					'2009',
					'2008',
					'2007',
					'2006',
					'2005',
					'2004',
					'2003',
					'2002' 
			) 
	);
	
	$table = new HTML_Table ();
	$attrs = array (
			'border' => 'solid' 
	);
	$table->setAttributes ( $attrs );
	
	
	
	
	foreach ( $yarsAndHeader [1] as $yearKey => $yarValue ) {
		$total = 0;
		
		if ($yearKey == $iputYears + 1)
			break;
		foreach ( $yarsAndHeader [0] as $headKey => $headValue ) {

			$table->setHeaderContents ( 0, $headKey, $headValue );
			
			
			$expens = rand ( 1, 300 );
			
			
			
			// if not year (2014) or not total add random expens to tottal
			if ($headKey != 0 && $headKey != count ( $yarsAndHeader [1] ) - 1)
				$total = $total + $expens;
				
				// set header values
			
			if ($headKey == 0)
				$table->setCellContents ( $yearKey, $headKey, $yarValue );
			
			else if ($headKey == count ( $yarsAndHeader [1] )-1)
				$table->setCellContents ( $yearKey, $headKey, $total );
			
			else
				$table->setCellContents ( $yearKey, $headKey, $expens );
		}
		//echo $yarValue . "<br>";
	}
	echo $table->toHtml ();
}
?>




