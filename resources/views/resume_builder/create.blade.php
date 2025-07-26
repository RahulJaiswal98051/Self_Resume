<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Resume Builder</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #00bcd4; /* Cyan/Teal - classic tech color */
            --primary-dark: #0097a7;
            --primary-light: #4dd0e1;
            --background-dark: #1a202c; /* Dark charcoal */
            --container-bg: #2d3748; /* Slightly lighter dark */
            --text-light: #e2e8f0; /* Off-white for text */
            --input-bg: #212936;
            --border-dark: #4a5568;
            --error-color: #ef4444; /* Red */
            --shadow-dark: rgba(0, 0, 0, 0.4);
        }

        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: var(--background-dark);
            color: var(--text-light);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background-color: var(--container-bg);
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 40px var(--shadow-dark);
            max-width: 900px;
            width: 100%;
            margin: 20px auto;
            border: 1px solid var(--border-dark);
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 30px;
            font-weight: 700;
            font-size: 3em;
            letter-spacing: 1px;
            text-shadow: 0 0 15px rgba(0, 188, 212, 0.6); /* Neon glow */
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text-light);
            font-size: 0.95em;
        }

        input[type="text"],
        textarea {
            width: calc(100% - 24px);
            padding: 14px;
            margin-bottom: 25px;
            border: 1px solid var(--border-dark);
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1em;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            outline: none;
            background-color: var(--input-bg);
            color: var(--text-light);
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 4px rgba(0, 188, 212, 0.4);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        button {
            background-color: var(--primary-color);
            color: var(--background-dark); /* Dark text on bright button */
            padding: 16px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.15em;
            font-weight: 700;
            width: 100%;
            transition: all 0.3s ease;
            letter-spacing: 1px;
            box-shadow: 0 4px 20px rgba(0, 188, 212, 0.4);
        }

        button:hover {
            background-color: var(--primary-light);
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(0, 188, 212, 0.6);
        }

        button:active {
            transform: translateY(0);
            box-shadow: 0 2px 10px rgba(0, 188, 212, 0.3);
        }

        .error {
            background-color: #4a1e27; /* Darker red background */
            color: var(--error-color);
            border: 1px solid var(--error-color);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-size: 0.9em;
        }

        .error ul {
            margin: 0;
            padding-left: 20px;
            list-style: disc;
        }

        .result-section {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px dashed var(--border-dark);
        }

        .result-section h2 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 20px;
            font-weight: 700;
            font-size: 2.2em;
            text-shadow: 0 0 10px rgba(0, 188, 212, 0.4);
        }

        pre {
            background-color: #212936; /* Match input background */
            padding: 25px;
            border-radius: 8px;
            overflow-x: auto;
            white-space: pre-wrap;
            word-wrap: break-word;
            border: 1px solid var(--border-dark);
            font-family: 'Inter', sans-serif;
            font-size: 0.95em;
            line-height: 1.8;
            color: var(--text-light);
            box-shadow: inset 0 1px 5px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>AI Resume Builder</h1>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('resume.generate') }}" method="POST">
            @csrf
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>

            <label for="contact_info">Contact Information (Email, Phone, LinkedIn URL):</label>
            <input type="text" id="contact_info" name="contact_info" value="{{ old('contact_info') }}" required>

            <label for="experience">Work Experience <small>(Job Title, Company, Dates, Responsibilities - one per line)</small>:</label>
            <textarea id="experience" name="experience" required>{{ old('experience') }}</textarea>

            <label for="education">Education <small>(Degree, University, Dates - one per line)</small>:</label>
            <textarea id="education" name="education" required>{{ old('education') }}</textarea>

            <label for="skills">Skills <small>(Comma-separated, e.g., Laravel, Vue.js, MySQL, REST APIs)</small>:</label>
            <textarea id="skills" name="skills" required>{{ old('skills') }}</textarea>

            <label for="project_details">Key Projects <small>(Project Name, Description, Your Role - one per line)</small>:</label>
            <textarea id="project_details" name="project_details">{{ old('project_details') }}</textarea>

            <label for="target_job">Target Job Role <small>(e.g., "Senior Laravel Developer", "Marketing Manager")</small>:</label>
            <input type="text" id="target_job" name="target_job" value="{{ old('target_job') }}">

            <button type="submit">Generate My AI Resume</button>
        </form>

        @if(isset($generatedResume))
            <div class="result-section">
                <h2>Generated Resume:</h2>
                <pre>{{ $generatedResume }}</pre>
            </div>
        @endif
    </div>
</body>
</html>