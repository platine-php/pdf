<?php

/**
 * Platine PDF
 *
 * Platine PDF is the lightweight for generating PDF documents
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2020 Platine PDF
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

/**
 *  @file DOMPDFGenerator.php
 *
 *  The DOMPDF generator class
 *
 *  @package    Platine\PDF\Generator
 *  @author Platine Developers Team
 *  @copyright  Copyright (c) 2020
 *  @license    http://opensource.org/licenses/MIT  MIT License
 *  @link   http://www.iacademy.cf
 *  @version 1.0.0
 *  @filesource
 */

declare(strict_types=1);

namespace Platine\PDF\Generator;

use Dompdf\Dompdf;
use Platine\PDF\PDFGeneratorInterface;

/**
 * @class DOMPDFGenerator
 * @package Platine\PDF\Generator
 */
class DOMPDFGenerator implements PDFGeneratorInterface
{

    /**
     * The DOMPDF instance
     * @var Dompdf
     */
    protected Dompdf $dompdf;

    /**
     * Create new instance
     * @param Dompdf $dompdf
     */
    public function __construct(Dompdf $dompdf)
    {
        $this->dompdf = $dompdf;
    }

    /**
     * Return the DOMPDF
     * @return Dompdf
     */
    public function getDompdf(): Dompdf
    {
        return $this->dompdf;
    }

    /**
     * Set the DOMPDF instance
     * @param Dompdf $dompdf
     * @return $this
     */
    public function setDompdf(Dompdf $dompdf): self
    {
        $this->dompdf = $dompdf;
        return $this;
    }
}
