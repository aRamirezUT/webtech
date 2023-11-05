<?php
require_once 'vendor/autoload.php'; // Include the Azure SDK for PHP

use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Table\TableRestProxy;
use MicrosoftAzure\Storage\Common\ServiceException;

// Define your Azure Blob Storage connection string
$connectionString = "DefaultEndpointsProtocol=https;AccountName=webappstorage4413;AccountKey=XDhJYZCbxoXpNa1cpVVMdYEDOpt/LDnLri0bnm15SyuPawCQMvIT7u7rNvaXaqUcSEA5+1/m2x0k+AStC2yWxQ==;EndpointSuffix=core.windows.net";

// Create a blob service client
$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

// Define your container name
$containerName = 'webappstorage';

try {
    // List the blobs in the container
    $blob_list = $blobRestProxy->listBlobs($containerName);
    $blobs = $blob_list->getBlobs();

    echo '<table>';
    foreach ($blobs as $blob) {
        echo '<tr><td>' . $blob->getName() . '</td></tr>';
    }
    echo '</table>';
} catch (ServiceException $e) {
    // Handle exception based on error codes and messages
    $code = $e->getCode();
    $error_message = $e->getMessage();
    error_log("Error in save_data.php: $code - $error_message");
    // Display the error message on the webpage
    echo "Error in show_data.php: $code - $error_message";
    echo $code . ": " . $error_message . "<br />";
}
?>
