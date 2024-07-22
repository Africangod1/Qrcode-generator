import sys
import pyqrcode
import os

# Function to create a QR code from a given URL
def create_qrcode(url):
    # Generate the QR code
    qr = pyqrcode.create(url)
    
    # Construct the filename, replacing slashes to avoid directory issues
    filename = f"qr_downloads/{url.split('//')[1].replace('/', '_')}.png"
    
    # Ensure the output directory exists
    if not os.path.exists('qr_downloads'):
        os.makedirs('qr_downloads')
    
    # Save the QR code as a PNG file
    qr.png(filename, scale=6)
    
    # Return the filename for further use
    return filename

# Main script execution
if __name__ == "__main__":
    # Ensure the script is called with exactly one argument (the URL)
    if len(sys.argv) != 2:
        print("Usage: python qr_code_generator.py <url>")
        sys.exit(0)
    
    # Get the URL from the command line arguments
    url = sys.argv[1]
    
    # Create the QR code and get the output filename
    output = create_qrcode(url)
    
    # Print the output filename for the calling process
    print(output)

"""
Imports: Import necessary libraries (sys, pyqrcode, os).
Function Definition: The create_qrcode function is defined to generate a QR code from a given URL.
QR Code Generation: pyqrcode.create(url) generates the QR code.
Filename Construction: The filename is constructed by modifying the URL to avoid directory traversal issues.
Directory Check: Ensures the qr_downloads directory exists, and creates it if it doesn't.
Saving the QR Code: The QR code is saved as a PNG file with a scale of 6.
Return Statement: The function returns the filename.
Main Execution Block: Ensures the script is run with one argument and processes the URL to generate and save the QR code, then prints the filename.
"""