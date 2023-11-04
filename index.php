<!DOCTYPE html>
<html>
<head>
    <title>YouTube Video Downloader</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin: 20px auto;
            max-width: 400px;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        select,
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        select {
            height: 40px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>YouTube Video Downloader</h1>
        <form method="post" action="download.php">
            <label for="video_url">Enter YouTube Video URL:</label>
            <input type="text" name="video_url" id="video_url" required>
            <br>
            <label for="download_format">Select Download Format:</label>
            <select name="download_format" id="download_format">
                <option value="mp4">MP4</option>
                <option value="webm">WebM</option>
                <option value="mkv">MKV</option>
                <option value="mp3">MP3</option>
            </select>
            <br>
            <label for="quality">Select Video Quality:</label>
            <select name="quality" id="quality">
                <option value="144p">144p</option>
                <option value="360p">360p</option>
                <option value="480p">480p</option>
                <option value="720p">720p</option>
                <option value="1080p">1080p</option>
                <option value="4k">4K</option>
                <option value="8k">8K</option>
            </select>
            <br>
            <input type="submit" value="Download">
        </form>
        <div class="result">
            <!-- You can display download results or errors here -->
        </div>
    </div>
</body>
</html>
