<?php
$folder = 'myFolder'; // Replace 'myFolder' with your folder name
$zipFile = 'download.zip'; // Name of the zip file to be created

// Create new ZipArchive object
$zip = new ZipArchive();

// Create a zip file on the server
if ($zip->open($zipFile, ZipArchive::CREATE) === TRUE) {
    
    // Create recursive directory iterator
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($folder),
        RecursiveIteratorIterator::LEAF_ONLY
    );

    foreach ($files as $file) {
        // Skip directories (they would be added automatically)
        if (!$file->isDir()) {
            // Get real and relative paths for current file
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($folder) + 1);

            // Add current file to archive
            $zip->addFile($filePath, $relativePath);
        }
    }

    // Zip archive created successfully
    $zip->close();
    
    // Send the zip file to the browser for download
    header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename='.$zipFile);
    header('Content-Length: ' . filesize($zipFile));
    readfile($zipFile);
    
    // Remove the zip file from the server after downloading
    unlink($zipFile);
    
    exit;
} else {
    echo 'Failed to create zip file.';
}
?>
