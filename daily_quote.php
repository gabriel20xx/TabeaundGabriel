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

if (file_exists($quoteFilename) && date('Y-m-d', filemtime($quoteFilename)) == date('Y-m-d')) {
    $quote = file_get_contents($quoteFilename);
} else {
    $qod_result = call_api("GET", "https://quotes.rest/qod?category=" . $category, false, $api_key);
    $qod_data = json_decode($qod_result, true);
    if ($qod_data && isset($qod_data['contents']['quotes'][0]['quote'])) {
        $quote = $qod_data['contents']['quotes'][0]['quote'];
        echo '<blockquote>';
        echo '<p>' . $quote . '</p>';
        echo '</blockquote>';
    } else {
        echo 'Failed to fetch the daily quote.';
    }
}

?>
