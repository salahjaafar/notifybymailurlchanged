<?php

$url = "https://example.com";
$previous_contents = "";

// Email notification settings
$to = "youremail@example.com";
$subject = "URL has changed!";
$message = "The contents of the URL $url have changed.";

while (true) {
    // Fetch the contents of the URL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $contents = curl_exec($ch);
    curl_close($ch);

    // Compare the contents to the previous version
    if ($contents != $previous_contents) {
        // Send an email notification
        mail($to, $subject, $message);
    }

    // Wait for a certain amount of time before checking again
    sleep(60);
}
