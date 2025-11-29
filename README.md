
FingerprintTrap
==========================

A stealthy PHP-based fingerprinting tool to collect visitor data (IP, User-Agent, screen resolution, battery status, timezone, CPU cores, OS) and log it to `hook_logs.txt`.

=========================
FEATURES
=========================
- Silent Data Collection: Harvests visitor data without raising suspicion.
- Responsive Design: Works on both desktop and mobile.
- Real-Time Logging: Logs data to `hook_logs.txt` for immediate review.
- Python Server Manager: Automates PHP server startup and log tailing with a styled terminal UI.

=====================
REQUIREMENTS
=====================
- Python 3.x
- PHP 7.x or higher
- Dependencies: pyfiglet, termcolor, colorama

====================
SETUP
====================
1. Clone the Repository:
```
   git clone https://github.com/giriaryan694-a11y/FingerprintTrap.git
   cd FingerprintTrap
```
3. Install Dependencies:
   ```
   pip install -r requirements.txt
   ```
4. Run the Server:
   ```
   python main.py.py
   ```
   This will start the PHP server and tail `hook_logs.txt` in real-time.

======================
FILES
======================
- index.php: Main PHP script for data collection.
- main.py: Python script to run the server and tail logs.
- hook_logs.txt: Log file for collected data.
- requirements.txt: Python dependencies.

===========================
USAGE
===========================
1. Start the Server:
   ```
   python server.py
   ```
   The server will start at http://127.0.0.1:8000.

3. Access the Page:
   Open http://127.0.0.1:8000 in a browser (or share the link).
   The page will display a video while silently collecting data.

4. View Logs:
   The script will automatically tail `hook_logs.txt` in real-time.
   Press Ctrl+C to stop the server and exit.

=======================
EXAMPLE LOG OUTPUT
=======================
```
[2025-11-29 12:34:56]
Ip: 192.168.1.100
Ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36
Res: 1920x1080
Battery: 87%
Tz: Asia/Kolkata
Cores: 8
Os: Win32 (Windows)
Timestamp: 2025-11-29T12:34:56.123Z
```
=======================
CUSTOMIZATION
=======================
- Change the Video: Edit the `iframe` in `index.php` to use a different YouTube video.
- Add More Data Points: Extend the JavaScript in `index.php` to collect additional information (e.g., geolocation, fonts).
- Styling: Modify the CSS in `index.php` to change the appearance.

=========================
LEGAL DISCLAIMER
=========================
FingerprintTrap is for educational and authorized testing purposes only.
Always obtain explicit permission before testing on any system or network.
Unauthorized use is illegal and unethical.

=========================
CONTACT
==========================
Made by Aryan Giri
- GitHub: https://github.com/giriaryan694-a11y
- Project Link: https://github.com/giriaryan694-a11y/FingerprintTrap
