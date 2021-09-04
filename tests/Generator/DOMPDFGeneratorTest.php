<?php

declare(strict_types=1);

namespace Platine\Test\PDF\Generator;

use Dompdf\Dompdf;
use org\bovigo\vfs\vfsStream;
use Platine\Dev\PlatineTestCase;
use Platine\Filesystem\Adapter\Local\LocalAdapter;
use Platine\Filesystem\Filesystem;
use Platine\PDF\Generator\DOMPDFGenerator;
use RuntimeException;

/**
 * DOMPDFGenerator class tests
 *
 * @group core
 * @group pdf
 */
class DOMPDFGeneratorTest extends PlatineTestCase
{
    protected $vfsRoot;
    protected $vfsPath;

    protected function setUp(): void
    {
        parent::setUp();
        //need setup for each test
        $this->vfsRoot = vfsStream::setup();
        $this->vfsPath = vfsStream::newDirectory('tests')->at($this->vfsRoot);
    }

    public function testConstructor(): void
    {
        $dompdf = $this->getMockInstance(Dompdf::class);
        $filesystem = $this->getMockInstance(Filesystem::class);

        $l = new DOMPDFGenerator($dompdf, $filesystem);
        $this->assertInstanceOf(Dompdf::class, $l->getDompdf());
        $this->assertEquals($dompdf, $l->getDompdf());
    }

    public function testGetSetDompdf(): void
    {
        $dompdf = $this->getMockInstance(Dompdf::class);
        $filesystem = $this->getMockInstance(Filesystem::class);

        $l = new DOMPDFGenerator($dompdf, $filesystem);
        $this->assertInstanceOf(Dompdf::class, $l->getDompdf());
        $this->assertEquals($dompdf, $l->getDompdf());

        $dompdf2 = $this->getMockInstance(Dompdf::class);
        $l->setDompdf($dompdf2);
        $this->assertInstanceOf(Dompdf::class, $l->getDompdf());
        $this->assertEquals($dompdf2, $l->getDompdf());
    }

    public function testGenerate(): void
    {
        $dompdf = $this->getMockInstance(Dompdf::class);
        $filesystem = $this->getMockInstance(Filesystem::class);

        $l = new DOMPDFGenerator($dompdf, $filesystem);
        $l->generate('foo');
        $this->assertEquals('output.pdf', $this->getPropertyValue(DOMPDFGenerator::class, $l, 'filename'));
    }

    public function testRaw(): void
    {
        $dompdf = $this->getMockInstance(Dompdf::class, ['output' => 'pdfcontent']);
        $filesystem = $this->getMockInstance(Filesystem::class);

        $l = new DOMPDFGenerator($dompdf, $filesystem);
        $l->generate('foo');
        $this->assertEquals('pdfcontent', $l->raw());
    }

    public function testSave(): void
    {
        $dompdf = $this->getMockInstance(Dompdf::class, ['output' => 'pdfcontent']);
        //$filesystem = $this->getMockInstance(Filesystem::class);
        $adapter = new LocalAdapter();
        $filesystem = new Filesystem($adapter);

        $l = new DOMPDFGenerator($dompdf, $filesystem);
        $filename = 'doc.pdf';
        $filePath = $this->vfsPath->url() . '/' . $filename;
        $l->generate('foo', $filePath);
        $this->assertFalse($this->vfsPath->hasChild($filename));
        $l->save();
        $this->assertTrue($this->vfsPath->hasChild($filename));
    }

    public function testDownload(): void
    {
        $dompdf = $this->getMockInstance(Dompdf::class);
        $filesystem = $this->getMockInstance(Filesystem::class);

        $l = new DOMPDFGenerator($dompdf, $filesystem);
        $l->generate('foo');
        $l->download();
        $this->assertTrue(true);
    }

    public function testNotYetRendered(): void
    {
        $this->expectException(RuntimeException::class);
        $dompdf = $this->getMockInstance(Dompdf::class);
        $filesystem = $this->getMockInstance(Filesystem::class);

        $l = new DOMPDFGenerator($dompdf, $filesystem);
        $l->download();
    }
}
