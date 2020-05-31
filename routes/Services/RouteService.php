<?php

namespace Routes\Services;


use Illuminate\Support\Facades\Route;

class RouteService
{
    public static function createRoute(string $route, string $controller, $actions)
    {

        foreach ($actions as $key => $action) {
            $actionString = $action['action'];
            if ($action['method'] == 'get') {
                if ($action['params'] != '') {
                    $params = $action['params'];
                    $route = "$route/$params";
                }
                Route::get($route, "$controller@$actionString")->name("check-list." . $route . "." . $actionString);
            }
            if ($action['method'] == 'post') {
                Route::post($route, "$controller@$actionString")->name("check-list." . $route . "." . $actionString);
            }

            if ($action['method'] == 'put') {
                if ($action['params'] != '') {
                    $params = $action['params'];
                    $route = "$route/$params";
                }
                Route::put($route, "$controller@$actionString")->name("check-list." . $route . "." . $actionString);
            }

            if ($action['method'] == 'delete') {
                if ($action['params'] != '') {
                    $params = $action['params'];
                    $route = "$route/$params";
                }
                Route::delete($route, "$controller@$actionString")->name("check-list" . $route . $actionString);
            }
        }
    }

}
