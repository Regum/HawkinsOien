<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
	
    	'test-dbConn' => [
    		'username' => 'root',
    		'password' => 'McompsciL43850',
    		'host' => 'localhost',
    		'dbname' => 'employees',
    		'db' => 'mysql'
    	],	

        'login_dbConn' => [
            'username' => 'basic_user',
            'password' => 'Pear321',
            'host' => 'localhost',
            'dbname' => 'test',
            'db' => 'mysql'
        ],

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/'
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
        ],

    ],
];
