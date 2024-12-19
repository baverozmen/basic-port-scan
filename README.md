
# Port Scanner

This project is a PHP application that uses GuzzleHttp and fsockopen methods to check whether ports on an IP address are open.

## Installation

1. **Install dependencies with Composer:**

   ```bash
   composer require guzzlehttp/guzzle
   ```

2. **Ensure the required files are available:**

   - `port_list.json`: A JSON file containing port information. Example format:
     ```json
     {
       "ports": {
         "80": "HTTP",
         "443": "HTTPS",
         "22": "SSH"
       }
     }
     ```

3. **Directory structure:**
   
```
   
   network_scan/
   ├── composer.json
   ├── composer.lock
   ├── function_code.php
   ├── port_list.json
   ├── start.php
   └── vendor/
  
 ```
## Usage

1. Run the following command in the terminal:

   ```bash
   php start.php
   ```

2. The program will ask you to enter an IP address. For example:
   ```
   Please enter an IP address: 192.168.1.1
   ```

3. It will then scan the ports and write the open ports to a file.

4. The program will also prompt you to enter a filename. For example:
   ```
   Enter the filename: output.txt
   ```

5. The results will be saved to the `output.txt` file.

## Requirements

- PHP >= 7.4
- Composer
- GuzzleHttp library

## License

This project is licensed under the [MIT License](LICENSE).