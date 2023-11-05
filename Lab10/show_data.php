<?php
require_once 'vendor/autoload.php'; // Include the Azure SDK for PHP

use MicrosoftAzure\Storage\Blob\BlobRestProxy;

// Define your Azure Blob Storage connection string
$connectionString = "DefaultEndpointsProtocol=https;AccountName=webappstorage4413;AccountKey=XDhJYZCbxoXpNa1cpVVMdYEDOpt/LDnLri0bnm15SyuPawCQMvIT7u7rNvaXaqUcSEA5+1/m2x0k+AStC2yWxQ==;EndpointSuffix=core.windows.net";

// Create a blob service client
$blobClient = BlobRestProxy::createBlobService($connectionString);

// Define your container name
$containerName = 'webappstorage';
$blobName = 'names.txt'; // Specify the name of the blob you want to read

try {
    // Get the content of the blob
    $blob = $blobClient->getBlob($containerName, $blobName);

    // Output the content to the browser
    header('Content-Type: text/plain'); // Set the content type to plain text
    echo stream_get_contents($blob->getContentStream());
} catch (ServiceException $e) {
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo "Error $code: $error_message";
}
?>
