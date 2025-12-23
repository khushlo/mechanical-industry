<?php
require_once 'includes/functions.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit();
}

try {
    // Sanitize input data
    $first_name = sanitize($_POST['first_name'] ?? '');
    $last_name = sanitize($_POST['last_name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $phone = sanitize($_POST['phone'] ?? '');
    $company = sanitize($_POST['company'] ?? '');
    $industry = sanitize($_POST['industry'] ?? '');
    $subject = sanitize($_POST['subject'] ?? '');
    $message = sanitize($_POST['message'] ?? '');
    
    // Validate required fields
    if (empty($first_name) || empty($last_name) || empty($email) || empty($subject) || empty($message)) {
        echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
        exit();
    }
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Please enter a valid email address.']);
        exit();
    }
    
    // Get company information
    $company_info = getCompanyInfo();
    
    // Prepare email content
    $to = $company_info['email'];
    $email_subject = 'New Contact Form Submission: ' . $subject;
    
    $email_body = "
    <html>
    <body>
        <h2>New Contact Form Submission</h2>
        <table style='border-collapse: collapse; width: 100%;'>
            <tr>
                <td style='padding: 10px; border: 1px solid #ddd; background: #f9f9f9; font-weight: bold;'>Name:</td>
                <td style='padding: 10px; border: 1px solid #ddd;'>{$first_name} {$last_name}</td>
            </tr>
            <tr>
                <td style='padding: 10px; border: 1px solid #ddd; background: #f9f9f9; font-weight: bold;'>Email:</td>
                <td style='padding: 10px; border: 1px solid #ddd;'>{$email}</td>
            </tr>
            <tr>
                <td style='padding: 10px; border: 1px solid #ddd; background: #f9f9f9; font-weight: bold;'>Phone:</td>
                <td style='padding: 10px; border: 1px solid #ddd;'>{$phone}</td>
            </tr>
            <tr>
                <td style='padding: 10px; border: 1px solid #ddd; background: #f9f9f9; font-weight: bold;'>Company:</td>
                <td style='padding: 10px; border: 1px solid #ddd;'>{$company}</td>
            </tr>
            <tr>
                <td style='padding: 10px; border: 1px solid #ddd; background: #f9f9f9; font-weight: bold;'>Industry:</td>
                <td style='padding: 10px; border: 1px solid #ddd;'>{$industry}</td>
            </tr>
            <tr>
                <td style='padding: 10px; border: 1px solid #ddd; background: #f9f9f9; font-weight: bold;'>Subject:</td>
                <td style='padding: 10px; border: 1px solid #ddd;'>{$subject}</td>
            </tr>
            <tr>
                <td style='padding: 10px; border: 1px solid #ddd; background: #f9f9f9; font-weight: bold;'>Message:</td>
                <td style='padding: 10px; border: 1px solid #ddd;'>" . nl2br($message) . "</td>
            </tr>
            <tr>
                <td style='padding: 10px; border: 1px solid #ddd; background: #f9f9f9; font-weight: bold;'>Date:</td>
                <td style='padding: 10px; border: 1px solid #ddd;'>" . date('Y-m-d H:i:s') . "</td>
            </tr>
        </table>
    </body>
    </html>
    ";
    
    // Email headers
    $headers = [
        'MIME-Version' => '1.0',
        'Content-type' => 'text/html; charset=UTF-8',
        'From' => $email,
        'Reply-To' => $email,
        'X-Mailer' => 'PHP/' . phpversion()
    ];
    
    $header_string = '';
    foreach ($headers as $key => $value) {
        $header_string .= $key . ': ' . $value . "\r\n";
    }
    
    // Send email
    if (mail($to, $email_subject, $email_body, $header_string)) {
        // Save to database (optional)
        try {
            $db->query("
                INSERT INTO contact_submissions (
                    first_name, last_name, email, phone, company, industry, 
                    subject, message, ip_address, created_at
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
            ", [
                $first_name, $last_name, $email, $phone, $company, 
                $industry, $subject, $message, $_SERVER['REMOTE_ADDR']
            ]);
        } catch (Exception $e) {
            // Log error but don't fail the request
            error_log("Failed to save contact submission: " . $e->getMessage());
        }
        
        echo json_encode([
            'success' => true, 
            'message' => 'Thank you for contacting us! We will get back to you within 24 hours.'
        ]);
    } else {
        echo json_encode([
            'success' => false, 
            'message' => 'Sorry, there was an error sending your message. Please try again or contact us directly.'
        ]);
    }
    
} catch (Exception $e) {
    error_log("Contact form error: " . $e->getMessage());
    echo json_encode([
        'success' => false, 
        'message' => 'An unexpected error occurred. Please try again later.'
    ]);
}
?>