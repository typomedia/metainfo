<?php

namespace Typomedia\Metainfo\Tests;

use PHPUnit\Framework\TestCase;
use Typomedia\Metainfo\Metainfo;

/**
 * Class MetainfoTest
 * @package Typomedia\Metainfo\Tests
 */
class MetainfoTest extends TestCase
{
    /**
     * @var Metainfo
     */
    protected $metainfo;

    public function testPdf()
    {
        $file = __DIR__ . '/Fixtures/pdfa_metadata-2b.pdf';

        $metainfo = new Metainfo($file);
        $this->assertEquals('PDF/A Metadata – XMP, RDF &amp; Dublin Core', $metainfo->title);
        $this->assertEquals('PDF/A Competence Center, Leonard Rosenthol', $metainfo->author);
        $this->assertEquals('PDF/A Metadata – XMP, RDF &amp; Dublin Core', $metainfo->description);
        $this->assertEquals('application/pdf', $metainfo->format);
        $this->assertEmpty($metainfo->date);
        $this->assertIsArray($metainfo->pathinfo);
    }
}
