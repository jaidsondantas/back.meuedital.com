<?php

namespace Routes\Services;


use Illuminate\Support\Facades\Route;

class RouteService
{
    public static function createRoute(string $initRoute, string $controller, $actions)
    {

        foreach ($actions as $key => $action) {
            $route = '';
            $actionString = $action['action'];
            if ($action['method'] == 'get') {
                if ($action['params'] != '') {
                    $params = $action['params'];
                    $route = "$initRoute/$params";
                }else {
                    $route = $initRoute;
                }
                Route::get($route, "$controller@$actionString")->name("check-list." . $route . "." . $actionString);
            }

            if ($action['method'] == 'post') {
                $route = $initRoute;
                Route::post($route, "$controller@$actionString")->name("check-list." . $route . "." . $actionString);
            }

            if ($action['method'] == 'put') {
                if ($action['params'] != '') {
                    $params = $action['params'];
                    $route = "$initRoute/$params";
                }
                Route::put($route, "$controller@$actionString")->name("check-list." . $route . "." . $actionString);
            }

            if ($action['method'] == 'delete') {
                if ($action['params'] != '') {
                    $params = $action['params'];
                    $route = "$initRoute/$params";
                }
                Route::delete($route, "$controller@$actionString")->name("check-list" . $route . $actionString);
            }
        }
    }

}
