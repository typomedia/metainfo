<?php

namespace Typomedia\Metainfo;

use Typomedia\Metainfo\Service\Parser;

/**
 * Class Metainfo
 * @package Typomedia\Metainfo
 */
class Metainfo
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $author;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $format;

    /**
     * @var string
     */
    public $date;

    /**
     * @var string
     */
    public $file;

    /**
     * @var false|string
     */
    public $hash;

    /**
     * @param string $filename
     */
    public function __construct(string $filename)
    {
        $metainfo = Parser::parse($filename);

        $this->title = $this->get($metainfo, 'dc:title');
        $this->author = $this->get($metainfo, 'dc:creator');
        $this->date = $this->get($metainfo, 'dc:date');
        $this->format = $this->get($metainfo, 'dc:format');
        $this->description = $this->get($metainfo, 'dc:description');
        $this->hash = md5_file($filename); // md5 for performance
        $this->file = $filename;
    }

    /**
     * @param mixed $metainfo
     * @param string $element
     * @return string
     */
    protected function get($metainfo, string $element)
    {
        $start = strpos($metainfo, '<' . $element . '>') + strlen($element) + 2;
        $length = strpos(substr($metainfo, $start), '</' . $element . '>');

        return $length ? trim(strip_tags(substr($metainfo, $start, $length))) : null;
    }
}
