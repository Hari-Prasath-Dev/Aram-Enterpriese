
import re

file_path = 'public/assets/css/style.css'
target_rgb_pattern = r'72\s+127\s+255' # matches "72 127 255"
replacement_rgb = '254 109 4'

with open(file_path, 'r') as f:
    content = f.read()

# Count matches
matches = re.findall(target_rgb_pattern, content)
print(f"Found {len(matches)} occurrences of '72 127 255'")

# Replace
new_content = re.sub(target_rgb_pattern, replacement_rgb, content)

# Check for hex
hex_matches = re.findall(r'#487[fF]{2}', content) # 487fff
print(f"Found {len(hex_matches)} occurrences of '#487fff'")

hex_matches2 = re.findall(r'#4880[fF]{2}', content) # 4880ff
print(f"Found {len(hex_matches2)} occurrences of '#4880ff'")

# Also replace hex if found
if hex_matches:
    new_content = re.sub(r'#487[fF]{2}', '#fe6d04', new_content, flags=re.IGNORECASE)

if hex_matches2:
    new_content = re.sub(r'#4880[fF]{2}', '#fe6d04', new_content, flags=re.IGNORECASE)

with open(file_path, 'w') as f:
    f.write(new_content)

print("Replacement complete.")
