<?php

declare(strict_types=1);

namespace Platine\Test\PDF;

use org\bovigo\vfs\vfsStream;
use Platine\Dev\PlatineTestCase;
use Platine\PDF\Generator\DOMPDFGenerator;
use Platine\PDF\PDF;
use Platine\PDF\PDFGeneratorInterface;

/**
 * PDF class tests
 *
 * @group core
 * @group pdf
 */
class PDFTest extends PlatineTestCase
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

    public function testConstructorDefault(): void
    {
        $generator = $this->getMockInstance(DOMPDFGenerator::class);

        $l = new PDF($generator);
        $this->assertInstanceOf(PDFGeneratorInterface::class, $l->getGenerator());
        $this->assertInstanceOf(DOMPDFGenerator::class, $l->getGenerator());
        $this->assertEquals($generator, $l->getGenerator());
    }

    public function testSetGetGenerator(): void
    {
        $generator = $this->getMockInstance(DOMPDFGenerator::class);

        $l = new PDF($generator);
        $this->assertInstanceOf(PDFGeneratorInterface::class, $l->getGenerator());
        $this->assertEquals($generator, $l->getGenerator());

        $dompdf = $this->getMockInstance(DOMPDFGenerator::class);
        $l->setGenerator($dompdf);
        $this->assertInstanceOf(DOMPDFGenerator::class, $l->getGenerator());
        $this->assertEquals($dompdf, $l->getGenerator());
    }
}
