<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public $data;
    public $menu = array(
        array(
            "parent_menu" => "Dashboard",
            "data" => array(
                array(
                    "menu" => "a", // child menu    
                    "menu_code" => "a",
                    "alert" => 0,
                ),
                array(
                    "menu" => "b", // child menu    
                    "menu_code" => "b",
                    "alert" => 0,
                )
            )
        ),
        array(
            "parent_menu" => "Role",
            "data" => array(
                array(
                    "menu" => "c", // child menu    
                    "menu_code" => "c",
                    "alert" => 2,
                ),
                array(
                    "menu" => "d", // child menu    
                    "menu_code" => "d",
                    "alert" => 0,
                )
            )
        )
    );
    public function __construct()
    {
        $this->data = [
            "title" => "Dashboard",
            "meta" => "meta dashboard",
            "data" => $this->menu
        ];
    }

    public function global_css()
    {
        return array(
            "assets/css/bootstrap.min.css",
            "assets/css/icons.min.css",
            "assets/css/metisMenu.min.css",
            "assets/css/app.min.css",
        );
    }
    function dashboard()
    {
        return response()->json(['css' => $this->global_css()], 200);
    }
    public function index()
    {
        return view('dashboard.index', $this->data);
    }
}
