#!/usr/bin/env python3
"""
Signature Enhancement Script
Enhances signature image quality for better appearance in LOA PDF
"""

from PIL import Image, ImageEnhance, ImageFilter, ImageOps
import sys

def enhance_signature(input_path, output_path):
    """
    Enhance signature image quality
    - Increase contrast
    - Sharpen edges
    - Remove noise
    - Ensure transparency
    """
    print(f"Loading image from: {input_path}")

    # Open the image
    img = Image.open(input_path)

    # Convert to RGBA if not already
    if img.mode != 'RGBA':
        img = img.convert('RGBA')

    # First, enhance sharpness on original image
    enhancer = ImageEnhance.Sharpness(img)
    img = enhancer.enhance(2.0)  # Increase sharpness

    # Enhance contrast
    enhancer = ImageEnhance.Contrast(img)
    img = enhancer.enhance(1.5)  # Moderate contrast increase

    # Apply sharpening filter
    img = img.filter(ImageFilter.SHARPEN)

    # Get image data for transparency processing
    data = img.getdata()

    # Create new image data with white background removed (make transparent)
    new_data = []

    for item in data:
        r, g, b, a = item

        # Calculate brightness
        brightness = (r + g + b) / 3

        # If pixel is very bright (likely background), make it transparent
        if brightness > 250:
            new_data.append((255, 255, 255, 0))  # Fully transparent
        elif brightness > 230:
            # Semi-transparent for near-white areas
            alpha = int((250 - brightness) * 12)
            new_data.append((r, g, b, alpha))
        else:
            # Keep darker pixels (the signature itself)
            # Make them slightly darker for better visibility
            darkness_factor = 0.8
            new_r = int(r * darkness_factor)
            new_g = int(g * darkness_factor)
            new_b = int(b * darkness_factor)
            new_data.append((new_r, new_g, new_b, a))

    # Update image with new data
    img.putdata(new_data)

    # Final subtle sharpness enhancement
    img = img.filter(ImageFilter.UnsharpMask(radius=1, percent=120, threshold=2))

    # Save the enhanced image
    print(f"Saving enhanced image to: {output_path}")
    img.save(output_path, 'PNG', optimize=True)

    print("✓ Signature enhancement completed!")
    print(f"  - Increased sharpness and clarity")
    print(f"  - Improved contrast")
    print(f"  - Transparent background")

    return True

if __name__ == "__main__":
    if len(sys.argv) < 2:
        # Default: enhance the current tdtd.png
        input_file = "public/assets/img/tdtd.png"
        output_file = "public/assets/img/tdtd_enhanced.png"
    elif len(sys.argv) == 2:
        input_file = sys.argv[1]
        output_file = input_file.replace('.png', '_enhanced.png')
    else:
        input_file = sys.argv[1]
        output_file = sys.argv[2]

    try:
        enhance_signature(input_file, output_file)
    except Exception as e:
        print(f"Error: {e}")
        sys.exit(1)
