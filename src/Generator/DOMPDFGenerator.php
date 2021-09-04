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
use Platine\Filesystem\Filesystem;
use Platine\PDF\PDFGeneratorInterface;
use RuntimeException;

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
     * The file system to use
     * @var Filesystem
     */
    protected Filesystem $filesystem;

    /**
    * Whether the document already rendered call
     * mean to render() method
    * @var bool
    */
    protected $rendered = false;

    /**
    * The PDF generated filename
    * @var string
    */
    protected $filename = 'dompdf.pdf';

    /**
     * Create new instance
     * @param Dompdf $dompdf
     * @param Filesystem $filesystem
     */
    public function __construct(Dompdf $dompdf, Filesystem $filesystem)
    {
        $this->dompdf = $dompdf;
        $this->filesystem = $filesystem;
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

    /**
     * {@inheritodc}
     */
    public function generate(
        string $content,
        string $filename = 'output.pdf',
        string $format = 'A4',
        string $orientation = 'portrait'
    ): void {
        $this->filename = $filename;
        $this->dompdf->loadHtml($content);
        $this->dompdf->setPaper($format, $orientation);
        $this->dompdf->render();

        $this->rendered = true;
    }

    /**
     * {@inheritodc}
     */
    public function raw(): string
    {
        $this->checkIfAlreadyRendered();

        return (string) $this->dompdf->output();
    }

    /**
     * {@inheritodc}
     */
    public function save(): void
    {
        $this->checkIfAlreadyRendered();

        $this->filesystem
                        ->file($this->filename)
                        ->write($this->raw());
    }

    /**
     * {@inheritodc}
     */
    public function download(): void
    {
        $this->checkIfAlreadyRendered();
        $this->dompdf->stream($this->filename);
    }

    /**
     * Check if the document already rendered
     * @return void
     * @throws RuntimeException
     */
    protected function checkIfAlreadyRendered(): void
    {
        if (!$this->rendered) {
            throw new RuntimeException('You must render the document first');
        }
    }
}
