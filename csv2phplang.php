<?php

if($argc < 2 )
{
    exit( "Usage: ". $argv[0] . " <file.csv>\n" );
}

$lang_num = 1;
if( $argv[1] == '-es' )
	$lang_num = 2;


$empty_space = false;
if (($handle = fopen(end($argv), "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
		$num = count($data);	
		if( $num < 2 || strlen($data[0]) == 0 ) {
			if( $empty_space == true ) {
				echo "\n";
				$empty_space = false;
			}
			continue;
		}
		$empty_space = true;		

		echo "\$lang['" . $data[0] . "'] = '" . $data[$lang_num] . "';\n";
    }
    fclose($handle);
} else {
	echo "fail to open file";
}
?>
