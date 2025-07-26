<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ResumeService
{
    protected $apiKey;
    protected $client;

    public function __construct()
    {
        $this->apiKey = env('OPENAI_API_KEY');
        $this->client = new Client();
    }

    public function generateResume($userData)
    {
        // Check if API key is properly configured
        if (!$this->apiKey || $this->apiKey === 'sk-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx') {
            return $this->generateMockResume($userData);
        }

        $prompt = "You are a professional resume writer. Based on the following data, generate a complete and polished resume:\n\n";
        $prompt .= "Personal Info:\n";
        $prompt .= "Name: " . ($userData['name'] ?? '{{name}}') . "\n";
        $prompt .= "Email: " . ($userData['email'] ?? '{{email}}') . "\n";
        $prompt .= "Phone: " . ($userData['phone'] ?? '{{phone}}') . "\n\n";
        $prompt .= "Academic Background:\n";
        $prompt .= "- " . ($userData['degree'] ?? '{{degree}}') . " at " . ($userData['institute'] ?? '{{institute}}') . ", " . ($userData['year'] ?? '{{year}}') . ", " . ($userData['grade'] ?? '{{grade}}') . "\n\n";
        $prompt .= "Professional Experience:\n";
        $prompt .= "- Role: " . ($userData['role'] ?? '{{role}}') . " at " . ($userData['company'] ?? '{{company}}') . ", Duration: " . ($userData['duration'] ?? '{{duration}}') . ", Responsibilities: " . ($userData['desc'] ?? '{{desc}}') . "\n\n";
        $prompt .= "Skills:\n" . ($userData['skills'] ?? '{{skills}}') . "\n\n";
        $prompt .= "Job Target:\n";
        $prompt .= ($userData['job_title'] ?? '{{job_title}}') . " at " . ($userData['job_company'] ?? '{{job_company}}') . ". Here's the job description: " . ($userData['job_description'] ?? '{{job_description}}') . "\n\n";
        $prompt .= "Please return the full resume in professional format.";

        try {
            $response = $this->client->post('https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $this->apiKey,
                ],
                'json' => [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        ['role' => 'system', 'content' => 'You are a resume expert.'],
                        ['role' => 'user', 'content' => $prompt],
                    ],
                    'temperature' => 0.7,
                ]
            ]);

            $body = json_decode($response->getBody()->getContents(), true);
            return $body['choices'][0]['message']['content'];

        } catch (RequestException $e) {
            \Log::error('OpenAI API Error: ' . $e->getMessage());
            // Fallback to mock resume if API fails
            return $this->generateMockResume($userData);
        }
    }

    private function generateMockResume($userData)
    {
        $name = $userData['name'] ?? 'John Doe';
        $email = $userData['email'] ?? 'john.doe@email.com';
        $phone = $userData['phone'] ?? '(555) 123-4567';
        $degree = $userData['degree'] ?? 'Bachelor of Computer Science';
        $institute = $userData['institute'] ?? 'University Name';
        $year = $userData['year'] ?? '2023';
        $grade = $userData['grade'] ?? 'A';
        $role = $userData['role'] ?? 'Software Developer';
        $company = $userData['company'] ?? 'Tech Company';
        $duration = $userData['duration'] ?? '2 years';
        $desc = $userData['desc'] ?? 'Developed web applications';
        $skills = $userData['skills'] ?? 'JavaScript, PHP, Laravel';
        $jobTitle = $userData['job_title'] ?? 'Senior Developer';
        $jobCompany = $userData['job_company'] ?? 'Target Company';

        return "
<h1>{$name}</h1>
<p><strong>Email:</strong> {$email} | <strong>Phone:</strong> {$phone}</p>

<h2>PROFESSIONAL SUMMARY</h2>
<p>Experienced {$role} with expertise in {$skills}. Seeking a {$jobTitle} position at {$jobCompany}.</p>

<h2>EDUCATION</h2>
<p><strong>{$degree}</strong><br>
{$institute}, {$year}<br>
Grade: {$grade}</p>

<h2>PROFESSIONAL EXPERIENCE</h2>
<p><strong>{$role}</strong> - {$company}<br>
<em>{$duration}</em></p>
<ul>
<li>{$desc}</li>
<li>Collaborated with cross-functional teams to deliver high-quality software solutions</li>
<li>Participated in code reviews and maintained coding standards</li>
</ul>

<h2>TECHNICAL SKILLS</h2>
<p>{$skills}</p>

<h2>ADDITIONAL INFORMATION</h2>
<p>Strong problem-solving abilities, excellent communication skills, and passion for continuous learning.</p>

<p><em>Note: This is a demo resume generated without OpenAI API. Please configure your OpenAI API key in the .env file for AI-powered resume generation.</em></p>
        ";
    }
}