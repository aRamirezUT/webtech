<?php
require_once 'vendor/autoload.php';
use MicrosoftAzure\Storage\Common\ServicesBuilder;

$connectionString = "DefaultEndpointsProtocol=https;AccountName=webappstorage4413;AccountKey=XDhJYZCbxoXpNa1cpVVMdYEDOpt/LDnLri0bnm15SyuPawCQMvIT7u7rNvaXaqUcSEA5+1/m2x0k+AStC2yWxQ==;EndpointSuffix=core.windows.net"; // Replace with your actual connection string

$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

$containerName = "webappstorage"; // Replace with your container name
$blobName = "names.txt"; // Replace with your desired file name

// Check if the file already exists in the blob
$blobExists = $blobRestProxy->blobExists($containerName, $blobName);

// Retrieve data from the POST request
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$data = $first_name . " " . $last_name;

if ($blobExists) {
    // If the blob exists, retrieve its current content
    $blob = $blobRestProxy->getBlob($containerName, $blobName);
    $existingData = stream_get_contents($blob->getContentStream());

    // Append the new data to the existing content
    $dataToAppend = $existingData . "\n" . $data;
} else {
    // If the blob doesn't exist, create a new file with the initial data
    $dataToAppend = $data;
}

// Upload the updated content to the blob
$blobRestProxy->createBlockBlob($containerName, $blobName, $dataToAppend);

// Redirect the user back to the "index.html" page
header("Location: index.html");
