<?php
require_once 'vendor/autoload.php'; // Include the Azure SDK for PHP

use MicrosoftAzure\Storage\Blob\BlobRestProxy;

// Define your Azure Blob Storage connection string
$connectionString = "DefaultEndpointsProtocol=https;AccountName=webappstorage4413;AccountKey=XDhJYZCbxoXpNa1cpVVMdYEDOpt/LDnLri0bnm15SyuPawCQMvIT7u7rNvaXaqUcSEA5+1/m2x0k+AStC2yWxQ==;EndpointSuffix=core.windows.net";

// Create a blob service client
$blobClient = BlobRestProxy::createBlobService($connectionString);

// Define your container name
$containerName = 'webappstorage';

try {
    // List the blobs in the container
    $listBlobsOptions = new ListBlobsOptions();
    $listBlobsOptions->setPrefix(""); // You can set a prefix to filter blobs

    echo "These are the blobs present in the container:<br>";

    do {
        $result = $blobClient->listBlobs($containerName, $listBlobsOptions);

        foreach ($result->getBlobs() as $blob) {
            echo $blob->getName() . "<br>";
        }

        $listBlobsOptions->setContinuationToken($result->getContinuationToken());
    } while ($result->getContinuationToken());
} catch (ServiceException $e) {
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo "Error $code: $error_message";
}
?>