<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client; // Import Guzzle
use Illuminate\Support\Facades\Log; // For logging errors

class ResumeController extends Controller
{
    /**
     * Show the form for creating a new resume.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('resume_builder.create');
    }

    /**
     * Generate a resume using Gemini API.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generate(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'contact_info'   => 'required|string|max:500',
            'experience'     => 'required|string',
            'education'      => 'required|string',
            'skills'         => 'required|string',
            'project_details' => 'nullable|string',
            'target_job'     => 'nullable|string|max:255',
        ]);

        $geminiApiKey = env('GEMINI_API_KEY');
        if (empty($geminiApiKey)) {
            return back()->withErrors(['gemini_api' => 'Gemini API key is not configured. Please check your .env file.'])->withInput();
        }

        // Prepare the prompt for the Gemini API
        $prompt = $this->prepareGeminiPrompt($request);

        // Initialize Guzzle HTTP client
        $client = new Client();


        try {
            $response = $client->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'query' => [
                    'key' => $geminiApiKey,
                ],
                'json' => [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $prompt],
                            ],
                        ],
                    ],
                ],
            ]);

            $statusCode = $response->getStatusCode();
            $body = json_decode($response->getBody()->getContents(), true);

            if ($statusCode == 200 && isset($body['candidates'][0]['content']['parts'][0]['text'])) {
                $generatedResume = $body['candidates'][0]['content']['parts'][0]['text'];
                return view('resume_builder.create', ['generatedResume' => $generatedResume]);
            } else {
                Log::error('Gemini API Error: ' . json_encode($body));
                return back()->withErrors(['gemini_api' => 'Failed to generate resume from AI. Please try again.'])->withInput();
            }

        } catch (\GuzzleHttp\Exception\ClientException $e) {
            // This catches 4xx errors (e.g., 400 Bad Request, 401 Unauthorized)
            $responseBody = $e->getResponse()->getBody()->getContents();
            Log::error('Gemini API Client Error: ' . $e->getMessage() . ' Response: ' . $responseBody);
            return back()->withErrors(['gemini_api' => 'API Client Error: ' . (json_decode($responseBody)->error->message ?? 'An unknown error occurred with the API request.')])->withInput();
        } catch (\Exception $e) {
            // Catch any other general exceptions
            Log::error('General Error communicating with Gemini API: ' . $e->getMessage());
            return back()->withErrors(['gemini_api' => 'An unexpected error occurred while communicating with the AI.'])->withInput();
        }
    }

    /**
     * Prepares the prompt string for the Gemini API based on user input.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function prepareGeminiPrompt(Request $request)
    {
        $prompt = "Generate a professional and concise resume in plain text format based on the following information. Focus on clarity and readability. Do not include any formatting like bolding, italics, or bullet points if possible. Use simple line breaks.\n\n";

        $prompt .= "Name: " . $request->input('name') . "\n";
        $prompt .= "Contact Information: " . $request->input('contact_info') . "\n\n";

        if ($request->filled('target_job')) {
            $prompt .= "Target Job Role: " . $request->input('target_job') . "\n\n";
        } else {
            $prompt .= "Objective: To secure a challenging position where my skills and experience can be utilized for company growth.\n\n";
        }

        $prompt .= "Experience:\n" . $request->input('experience') . "\n\n";
        $prompt .= "Education:\n" . $request->input('education') . "\n\n";
        $prompt .= "Skills: " . $request->input('skills') . "\n";

        if ($request->filled('project_details')) {
            $prompt .= "\nKey Projects:\n" . $request->input('project_details') . "\n";
        }

        $prompt .= "\n\nEnsure the resume is ready to be copied and pasted into a plain text editor without formatting issues. Keep it within 1-2 pages equivalent length.";

        return $prompt;
    }
}