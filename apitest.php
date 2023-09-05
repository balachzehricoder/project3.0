<?php
require 'vendor/autoload.php'; // Include the Guzzle autoloader

use GuzzleHttp\Client;

// Create a Guzzle HTTP client
$client = new Client();

// Define the API endpoint URL and your new API key
$brand = 'Apple';
$model = 'iphone x'; // Replace 'Your_Model_Name' with the specific Realme model you want to fetch specifications for
$apiUrl = 'https://mobile-phone-specs-database.p.rapidapi.com/gsm/get-specifications-by-brandname-modelname/' . $brand . '/' . $model;
$apiKey = '4ce409fd69msheef0800123abdacp129535jsn6ddd8c1da17e';

// Make the API request
try {
    $response = $client->request('GET', $apiUrl, [
        'headers' => [
            'X-RapidAPI-Key' => $apiKey,
            'X-RapidAPI-Host' => 'mobile-phone-specs-database.p.rapidapi.com',
        ],
    ]);

    // Check if the request was successful
    if ($response->getStatusCode() === 200) {
        $apiData = json_decode($response->getBody(), true);

        // Debug: Output the structure of $apiData
        echo '<pre>';
        print_r($apiData);
        echo '</pre>';
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
Rest of your code

<!-- Display Product Specifications -->
<table class="table table-bordered">
    <tbody>
        <tr class="techSpecRow">
            <th colspan="2">Product Details</th>
        </tr>
        <?php
        // Define device names for which you want to display details
        $deviceNames = [$brand]; // Display specifications for the specific Realme device

        // Loop through the device names and display their details
        foreach ($deviceNames as $deviceName):
            // Check if the device name exists in the $apiData array
            if (isset($apiData[$deviceName])):
        ?>
                <tr class="techSpecRow">
                    <td class="techSpecTD1">Brand:</td>
                    <td class="techSpecTD2"><?php echo $apiData[$deviceName]['Brand']; ?></td>
                </tr>
                <tr class="techSpecRow">
                    <td class="techSpecTD1">Model:</td>
                    <td class="techSpecTD2"><?php echo $apiData[$deviceName]['DeviceName']; ?></td>
                </tr>
                <tr class="techSpecRow">
                    <td class="techSpecTD1">Released on:</td>
                    <td class="techSpecTD2"><?php echo $apiData[$deviceName]['LaunchAnnounced']; ?></td>
                </tr>
                <!-- Add more specifications here -->
        <?php
            else:
                echo "<tr><td colspan='2'>Device '$deviceName' not found in API data.</td></tr>";
            endif;
        endforeach;
        ?>
    </tbody>
</table>
