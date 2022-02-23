<!DOCTYPE html>
<html>
      
<head>
    <title>
        Jondyprise License Manager
    </title>
</head>
  
<body style="text-align:center;">
      
    <h1 style="color:blue;">
        Jondyprise
    </h1>
      
    <h4>
        Welcome to the Jondyprise License Manager
    </h4>
  
    <form method="post">
        <a href="manage_licenses.php" class="button">Manage Licenses</a>
    </form>
</head>
  
</html>

<?php
include_once 'request.php';
include_once 'router.php';
$router = new Router(new Request);

$router->get('/', function(){
    return <<<HTML
        <h1>Hello world</h1>
    HTML;
});

$router->get('/profile', function($request) {
    return <<<HTML
    <h1>Profile</h1>
  HTML;
  });
  
  $router->post('/data', function($request) {
  
    return json_encode($request->getBody());
  });
?>