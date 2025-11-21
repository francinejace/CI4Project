<?php
// Samples pixels from an image and prints the top colors as hex codes (simple frequency-based).
$imagePath = __DIR__ . '/../app/Views/templates/images/wheels-logo.png';
if (!file_exists($imagePath)) {
    fwrite(STDERR, "Image not found: $imagePath\n");
    exit(2);
}
$info = getimagesize($imagePath);
if (!$info) { fwrite(STDERR, "Unable to read image info\n"); exit(3); }
$mime = $info['mime'];
if ($mime === 'image/png') {
    $img = imagecreatefrompng($imagePath);
} elseif ($mime === 'image/jpeg' || $mime === 'image/jpg') {
    $img = imagecreatefromjpeg($imagePath);
} elseif ($mime === 'image/gif') {
    $img = imagecreatefromgif($imagePath);
} else {
    fwrite(STDERR, "Unsupported image type: $mime\n");
    exit(4);
}
$w = imagesx($img);
$h = imagesy($img);
$step = max(1, (int) floor(min($w, $h) / 100)); // sample up to ~100 pixels per axis
$counts = [];
for ($y = 0; $y < $h; $y += $step) {
    for ($x = 0; $x < $w; $x += $step) {
        $rgba = imagecolorat($img, $x, $y);
        $a = ($rgba >> 24) & 0x7F;
        // Skip fully transparent pixels
        if ($a === 127) continue;
        $r = ($rgba >> 16) & 0xFF;
        $g = ($rgba >> 8) & 0xFF;
        $b = $rgba & 0xFF;
        // Reduce color resolution to cluster similar colors
        $r = intval(round($r / 16) * 16);
        $g = intval(round($g / 16) * 16);
        $b = intval(round($b / 16) * 16);
        $hex = sprintf('%02x%02x%02x', $r, $g, $b);
        if (!isset($counts[$hex])) $counts[$hex] = 0;
        $counts[$hex]++;
    }
}
arsort($counts);
$top = array_slice($counts, 0, 6, true);
// Output JSON: list of hex codes in order
$out = array_keys($top);
echo json_encode($out) . PHP_EOL;
?>