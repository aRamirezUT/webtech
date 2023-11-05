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
    // Check if the blob exists
    if ($blobClient->doesBlobExist($containerName, $blobName)) {
        // Append data to the existing blob
        $existingBlob = $blobClient->getBlob($containerName, $blobName);
        $currentContent = stream_get_contents($existingBlob->getContentStream());

        $newContent = $currentContent . $dataToAppend;

        $blobClient->createBlockBlob($containerName, $blobName, $newContent);

        echo "Data appended successfully!";
    } else {
        // If the blob does not exist, create it and add data
        $blobClient->createBlockBlob($containerName, $blobName, $dataToAppend);
        echo "New blob created with data!";
    }
} catch (ServiceException $e) {
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo "Error $code: $error_message";
}
?>