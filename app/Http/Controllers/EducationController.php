<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Education;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::where('user_id', 1)->get();
        return view('education.index', compact('educations'));
    }

    public function create()
    {
        return view('education.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'institute' => 'required',
            'degree' => 'required',
            'start_date' => 'required|date',
        ]);

        $data = $request->all();
        $data['user_id'] = 1;

        Education::create($data);

        return redirect()->route('education.index')->with('success', 'Education added successfully.');
    }

    public function edit($id)
    {
        $education = Education::where('id', $id)
            ->where('user_id', 1)
            ->firstOrFail();

        return view('education.edit', compact('education'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'institute' => 'required',
            'degree' => 'required',
            'start_date' => 'required|date',
        ]);

        $education = Education::where('id', $id)
            ->where('user_id', 1)
            ->firstOrFail();

        $education->update($request->all());

        return redirect()->route('education.index')->with('success', 'Education updated successfully.');
    }

    public function destroy($id)
    {
        $education = Education::where('id', $id)
            ->where('user_id', 1)
            ->firstOrFail();

        $education->delete();

        return redirect()->route('education.index')->with('success', 'Education deleted.');
    }
}
