<?php

declare(strict_types=1);

namespace Platine\Test\PDF;

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

    public function testDefaultValues(): void
    {
        $generator = $this->getMockInstance(DOMPDFGenerator::class);

        $l = new PDF($generator);
        $this->assertEquals('', $l->getContent());
        $this->assertEquals('A4', $l->getFormat());
        $this->assertEquals('output.pdf', $l->getFilename());
        $this->assertEquals('portrait', $l->getOrientation());
    }

    public function testGetSet(): void
    {
        $generator = $this->getMockInstance(DOMPDFGenerator::class);

        $l = new PDF($generator);
        $l->setContent('pdfcontent')
          ->setFilename('doc.pdf')
          ->setFormat('A5')
          ->setOrientation('landscape');

        $this->assertEquals('pdfcontent', $l->getContent());
        $this->assertEquals('A5', $l->getFormat());
        $this->assertEquals('doc.pdf', $l->getFilename());
        $this->assertEquals('landscape', $l->getOrientation());
    }

    public function testRaw(): void
    {
        $generator = $this->getMockInstance(DOMPDFGenerator::class, ['raw' => 'pdf']);

        $l = new PDF($generator);
        $this->assertEquals('pdf', $l->generate()->raw());
    }

    public function testDownload(): void
    {
        $generator = $this->getMockInstance(DOMPDFGenerator::class);

        $l = new PDF($generator);
        $l->generate()->download();
        $this->assertTrue(true);
    }

    public function testSave(): void
    {
        $generator = $this->getMockInstance(DOMPDFGenerator::class);

        $l = new PDF($generator);
        $l->generate()->save();
        $this->assertTrue(true);
    }
}
