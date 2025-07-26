<?php

namespace App\Http\Controllers;

use App\Services\ResumeService;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    protected $resumeService;

    public function __construct(ResumeService $resumeService)
    {
        $this->resumeService = $resumeService;
    }

    public function generate(Request $request)
    {
        $userData = $request->all();

        $generatedResume = $this->resumeService->generateResume($userData);

        if ($generatedResume === null) {
            return response()->json(['error' => 'Failed to generate resume'], 500);
        }

        return response()->json(['resume' => $generatedResume]);
    }
}
