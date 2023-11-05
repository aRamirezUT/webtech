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
    $content = stream_get_contents($blob->getContentStream());

    // Split the content into an array based on newline
    $lines = preg_split("/\r\n|\n|\r/", $content);

    // Display the data in a table
    echo '<table border="1">';
    echo '<tr><th>First Name</th><th>Last Name</th></tr>';
    foreach ($lines as $line) {
        $names = explode(' ', $line);
        echo '<tr>';
        echo '<td>' . $names[0] . '</td>';
        echo '<td>' . $names[1] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} catch (ServiceException $e) {
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo "Error $code: $error_message";
}
?>