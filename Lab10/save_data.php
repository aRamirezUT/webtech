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
    // Attempt to get the blob; if it exists, it means the blob exists
    $existingBlob = $blobClient->getBlob($containerName, $blobName);
    
    if ($existingBlob) {
        // The blob exists, you can perform the append operation here

        $currentContent = stream_get_contents($existingBlob->getContentStream());
        $newContent = $currentContent . $data;

        $blobClient->createBlockBlob($containerName, $blobName, $newContent);
        
        echo "Data appended successfully!";
    } else {
        echo "Blob does not exist!";
    }
} catch (ServiceException $e) {
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo "Error $code: $error_message";
}
?>