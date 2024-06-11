<?php

namespace App\Http\Controllers;
use App\Models\HealthInformation;
use Illuminate\Http\Request;

class HealthInformationController extends Controller
{
    public function index()
    {
        $health_informations = HealthInformation::latest()->paginate(2);
        return view('admin.health_informations.index', compact('health_informations'));
    }

    public function create()
    {
        return view('admin.health_informations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        HealthInformation::create($request->all());

        return redirect()->route('admin/health_informations')->with('success', 'Health Information created successfully.');
    }

    public function edit(string $id)
    {

        $health_information = HealthInformation::findOrFail($id);
        return view('admin.health_informations.update', compact('health_information'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);
        $healthInformation = HealthInformation::findOrFail($id);
        $healthInformation->update($request->all());

        return redirect()->route('admin/health_informations')->with('success', 'Health Information updated successfully.');
    }

    public function delete($id)
    {
        $health_informations = HealthInformation::findOrFail($id)->delete();
        if($health_informations) {
            return redirect()->route('admin/health_informations')->with('success', 'Health Information Data Was Deleted');
        } else {
            return redirect()->route('admin/health_informations')->with('error', 'Health Information Delete Fail');
        }
    }


}
