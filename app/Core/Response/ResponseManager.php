<?php

namespace Hasanmisbah\FeedbackApplication\Core\Response;

class ResponseManager
{
    public function view($view, $data = [])
    {
        $instance = \Hasanmisbah\FeedbackApplication\App::instance('view');
        $view = str_replace('.', DIRECTORY_SEPARATOR, $view);
        extract($data);
        return $instance()->render($view, $data);
    }


    public  function redirect( $url)
    {
        header('Location: ' . $url);
        exit;
    }
}
