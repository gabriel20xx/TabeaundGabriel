<?php

$apiKey = 'WfvXGr1LNov5Rgj19vzppLhAAhBTwlx43v1x0L9a';
$quoteFilename = 'daily_quote.txt';
$category = 'inspire';

if (file_exists($quoteFilename) && date('Y-m-d', filemtime($quoteFilename)) == date('Y-m-d')) {
    $quote = file_get_contents($quoteFilename);
} else {
    $apiUrl = 'https://quotes.rest/qod?category=' . $category . '?key=' . $apiKey;
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    if ($data && isset($data['contents']['quotes'][0]['quote'])) {
        $quote = $data['contents']['quotes'][0]['quote'];

        file_put_contents($quoteFilename, $quote);
    } else {
        $quote = 'Failed to fetch the daily quote.';
    }
}

echo '<blockquote>';
echo '<p>' . $quote . '</p>';
echo '</blockquote>';
?>
