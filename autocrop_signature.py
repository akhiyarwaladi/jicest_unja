#!/usr/bin/env python3
"""
Auto-crop signature image with precision
Removes all whitespace and keeps only the signature content
"""

from PIL import Image
import sys

def get_bounding_box(img):
    """
    Calculate the bounding box of non-transparent content
    Returns (left, top, right, bottom)
    """
    # Convert to RGBA if not already
    if img.mode != 'RGBA':
        img = img.convert('RGBA')

    # Get pixel data
    pixels = img.load()
    width, height = img.size

    # Find boundaries
    min_x = width
    min_y = height
    max_x = 0
    max_y = 0

    # Scan all pixels to find content boundaries
    for y in range(height):
        for x in range(width):
            r, g, b, a = pixels[x, y]

            # If pixel is not transparent and not white
            if a > 10:  # Has some opacity
                # Check if it's not pure white
                brightness = (r + g + b) / 3
                if brightness < 250:  # Not white
                    min_x = min(min_x, x)
                    min_y = min(min_y, y)
                    max_x = max(max_x, x)
                    max_y = max(max_y, y)

    # Add small padding (2 pixels on each side)
    padding = 2
    min_x = max(0, min_x - padding)
    min_y = max(0, min_y - padding)
    max_x = min(width, max_x + padding)
    max_y = min(height, max_y + padding)

    return (min_x, min_y, max_x, max_y)

def autocrop_signature(input_path, output_path):
    """
    Auto-crop signature to remove all whitespace
    """
    print(f"Loading image: {input_path}")

    # Load image
    img = Image.open(input_path)
    original_size = img.size
    print(f"  Original size: {original_size[0]}x{original_size[1]} pixels")

    # Get bounding box
    print("  Calculating precise bounding box...")
    bbox = get_bounding_box(img)

    if bbox[0] >= bbox[2] or bbox[1] >= bbox[3]:
        print("  ERROR: No content found in image!")
        return False

    crop_width = bbox[2] - bbox[0]
    crop_height = bbox[3] - bbox[1]

    print(f"  Content found at: left={bbox[0]}, top={bbox[1]}, right={bbox[2]}, bottom={bbox[3]}")
    print(f"  Cropped size: {crop_width}x{crop_height} pixels")
    print(f"  Removed: {original_size[0] - crop_width}px width, {original_size[1] - crop_height}px height")

    # Crop image
    cropped = img.crop(bbox)

    # Save result
    print(f"Saving cropped image: {output_path}")
    cropped.save(output_path, 'PNG', optimize=True)

    print("✓ Auto-crop completed successfully!")
    print(f"  Whitespace removed from all sides")
    print(f"  Image is now tightly cropped to signature content")

    return True

if __name__ == "__main__":
    if len(sys.argv) < 2:
        # Default: crop the enhanced signature
        input_file = "public/assets/img/tdtd_new_enhanced.png"
        output_file = "public/assets/img/tdtd_cropped.png"
    elif len(sys.argv) == 2:
        input_file = sys.argv[1]
        output_file = input_file.replace('.png', '_cropped.png')
    else:
        input_file = sys.argv[1]
        output_file = sys.argv[2]

    try:
        autocrop_signature(input_file, output_file)
    except Exception as e:
        print(f"Error: {e}")
        import traceback
        traceback.print_exc()
        sys.exit(1)
