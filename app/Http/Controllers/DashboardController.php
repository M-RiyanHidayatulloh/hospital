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
            'content' => 'dashboard.index',
        ];

        return view("admin.wrapper", $data);
    }
}
