<?php
session_start();
return function ($dir)
{
    $application = Hasanmisbah\FeedbackApplication\Core\Foundation\Application::create($dir);

    $application->bind('request', function(){
        return new Hasanmisbah\FeedbackApplication\Core\Request\Request();
    });

    $application->bind('view', function() use ($dir){
        return new Hasanmisbah\FeedbackApplication\Core\View\ViewManager($dir . '/app/views');
    });

    $application->bind('router', function() use ($dir, $application){
        $router =  new Hasanmisbah\FeedbackApplication\Core\Router\RouteManager($application );
        require_once $dir . '/app/routes/web.php';
        return $router;
    });

    $application->bind('db', function() use($application, $dir){
        return new Hasanmisbah\FeedbackApplication\Core\Database\JsonDB(
            $application,
            $dir . '/storage/db.json'
        );
    });

    \Hasanmisbah\FeedbackApplication\App::setInstance($application);
    \Hasanmisbah\FeedbackApplication\Core\Model\Model::setDB($application->db());
    require_once $dir . '/app/functions/function.php';
    $application->router()->handle();
};
