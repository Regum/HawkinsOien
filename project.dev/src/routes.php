<?php
// Routes

function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[rand(0, $max)];
    }
    return $str;
}

//$app->get('/[{name}]', function ($request, $response, $args) {
$app->get('/hello', function($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/goodbye', function ($request, $response, $args) {
    return $response->write("<h2>Time to go. Goodbye!</h2>");
});

$app->get('/show_departments', function ($request, $response, $args) {
	$this->logger->info('On route /show_departments');
	$db = $this->test_dbConn;
	
	$strToReturn = '';
	$result = $db->query('SELECT * FROM departments')->fetchAll(PDO::FETCH_ASSOC);
	
	$strToReturn .= json_encode($result);

	return $response->write($strToReturn);
});	

$app->post('/login', function ($request, $response, $args) {

	$uName = $_POST['usr'];
	$pWord = $_POST['pword'];

	$arrayToReturn['username'] = $uName;
	$arrayToReturn['token'] = '';

	$db = $this->login_dbConn;

	$result = $db->query("SELECT password FROM users WHERE username = '" . $uName . "'")->fetch(PDO::FETCH_ASSOC)['password'];

	//definitely come up with better validation method
	if($result != ($pWord))
	{
		//$arrayToReturn['token'] = 'invalid';
		//return $response->write(json_encode($arrayToReturn));
		return $response->withRedirect('/test_invalid_login');
	}
	else
	{
		return $response->withRedirect('/test_successful_login');
		// $_SESSION['username'] = $uName;
		// $_SESSION['token'] = random_str(16);
		// $arrayToReturn['token'] = $_SESSION['token'];
		//return $response->write(json_encode($arrayToReturn));
		//return $response->write($_SESSION['username'] . ' ' . $_SESSION['token']);
		#TODO
		#return something which indicates the user made a success
	}

	//return $response->write($strToReturn);
});

$app->get('/login', function ($request, $response, $args) {
	$this->logger->info('On route /test');

	return $this->renderer->render($response, 'login.phtml', $args);
});	

$app->get('/test_invalid_login', function ($request, $response, $args) 
{
	return $response->write('Invalid username/password combination');
});

$app->get('/test_successful_login', function ($request, $response, $args)
{
	return $response->write('Valid username/password combination. You have successfully logged in.');
});
