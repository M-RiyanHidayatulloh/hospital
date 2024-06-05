<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HealthInformation;
use Illuminate\Http\Request;

class HealthInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Health Information',
            'breadcrumbs' => [
                // 'Category' => "#",
            ],
            'health_informations' => HealthInformation::paginate(3),
            'content' => 'admin.health_informations.index',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Health Information',
            'breadcrumbs' => [
                'health_informations' => route('health_informations.index'),
                'Create' => "#",
            ],
            'content' => 'admin.health_informations.create',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        HealthInformation::create($request->all());

        return redirect()->route('health_informations.index')->with('success', 'Health Information created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HealthInformation $healthInformation)
    {
        return view('health_informations.show', compact('healthInformation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HealthInformation $healthInformation)
    {
        $data = [
            'title' => 'Edit Health Information',
            'breadcrumbs' => [
                'health_informations' => route('health_informations.index'),
                'Edit' => "#",
            ],
            'health_information' => $healthInformation,
            'content' => 'admin.health_informations.edit',
        ];

        return view('admin.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HealthInformation $healthInformation)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $healthInformation->update($request->all());

        return redirect()->route('health_informations.index')->with('success', 'Health Information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HealthInformation $healthInformation)
    {
        $healthInformation->delete();

        return redirect()->route('health_informations.index')->with('success', 'Health Information deleted successfully.');
    }
}

