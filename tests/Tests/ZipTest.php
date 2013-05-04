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
        if (true !== $zip->addFile(__FILE__, 'script.php')) {
            $this->fail('Unable to add file to zip');
        }
        if (true !== $zip->close()) {
            $this->fail('Unable to close archive');
        }

        $this->assertFileExists($file);

        if (true !== @chmod($file, 0760)) {
            $this->fail('Unable to chmod the archive');
        }
        if (true !== @unlink($file)) {
            $this->fail('Unable to unlink the archive');
        }
    }
}