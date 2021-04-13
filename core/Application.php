<?php

namespace app\core;

use app\core\Router;
use app\core\Request;
use app\core\Response;
use app\core\db\Database;
use app\core\Session;
use app\core\UserModel;

/**
 * class: Application
 * @author: verkyav k. peter <verkyavpeter@gmail.com>
 * @package app\core;
 */
class Application
{
    public string $userClass;
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Database $db;
    public ?UserModel $user;
    public static Application $app;
    public Controller $controller;

    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);

        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    public function getController(): Controller
    {
        return $this->controller;
    }

    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function login(UserModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return $this->user;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public static function isLoggedIn()
    {
        return self::$app->user;
    }
};
