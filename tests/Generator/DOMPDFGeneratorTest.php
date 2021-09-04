<?php

declare(strict_types=1);

namespace Platine\Test\PDF\Generator;

use Dompdf\Dompdf;
use Platine\Dev\PlatineTestCase;
use Platine\PDF\Generator\DOMPDFGenerator;

/**
 * DOMPDFGenerator class tests
 *
 * @group core
 * @group pdf
 */
class DOMPDFGeneratorTest extends PlatineTestCase
{
    public function testLog(): void
    {
        $dompdf = $this->getMockInstance(Dompdf::class);

        $l = new DOMPDFGenerator($dompdf);
        $this->assertTrue(true);
    }
}
