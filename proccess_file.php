<?php

// Read file
$row = file('FL_insurance_sample.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($row as $key => $line) {
	if ($key > 0 ) $data[] = explode(",", htmlspecialchars($line));
}
// Process file
$result = [];
foreach ($data as $row) {
	$result['county'][$row[2]]['tiv_2012'] = $row[8] + (isset($result['county'][$row[2]]['tiv_2012']) ? 
	$result['county'][$row[2]]['tiv_2012'] : 0);

	$result['line'][$row[15]]['tiv_2012'] = $row[8] + (isset($result['line'][$row[15]]['tiv_2012']) ? 
	$result['line'][$row[15]]['tiv_2012'] : 0);
}
header('Content-Type: application/json; charset=utf-8');
echo json_encode($result);