<html>
<body>
<pre>
<?php

require_once('config.inc.php');

define ('TOOL_NAME', "Courses in Term {$_REQUEST['enrollment_term_id']} with IDs");

debugFlag('START');

$courses = callCanvasApiPaginated(
	CANVAS_API_GET,
	'/accounts/1/courses',
	array(
		'enrollment_term_id' => $_REQUEST['enrollment_term_id']
	)
);
$page = 1;

echo "id\tsis_course_id\tshort_name\tlong_name\taccount_id\tterm_id" . PHP_EOL;

do {
	$pageProgress = 'processing page ' . getCanvasApiCurrentPageNumber() . ' of ' . getCanvasApiLastPageNumber() . '...';
	debugFlag($pageProgress);
		
	foreach ($courses as $course) {
		echo "{$course['id']}\t{$course['sis_course_id']}\t{$course['course_code']}\t{$course['name']}\t{$course['account_id']}" . PHP_EOL;
	}
	flush();
} while ($courses = callCanvasApiNextPage());

debugFlag('FINISH');

?>
</pre>
</body>
</html>