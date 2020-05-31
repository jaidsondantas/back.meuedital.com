<?php

namespace Routes\Services;


use Illuminate\Support\Facades\Route;

class RouteService
{
    public static function createRoute($route, $controller, $actions)
    {
        $actions = [
            "get" => [
                "action" => "find",
                "param" => "{id}"
            ]
        ];


        foreach ($actions as $key => $action) {
            $actionString = $action['action'];
            if ($key == 'get') {
                if (!isset($action['params'])) {
                    $params = $action['params'];
                    $route = "$route/$params";
                }
                Route::get($route, "$controller@$actionString")->name(getenv('APP_NAME') . $route . $actionString);
            }
            if ($key == 'post') {
                Route::post($route, "$controller@$actionString")->name(getenv('APP_NAME') . $route . $actionString);
            }

            if ($key == 'put') {
                if (!isset($action['params'])) {
                    $params = $action['params'];
                    $route = "$route/$params";
                }
                Route::put($route, "$controller@$actionString")->name(getenv('APP_NAME') . $route . $actionString);
            }

            if ($key == 'delete') {
                if (!isset($action['params'])) {
                    $params = $action['params'];
                    $route = "$route/$params";
                }
                Route::delete($route, "$controller@$actionString")->name(getenv('APP_NAME') . $route . $actionString);
            }
        }
    }

}
