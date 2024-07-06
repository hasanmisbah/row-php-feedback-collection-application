<?php

namespace Hasanmisbah\FeedbackApplication\Core\View;

class ViewManager
{
    protected $viewPath = null;

    public function __construct($viewPath)
    {
        $this->viewPath = $viewPath;
    }

    public function render($view, $data = [])
    {
        extract($data);
        ob_start();
        include $this->get($view);
        echo ob_get_clean();
    }

    private function get($view)
    {
        return $this->viewPath . '/' . $view . '.php';
    }
}
