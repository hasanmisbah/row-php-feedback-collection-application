<?php

/**
 * this is the main route file
 * @var $router Hasanmisbah\FeedbackApplication\Core\Router\RouteManager
*/
$router->get('/', function(){
    return view('index');
});

$router->get('/login', [new \Hasanmisbah\FeedbackApplication\Controllers\AuthenticationController(), 'login']);
$router->post('/login', [new \Hasanmisbah\FeedbackApplication\Controllers\AuthenticationController(), 'authenticate']);

$router->get('/register', [new \Hasanmisbah\FeedbackApplication\Controllers\AuthenticationController(), 'register']);
$router->post('/register', [new \Hasanmisbah\FeedbackApplication\Controllers\AuthenticationController(), 'store']);

$router->get('/feedback/{userId}', [new \Hasanmisbah\FeedbackApplication\Controllers\FeedbackController(), 'show']);
$router->post('/feedback/{userId}', [new \Hasanmisbah\FeedbackApplication\Controllers\FeedbackController(), 'store']);


$router->get('/dashboard', [new \Hasanmisbah\FeedbackApplication\Controllers\DashboardController(), 'index']);
