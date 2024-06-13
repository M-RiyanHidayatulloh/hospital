<?php

namespace App\Http\Controllers;
use App\Models\HealthInformation;
use Illuminate\Http\Request;

class HealthInformationController extends Controller
{
    public function index()
    {

        // $health_informations = HealthInformation::latest()->paginate(2);
        $health_informations = HealthInformation::paginate(4);
        $health_informations = HealthInformation::latest()->paginate(2);
        $health_informations = HealthInformation::orderBy('id', 'desc')->get();
        $health_informations = HealthInformation::count();
        $health_informations = HealthInformation::all();
      
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
            'category' => 'required|string|max:255',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/informations', $image->hashName());

        $health_information = HealthInformation::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image->hashName(),
            'category' => $request->category,
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
            'category' => 'required|string|max:255',
        ]);


        // $healthInformation->update($request->all());

        $healthInformation->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'category' => $request->category,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/informations', $image->hashName());
            $healthInformation->update(['image' => $image->hashName()]);
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


    public function searchHealthInformations(Request $request)
    {
        $searchTerm = $request->input('search');

        $health_informations = HealthInformation::where('title', 'like', '%' . $searchTerm . '%')
            ->orWhere('category', 'like', '%' . $searchTerm . '%')
            ->get();

        return view('your-view-name', compact('health_informations', 'searchTerm'));
    }



    public function trash() {
        $health_informations = HealthInformation::onlyTrashed()->get();
         return view('admin.health_informations.trash', compact('health_informations'));
     }
 
     public function restore($id = null) {
         if($id != null) {
             $health_informations = HealthInformation::onlyTrashed()
             ->where('id', $id)
             ->restore();
         } else {
             $health_informations = HealthInformation::onlyTrashed()->restore();
         }
         return redirect()->route('admin/health_informations/trash')->with('success', 'Health Information Was Restore');
     }
 
     public function destroy($id = null) {
         if($id != null) {
             $health_informations = HealthInformation::onlyTrashed()
             ->where('id', $id)
             ->forceDelete();
         } else {
             $health_informations = HealthInformation::onlyTrashed()->forceDelete();
         }
         return redirect()->route('admin/health_informations/trash')->with('success', 'Health Information Was Delete Permanently');
     }

}
