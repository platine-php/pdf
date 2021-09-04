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
 *  @file PDFGeneratorInterface.php
 *
 *  The PDF generator interface
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
 * @class PDFGeneratorInterface
 * @package Platine\PDF
 */
interface PDFGeneratorInterface
{

    /**
     * Generate PDF document
     * @param string $content the content to use
     * @param string $filename the filename
     * @param string $format the format
     * @param string $orientation the orientation
     * @return void
     */
    public function generate(
        string $content,
        string $filename = 'output.pdf',
        string $format = 'A4',
        string $orientation = 'portrait'
    ): void;

    /**
     * Return the raw PDF
     * @return string
     */
    public function raw(): string;

    /**
     * Download the PDF document
     * @return void
     */
    public function download(): void;

    /**
     * Save the PDF document on the file system
     * @return void
     */
    public function save(): void;
}
