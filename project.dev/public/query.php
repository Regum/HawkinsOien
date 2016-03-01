<html>
  <body>
<?php
	$link = new \PDO( 'mysql:host=localhost;dbname=employees;charset=utf8mb4', 'root', 'McompsciL43850', array(
                            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        ));
	$handle = $link->prepare(
	"SELECT e.first_name, e.last_name FROM employees e NATURAL JOIN salaries s WHERE s.salary > 150000 AND s.to_date = '9999-01-01';"
	);
	//handle->bindValues(); ??
	//bind values?
	$handle->execute();
	$result = $handle->fetchAll(\PDO::FETCH_OBJ);
	
	foreach($result as $row) {
		print($row->first_name . " " . $row->last_name . "<br>");
	}
?>

</body>
</html>

