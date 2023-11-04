<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $video_url = $_POST['video_url'];
    $download_format = $_POST['download_format'];
    $quality = $_POST['quality'];

    // Validate and sanitize the video URL (you may want to add more validation)
    if (filter_var($video_url, FILTER_VALIDATE_URL) === false || !preg_match('/youtube\.com/', $video_url)) {
        echo "Invalid YouTube video URL. Please provide a valid URL.";
        exit();
    }

    // Build the download URL with the selected quality
    if ($quality === "4k" || $quality === "8k") {
        // For 4K and 8K quality, use the highest available quality
        $quality = "highest";
    }
    $download_url = $video_url . "&quality=" . $quality;

    // Generate a unique filename for the downloaded file
    $filename = "downloaded_file." . $download_format;

    // Download the video or audio using cURL
    $ch = curl_init($download_url);
    $fp = fopen($filename, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);

    if ($download_format === "mp3") {
        // If the user chose MP3 format, convert the downloaded file to MP3
        $mp3_filename = "downloaded_audio.mp3";
        exec("ffmpeg -i $filename -q:a 0 -map a $mp3_filename");
        unlink($filename); // Delete the original video file
        $filename = $mp3_filename;
    }

    // Send the downloaded file to the user as an attachment
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    readfile($filename);

    // Clean up by deleting the temporary file
    unlink($filename);
}
?>
