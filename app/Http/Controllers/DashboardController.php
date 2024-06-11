<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'breadcrumbs' => [
                // 'Category' => "#",
            ],
            // 'defaultCategories' => $defaultCategories,
            // 'customCategories' => $customCategories,
            'content' => 'index',
        ];

        return view("home.index", $data);
    }
}
