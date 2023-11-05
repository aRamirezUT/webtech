<?php
require_once 'vendor/autoload.php'; // Include the Azure SDK for PHP

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
// Configure connection to Azure Blob Storage
$connectionString = 'DefaultEndpointsProtocol=https;AccountName=webappstorage4413;AccountKey=XDhJYZCbxoXpNa1cpVVMdYEDOpt/LDnLri0bnm15SyuPawCQMvIT7u7rNvaXaqUcSEA5+1/m2x0k+AStC2yWxQ==;EndpointSuffix=core.windows.net';
$containerName = 'user-data';

$blobClient = BlobRestProxy::createBlobService($connectionString);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];

    $data = $firstName . ' ' . $lastName;

    // Create a unique blob name or use a specific naming convention
    $blobName = uniqid() . '.txt';

    // Upload the data to the Blob container
    $blobClient->createBlockBlob($containerName, $blobName, $data);

    header('Location: index.html');
} else {
    echo "Invalid request.";
}
?>
