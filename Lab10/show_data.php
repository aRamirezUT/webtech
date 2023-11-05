<?php
require_once 'vendor/autoload.php'; // Include the Azure SDK for PHP

use MicrosoftAzure\Storage\Blob\BlobRestProxy;

$connectionString = 'DefaultEndpointsProtocol=https;AccountName=webappstorage4413;AccountKey=XDhJYZCbxoXpNa1cpVVMdYEDOpt/LDnLri0bnm15SyuPawCQMvIT7u7rNvaXaqUcSEA5+1/m2x0k+AStC2yWxQ==;EndpointSuffix=core.windows.net';
$containerName = 'user-data';

$blobClient = BlobRestProxy::createBlobService($connectionString);

$blobs = $blobClient->listBlobs($containerName);

echo '<table>';
foreach ($blobs as $blob) {
    $data = $blobClient->getBlob($containerName, $blob->getName());
    echo '<tr><td>' . $data->getContentStream()->getContents() . '</td></tr>';
}
echo '</table>';
?>
