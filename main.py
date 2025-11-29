import os
import subprocess
import time
from pyfiglet import Figlet
from termcolor import colored
from colorama import init

# Initialize colorama for cross-platform colored output
init()

def print_banner():
    f = Figlet(font='slant')
    banner = f.renderText("FingerprintTrap")
    credit = colored("Made By Aryan Giri", "cyan", attrs=["bold"])
    repo_url = colored("https://github.com/giriaryan694-a11y/FingerprintTrap", "light_yellow", attrs=["underline"])
    print(colored(banner, "red"))
    print(credit)
    print(f"Repo: {repo_url}\n")

def start_php_server():
    print(colored("[*] Starting PHP server...", "yellow"))
    php_process = subprocess.Popen(
        ["php", "-S", "127.0.0.1:8000", "index.php"],
        stdout=subprocess.PIPE,
        stderr=subprocess.PIPE,
    )
    time.sleep(2)  # Wait for server to start
    print(colored("[+] PHP server running at http://127.0.0.1:8000", "green"))
    return php_process

def tail_logs():
    print(colored("\n[*] Tailing hook_logs.txt... (Press Ctrl+C to stop)", "yellow"))
    try:
        with open("hook_logs.txt", "r") as f:
            f.seek(0, os.SEEK_END)  # Start at the end of the file
            while True:
                line = f.readline()
                if line:
                    print(colored(line.strip(), "light_magenta"))
                else:
                    time.sleep(0.5)  # Sleep briefly if no new data
    except KeyboardInterrupt:
        print(colored("\n[-] Stopping log tail...", "red"))

def main():
    print_banner()
    php_process = start_php_server()
    try:
        tail_logs()
    except KeyboardInterrupt:
        print(colored("\n[-] Shutting down PHP server...", "red"))
        php_process.terminate()
        php_process.wait()

if __name__ == "__main__":
    main()
      
