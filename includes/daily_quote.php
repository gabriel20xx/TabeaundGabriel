<?php
function call_api($method, $url, $data = false, $api_key = null)
{
    $curl = curl_init();

    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data) {
                if (!is_array($data)) {
                    die('Error: $data should be an array.');
                }

                $url .= '?' . http_build_query($data);
            }
    }

    $headers = ['Content-Type: application/json'];
    if (!empty($api_key)) {
        $headers[] = 'X-Theysaidso-Api-Secret: ' . $api_key;
    }

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}

$api_key = 'WfvXGr1LNov5Rgj19vzppLhAAhBTwlx43v1x0L9a';
$category = 'inspire';
$quoteFilename = 'quote/daily-quote.txt';
$failed = false;

if (file_exists($quoteFilename) && date('Y-m-d', filemtime($quoteFilename)) == date('Y-m-d')) {
    $quoteData = json_decode(file_get_contents($quoteFilename), true);

    // Check if the file contains the expected data structure
    if ($quoteData && isset($quoteData['quote'], $quoteData['author'])) {
        $quote = $quoteData['quote'];
        $author = $quoteData['author'];
    } else {
        $failed = true;
    }
} else {
    $qod_result = call_api("GET", "https://quotes.rest/qod?category=" . $category, false, $api_key);
    $qod_data = json_decode($qod_result, true);

    if ($qod_data && isset($qod_data['contents']['quotes'][0]['quote'], $qod_data['contents']['quotes'][0]['author'])) {
        $quote = $qod_data['contents']['quotes'][0]['quote'];
        $author = $qod_data['contents']['quotes'][0]['author'];

        // Save both quote and author to the file
        $quoteData = ['quote' => $quote, 'author' => $author];
        file_put_contents($quoteFilename, json_encode($quoteData));
    } else {
        $failed = true;
        echo 'Failed to fetch the daily quote.';
    }
}

if (!$failed) {
    echo '<figure class="blockquote">';
    echo '<blockquote>';
    echo $quote;
    echo '</blockquote>';
    echo '<figcaption class="blockquote-footer">';
    echo $author;
    echo '</figcaption>';
    echo '</figure>';
}


?>
