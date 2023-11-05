<?php
require 'vendor/autoload.php'; // Include the Composer-generated autoload file

use Azure\Core\AzureKeyCredential;
use Azure\Storage\Blobs\BlobServiceClient;

function uploadBlob($accountName, $containerName, $blobName, $blobContents) {
    // Construct the connection string from the arguments.
    $connectionString = "DefaultEndpointsProtocol=https;AccountName={$accountName};AccountKey=XDhJYZCbxoXpNa1cpVVMdYEDOpt/LDnLri0bnm15SyuPawCQMvIT7u7rNvaXaqUcSEA5+1/m2x0k+AStC2yWxQ==;EndpointSuffix=core.windows.net";

    // Create a BlobServiceClient using the connection string.
    $blobServiceClient = new BlobServiceClient($connectionString);

    // Get the container client.
    $containerClient = $blobServiceClient->getContainerClient($containerName);

    try {
        // Create the container if it does not exist.
        $containerClient->create();

        // Upload text to a new block blob.
        $blobClient = $containerClient->getBlobClient($blobName);
        $blobClient->upload($blobContents, strlen($blobContents));
    } catch (Exception $e) {
        throw $e;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $data = $firstName . ' ' . $lastName;

    // Define your Azure Blob Storage configuration
    $accountName = 'webappstorage4413';
    $containerName = 'webappstorage';
    $blobName = uniqid() . '.txt';

    // Upload the data to Azure Blob Storage
    uploadBlob($accountName, $containerName, $blobName, $data);

    header('Location: index.html');
} else {
    echo "Invalid request.";
}
