<?php

class ZipTest extends PHPUnit_Framework_TestCase
{
    public function testChmod()
    {
        $zip = new ZipArchive();

        $file = __DIR__ . '/test.zip';

        if (true !== $zip->open($file, ZIPARCHIVE::CREATE)) {
            $this->fail('Unable to create zip file');
        }
        $zip->addFile(__FILE__, 'script.php');
        $zip->close();
        
        chmod($file, 0760);

        unlink($file);
    }
}