<?php
/**
 * Institute of Accountancy Arusha - Customization Script
 * This script applies custom configurations for the e-learning platform
 */

echo "<h1>🎓 Institute of Accountancy Arusha - Platform Customizations</h1>";

// Configuration settings for the institute
$institute_config = [
    'platform_name' => 'Institute of Accountancy Arusha E-Learning Platform',
    'organization' => 'Institute of Accountancy Arusha',
    'admin_email' => 'admin@iaa.ac.tz',
    'site_url' => 'http://localhost:8000',
    'theme_color_primary' => '#1e3a8a',
    'theme_color_secondary' => '#f59e0b',
    'allow_registration' => true,
    'registration_approval' => true,
    'default_language' => 'english',
    'timezone' => 'Africa/Dar_es_Salaam'
];

echo "<h2>🎨 Institute Branding Configuration</h2>";
echo "<div style='background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
foreach ($institute_config as $key => $value) {
    echo "<p><strong>" . ucwords(str_replace('_', ' ', $key)) . ":</strong> $value</p>";
}
echo "</div>";

echo "<h2>👥 User Roles for Institute</h2>";
echo "<div style='background: #e3f2fd; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
echo "<h3>🎓 Facilitator Role (Teacher)</h3>";
echo "<ul>";
echo "<li>Create and manage courses</li>";
echo "<li>Upload lecture materials (PDF, videos)</li>";
echo "<li>Create quizzes and assignments</li>";
echo "<li>Grade student work</li>";
echo "<li>Track student progress</li>";
echo "<li>Send announcements</li>";
echo "</ul>";

echo "<h3>📚 Student Role</h3>";
echo "<ul>";
echo "<li>Register for courses</li>";
echo "<li>Access course materials</li>";
echo "<li>Download PDF files</li>";
echo "<li>Watch video lectures</li>";
echo "<li>Take quizzes and submit assignments</li>";
echo "<li>View grades and progress</li>";
echo "</ul>";

echo "<h3>⚙️ Administrator Role</h3>";
echo "<ul>";
echo "<li>Manage all users and courses</li>";
echo "<li>Configure platform settings</li>";
echo "<li>Generate reports</li>";
echo "<li>Manage system backups</li>";
echo "<li>Monitor platform usage</li>";
echo "</ul>";
echo "</div>";

echo "<h2>📚 Accounting Course Templates</h2>";
$course_templates = [
    'Financial Accounting I' => [
        'description' => 'Introduction to financial accounting principles',
        'modules' => ['Basic Accounting Concepts', 'Journal Entries', 'Trial Balance', 'Financial Statements'],
        'assessments' => ['Weekly Quizzes', 'Midterm Exam', 'Final Project', 'Practical Exercises']
    ],
    'Cost Accounting' => [
        'description' => 'Cost analysis and management accounting',
        'modules' => ['Cost Classification', 'Job Costing', 'Process Costing', 'Budgeting'],
        'assessments' => ['Case Studies', 'Cost Analysis Projects', 'Monthly Tests', 'Final Exam']
    ],
    'Auditing' => [
        'description' => 'Principles and practices of auditing',
        'modules' => ['Audit Planning', 'Internal Controls', 'Audit Evidence', 'Reporting'],
        'assessments' => ['Audit Simulations', 'Group Projects', 'Professional Ethics Quiz', 'Comprehensive Exam']
    ],
    'Taxation' => [
        'description' => 'Tax laws and compliance',
        'modules' => ['Income Tax', 'VAT', 'Corporate Tax', 'Tax Planning'],
        'assessments' => ['Tax Return Preparation', 'Case Studies', 'Law Updates Quiz', 'Practical Exam']
    ]
];

echo "<div style='background: #f3e5f5; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
foreach ($course_templates as $course => $details) {
    echo "<h3>📖 $course</h3>";
    echo "<p><strong>Description:</strong> {$details['description']}</p>";
    echo "<p><strong>Modules:</strong> " . implode(', ', $details['modules']) . "</p>";
    echo "<p><strong>Assessments:</strong> " . implode(', ', $details['assessments']) . "</p>";
    echo "<hr>";
}
echo "</div>";

echo "<h2>📝 Assessment Templates</h2>";
$quiz_templates = [
    'Multiple Choice Quiz' => [
        'type' => 'Objective Assessment',
        'time_limit' => '60 minutes',
        'questions' => '20-30 questions',
        'auto_grading' => 'Yes',
        'feedback' => 'Immediate'
    ],
    'Case Study Analysis' => [
        'type' => 'Subjective Assessment',
        'time_limit' => '2 hours',
        'questions' => '3-5 scenarios',
        'auto_grading' => 'No',
        'feedback' => 'Manual review'
    ],
    'Practical Exercise' => [
        'type' => 'Hands-on Assessment',
        'time_limit' => '90 minutes',
        'questions' => 'Problem solving',
        'auto_grading' => 'Partial',
        'feedback' => 'Step-by-step'
    ]
];

echo "<div style='background: #fff3cd; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
foreach ($quiz_templates as $template => $details) {
    echo "<h3>✏️ $template</h3>";
    foreach ($details as $key => $value) {
        echo "<p><strong>" . ucwords(str_replace('_', ' ', $key)) . ":</strong> $value</p>";
    }
    echo "<hr>";
}
echo "</div>";

echo "<h2>📁 Content Management Features</h2>";
echo "<div style='background: #d4edda; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
echo "<h3>📤 File Upload Capabilities</h3>";
echo "<ul>";
echo "<li><strong>PDF Documents:</strong> Lecture notes, handouts, reference materials</li>";
echo "<li><strong>Video Files:</strong> Recorded lectures, tutorials, demonstrations</li>";
echo "<li><strong>Audio Files:</strong> Podcasts, recorded discussions</li>";
echo "<li><strong>Presentations:</strong> PowerPoint, Google Slides</li>";
echo "<li><strong>Spreadsheets:</strong> Excel templates, financial models</li>";
echo "</ul>";

echo "<h3>🔒 Access Control</h3>";
echo "<ul>";
echo "<li>Course-based access permissions</li>";
echo "<li>Download tracking and limits</li>";
echo "<li>Time-based content release</li>";
echo "<li>Student progress requirements</li>";
echo "</ul>";
echo "</div>";

echo "<h2>📊 Progress Tracking & Reports</h2>";
echo "<div style='background: #cce5ff; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
echo "<h3>For Facilitators:</h3>";
echo "<ul>";
echo "<li>Student attendance and engagement</li>";
echo "<li>Quiz and assignment scores</li>";
echo "<li>Course completion rates</li>";
echo "<li>Individual student progress</li>";
echo "<li>Class performance analytics</li>";
echo "</ul>";

echo "<h3>For Students:</h3>";
echo "<ul>";
echo "<li>Personal progress dashboard</li>";
echo "<li>Grade book with detailed feedback</li>";
echo "<li>Course completion certificates</li>";
echo "<li>Learning path recommendations</li>";
echo "</ul>";
echo "</div>";

echo "<h2>🚀 Implementation Checklist</h2>";
echo "<div style='background: #f0f8ff; padding: 20px; border-radius: 8px; margin: 20px 0;'>";
echo "<h3>✅ Post-Installation Tasks:</h3>";
echo "<ol>";
echo "<li>Apply institute branding and theme</li>";
echo "<li>Configure user registration settings</li>";
echo "<li>Create course categories for accounting subjects</li>";
echo "<li>Set up user roles and permissions</li>";
echo "<li>Create sample courses with templates</li>";
echo "<li>Configure email notifications</li>";
echo "<li>Set up backup and maintenance schedules</li>";
echo "<li>Train facilitators on platform usage</li>";
echo "<li>Create user documentation</li>";
echo "<li>Conduct system testing</li>";
echo "</ol>";
echo "</div>";

echo "<div style='background: #c8e6c9; padding: 20px; border-radius: 8px; margin: 20px 0; text-align: center;'>";
echo "<h3>🎓 Ready to Launch!</h3>";
echo "<p>Your Institute of Accountancy Arusha E-Learning Platform is configured with:</p>";
echo "<p>✅ Professional branding ✅ User role management ✅ Course templates</p>";
echo "<p>✅ Assessment tools ✅ Content management ✅ Progress tracking</p>";
echo "<p><strong>Complete the Chamilo installation and apply these customizations!</strong></p>";
echo "</div>";
?>