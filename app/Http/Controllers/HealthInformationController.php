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

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'content' => 'required',
    //     ]);

    //     HealthInformation::create($request->all());

    //     return redirect()->route('admin/health_informations')->with('success', 'Health Information created successfully.');
    // }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/informations', $image->hashName());

        $health_information = HealthInformation::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image->hashName(),
        ]);

        return redirect()->route('admin/health_informations')->with('success', 'Health Information created successfully.');
    }

    public function edit(string $id)
    {

        $health_information = HealthInformation::findOrFail($id);
        return view('admin.health_informations.update', compact('health_information'));
    }

    public function update(Request $request, string $id)
    {
              $healthInformation = HealthInformation::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);


        // $healthInformation->update($request->all());

        $HealthInformation->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/informations', $image->hashName());
            $HealthInformation->update(['image' => $image->hashName()]);
        }


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
