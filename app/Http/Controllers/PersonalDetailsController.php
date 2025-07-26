<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalDetail;

class PersonalDetailsController extends Controller
{
    /**
     * Display a listing of the personal details.
     */
    public function index()
    {
        $details = PersonalDetail::all();
        return view('personal.index', compact('details'));
    }

    /**
     * Show the form for creating a new personal detail.
     */
    public function create()
    {
        return view('personal.create');
    }

    /**
     * Store a newly created personal detail in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        PersonalDetail::create($request->all());

        return redirect()->route('personal.index')->with('success', 'Personal Detail Added Successfully');
    }

    /**
     * Show the form for editing the specified personal detail.
     */
    public function edit($id)
    {
        $detail = PersonalDetail::findOrFail($id);
        return view('personal.edit', compact('detail'));
    }

    /**
     * Update the specified personal detail in storage.
     */
    public function update(Request $request, $id)
    {
        $detail = PersonalDetail::findOrFail($id);

        $request->validate([
            'full_name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $detail->update($request->all());

        return redirect()->route('personal.index')->with('success', 'Personal Detail Updated Successfully');
    }

    /**
     * Remove the specified personal detail from storage.
     */
    public function destroy($id)
    {
        $detail = PersonalDetail::findOrFail($id);
        $detail->delete();

        return redirect()->route('personal.index')->with('success', 'Personal Detail Deleted Successfully');
    }
}
