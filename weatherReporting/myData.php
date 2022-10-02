[
<?php
for( $i=0 ; $i<100; $i++)
{
	echo '
	{
	  "name": "name'.$i.'",
	  "date": "name'.$i.'",
    "value1":'.rand(10,1000).',
    "value2":'.rand(10,1000).',
    "value3":'.rand(10,1000).'
	},
	';
}
echo '
	{
	  "name": "name'.$i.'",
	  "date2: "name'.$i.'",
    "value1":1,
    "value2":2,
    "value3":3
	}
	'
?>
]

