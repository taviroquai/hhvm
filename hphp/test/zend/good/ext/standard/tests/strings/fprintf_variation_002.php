<?php

$int_variation = array( "%d", "%-d", "%+d", "%7.2d", "%-7.2d", "%07.2d", "%-07.2d", "%'#7.2d" );
$int_numbers = array( 0, 1, -1, 2.7, -2.7, 23333333, -23333333, "1234" );

/* creating dumping file */
$data_file = dirname(__FILE__) . '/dump.txt';
if (!($fp = fopen($data_file, 'wt')))
   return;

$counter = 1;
/* integer type variations */
fprintf($fp, "\n*** Testing fprintf() with integers ***\n");
foreach( $int_variation as $int_var ) {
  fprintf( $fp, "\n-- Iteration %d --\n",$counter);
  foreach( $int_numbers as $int_num ) {
    fprintf( $fp, "\n");
    fprintf( $fp, $int_var, $int_num );
  }
  $counter++;
}

fclose($fp);

print_r(file_get_contents($data_file));
echo "\nDone";

unlink($data_file);

?>