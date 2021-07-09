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

    protected function setUp() : void
    {
        $this->metainfo = new Metainfo();
    }

    public function testPdf()
    {
        $file = __DIR__ . '/Fixtures/pdfa_metadata-2b.pdf';

        $this->metainfo->read($file);
        $this->assertEquals('PDF/A Metadata – XMP, RDF &amp; Dublin Core', $this->metainfo->title);
        $this->assertEquals('PDF/A Competence Center, Leonard Rosenthol', $this->metainfo->author);
        $this->assertEquals('PDF/A Metadata – XMP, RDF &amp; Dublin Core', $this->metainfo->description);
        $this->assertEquals('application/pdf', $this->metainfo->format);
        $this->assertEmpty($this->metainfo->date);
        $this->assertIsArray($this->metainfo->path);
    }
}
