<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index()
{
    $resumes = Resume::with(['user', 'template'])->get();
    return view('resumes.index', compact('resumes'));
}

    public function create()
    {
        return view('resumes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'user_id' => 'required',
            'templet_id' => 'required',
            'status' => 'required',
        ]);

        Resume::create($request->all());
        return redirect()->route('resume.index')->with('success', 'Resume created successfully.');
    }

    public function edit($id)
    {
        $resume = Resume::findOrFail($id);
        return view('resume.edit', compact('resume'));
    }

    public function update(Request $request, $id)
    {
        $resume = Resume::findOrFail($id);
        $resume->update($request->all());

        return redirect()->route('resume.index')->with('success', 'Resume updated successfully.');
    }

    public function destroy($id)
    {
        Resume::findOrFail($id)->delete();
        return redirect()->route('resume.index')->with('success', 'Resume deleted successfully.');
    }
}
