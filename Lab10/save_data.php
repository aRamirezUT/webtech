<?php
require_once 'vendor/autoload.php';
use MicrosoftAzure\Storage\Blob\BlobRestProxy;

$connectionString = "DefaultEndpointsProtocol=https;AccountName=webappstorage4413;AccountKey=XDhJYZCbxoXpNa1cpVVMdYEDOpt/LDnLri0bnm15SyuPawCQMvIT7u7rNvaXaqUcSEA5+1/m2x0k+AStC2yWxQ==;EndpointSuffix=core.windows.net"; // Replace with your actual connection string

$blobClient = BlobRestProxy::createBlobService($connectionString);

$containerName = "webappstorage"; // Replace with your container name
$blobName = "names.txt"; // Replace with your desired file name

// Retrieve data from the POST request
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$data = $first_name . " " . $last_name;

try {
    $existingBlob = $blobClient->getBlob($containerName, $blobName);
    // Blob exists, append data to it
    $currentContent = stream_get_contents($existingBlob->getContentStream());
    $newContent = $currentContent . $data;
    $blobClient->createBlockBlob($containerName, $blobName, $newContent);
    echo "Data appended successfully!";
} catch (ServiceException $e) {
    if ($e->getCode() == 404) {
        // Blob doesn't exist, create it
        $data = "This is the data to append."; // Your data here
        $blobClient->createBlockBlob($containerName, $blobName, $data);
        echo "Blob created and data appended!";
    } else {
        // Handle other errors
        echo "Error " . $e->getCode() . ": " . $e->getMessage();
    }
}
?>