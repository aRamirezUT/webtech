<?php
require 'vendor/autoload.php'; // Include the Composer-generated autoload file

use Azure\Core\AzureKeyCredential;
use Azure\Storage\Blobs\BlobServiceClient;

function listBlobs($accountName, $containerName) {
    // Construct the connection string from the arguments.
    $connectionString = "DefaultEndpointsProtocol=https;AccountName={$accountName};AccountKey=XDhJYZCbxoXpNa1cpVVMdYEDOpt/LDnLri0bnm15SyuPawCQMvIT7u7rNvaXaqUcSEA5+1/m2x0k+AStC2yWxQ==;EndpointSuffix=core.windows.net";

    // Create a BlobServiceClient using the connection string.
    $blobServiceClient = new BlobServiceClient($connectionString);

    // Get the container client.
    $containerClient = $blobServiceClient->getContainerClient($containerName);

    // List blobs in the container.
    $blobs = $containerClient->listBlobs();

    return $blobs;
}

// Define your Azure Blob Storage configuration
$accountName = 'webappstorage4413';
$containerName = 'webappstorage';

// Get the list of blobs
$blobs = listBlobs($accountName, $containerName);

// Display the data in an HTML table
echo '<table>';
foreach ($blobs as $blob) {
    $blobContents = $blob->getContent();
    echo '<tr><td>' . $blobContents . '</td></tr>';
}
echo '</table>';
