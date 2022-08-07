<?php
class Router
{
    private $routes, $uriPattern, $path;
    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        // Получаем роуты из файла
        $this->routes = include($routesPath);
    }
    /**
     * Возвращает строку запроса
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function checkURI($uri)
    {
        // Проверяем наличие такого запроса в массиве маршрутов (routes.php)
        foreach ($this->routes as $uriPattern => $path) {
            // Сравниваем $uriPattern и $uri
            if (preg_match("#^$uriPattern$#", $uri)) {
                $this->uriPattern = $uriPattern;
                $this->path = $path;
                return true;
            }
        }
        return false;
    }

    public static function launch($uri, $uriPattern, $path)
    {
        // Получаем внутренний путь из внешнего согласно правилу.
        $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
        
        // Определить контроллер, action, параметры
        $segments = explode('/', $internalRoute);
        $controllerName = array_shift($segments) . 'Controller';
        $controllerName = ucfirst($controllerName);
        $actionName = 'action' . ucfirst(array_shift($segments));
        $parameters = $segments;
        // Подключить файл класса-контроллера
        $controllerFile = ROOT . '/controllers/' .
                $controllerName . '.php';
        if (file_exists($controllerFile)) {
            include_once($controllerFile);
            if (class_exists($controllerName)) {
                // Создать объект, вызвать метод (т.е. action)
                $controllerObject = new $controllerName;
                /* Вызываем необходимый метод ($actionName) у определенного 
                 * класса ($controllerObject) с заданными ($parameters) параметрами
                 */
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                // Если метод контроллера успешно вызван, завершаем работу роутера
                if ($result != null) {
                    Database::close();
                    exit();
                }
            }
        }  
    }

    public function run()
    {
        // Получаем строку запроса
        $uri = $this->getURI();

        // Найден ли маршрут
        $avaliableRoute = $this->checkURI($uri);

        if ($avaliableRoute) {
            Router::launch($uri, $this->uriPattern, $this->path);
        }
        else{
            header('Location: /Error/404');
        }
    }
}


