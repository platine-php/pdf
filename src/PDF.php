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
 *  @file PDF.php
 *
 *  The PDF main class.
 *
 *  @package    Platine\PDF
 *  @author Platine Developers Team
 *  @copyright  Copyright (c) 2020
 *  @license    http://opensource.org/licenses/MIT  MIT License
 *  @link   http://www.iacademy.cf
 *  @version 1.0.0
 *  @filesource
 */

declare(strict_types=1);

namespace Platine\PDF;

/**
 * @class PDF
 * @package Platine\PDF
 */
class PDF
{

    /**
     * The generator instance to use
     * @var PDFGeneratorInterface
     */
    protected PDFGeneratorInterface $generator;

    /**
     * Create new instance
     *
     * @param PDFGeneratorInterface $generator
     */
    public function __construct(PDFGeneratorInterface $generator)
    {
        $this->generator = $generator;
    }

    /**
     * Return the generator
     * @return PDFGeneratorInterface
     */
    public function getGenerator(): PDFGeneratorInterface
    {
        return $this->generator;
    }

    /**
     * Set the generator
     * @param PDFGeneratorInterface $generator
     * @return $this
     */
    public function setGenerator(PDFGeneratorInterface $generator): self
    {
        $this->generator = $generator;
        return $this;
    }
}
