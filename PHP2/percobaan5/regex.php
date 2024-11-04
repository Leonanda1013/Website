<?php
$pattern = '/[a-z]/';
$text = 'This is a sample text.';
if (preg_match($pattern, $text)) {
    echo "Huruf kecil ditemukan.";
} else {
    echo "Tidak ada huruf kecil ditemukan.";
}

$pattern = '/[0-9]+/';
$text = 'This is a sample text 123.';
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan ditemukan: " . $matches[0];
} else {
    echo "Tidak ada.";
}

$pattern = '/apple/';
$replacement = 'banana';
$text = 'I like apple pie';
$new_text = preg_replace($pattern, $replacement, $text);
echo $new_text;

$pattern = '/go?d/';
$text = ' is good.';
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan : " . $matches[0];
} else {
    echo "Tidak ada cocokkan ditemukan.";
}
