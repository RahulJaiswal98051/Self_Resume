<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Resume Builder</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4A90E2; /* A nice blue */
            --primary-dark: #357ABD;
            --text-color: #333;
            --light-gray: #f9f9f9;
            --border-color: #e0e0e0;
            --error-color: #e74c3c;
            --shadow-light: rgba(0, 0, 0, 0.05);
            --shadow-medium: rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: var(--light-gray);
            color: var(--text-color);
            line-height: 1.6;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px var(--shadow-light);
            max-width: 900px;
            margin: 40px auto;
            border: 1px solid var(--border-color);
        }

        h1 {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 30px;
            font-weight: 700;
            font-size: 2.5em;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--text-color);
            font-size: 0.95em;
        }

        input[type="text"],
        textarea {
            width: calc(100% - 22px); /* Account for padding and border */
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1em;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            outline: none;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        button {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.1em;
            font-weight: 600;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.2s ease;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 10px var(--shadow-light);
        }

        button:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px var(--shadow-medium);
        }

        .error {
            background-color: #ffe0e0;
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
            border-top: 1px dashed var(--border-color);
        }

        .result-section h2 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 2em;
        }

        pre {
            background-color: #f0f4f7;
            padding: 25px;
            border-radius: 8px;
            overflow-x: auto;
            white-space: pre-wrap;
            word-wrap: break-word;
            border: 1px solid var(--border-color);
            font-family: 'Inter', sans-serif;
            font-size: 0.95em;
            line-height: 1.8;
            color: #555;
            box-shadow: inset 0 1px 3px var(--shadow-light);
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

            <button type="submit">Generate Resume</button>
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