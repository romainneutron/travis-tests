<?php

class ZipTest extends PHPUnit_Framework_TestCase
{
    private $file;

    public function setUp()
    {
        $this->file = __DIR__ . '/test.zip';
        $this->clean();
    }

    public function tearDown()
    {
        $this->clean();
    }

    private function clean()
    {
        if (file_exists($this->file)) {
            unlink($this->file);
        }
    }

    public function testCreateAddAndClose()
    {
        $zip = new ZipArchive();

        if (true !== $zip->open($this->file, ZIPARCHIVE::CREATE)) {
            $this->fail('Unable to create zip file');
        }
        if (true !== $zip->addFile(__FILE__, 'script.php')) {
            $this->fail('Unable to add file to zip');
        }
        if (true !== $zip->close()) {
            $this->fail('Unable to close archive');
        }

        $this->assertFileExists($this->file);
    }

    public function testOpenAndClose()
    {
        $zip = new ZipArchive();

        $file = __DIR__ . '/../fixtures/README.md.zip';

        if (true !== $zip->open($file)) {
            $this->fail('Unable to create zip file');
        }
        if (true !== $zip->close()) {
            $this->fail('Unable to close archive');
        }
    }
}