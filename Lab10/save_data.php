<?php
require_once 'vendor/autoload.php'; // Include the Azure SDK for PHP

use MicrosoftAzure\Storage\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Table\TableRestProxy;
use MicrosoftAzure\Storage\Common\ServiceException;

// Define your Azure Blob Storage connection string
$connectionString = "DefaultEndpointsProtocol=https;AccountName=webappstorage4413;AccountKey=XDhJYZCbxoXpNa1cpVVMdYEDOpt/LDnLri0bnm15SyuPawCQMvIT7u7rNvaXaqUcSEA5+1/m2x0k+AStC2yWxQ==;EndpointSuffix=core.windows.net";

// Create a blob service client
$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $data = $_POST['data']; // Assuming you have a form field named 'data'

    // Define your container name
    $containerName = 'webappstorage';

    try {
        // Upload the data as a blob
        $blobRestProxy->createBlockBlob($containerName, uniqid() . '.txt', $data);

        // Redirect to show_data.php after successful save
        header('Location: show_data.php');
        exit();
    } catch (ServiceException $e) {
        // Handle exception based on error codes and messages
        $code = $e->getCode();
        $error_message = $e->getMessage();
        error_log("Error in save_data.php: $code - $error_message");    
        // You can also echo the error for debugging purposes
        echo "Error in save_data.php: $code - $error_message";
        echo $code . ": " . $error_message . "<br />";
    }
} else {
    echo "Invalid request.";
}
?>
