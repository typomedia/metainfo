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
     * @var array
     */
    public $pathinfo;
    /**
     * @var array|string|string[]
     */

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
        $this->pathinfo = pathinfo($filename);
    }

    /**
     * @param string $string
     * @param string $element
     * @return string
     */
    protected function get(string $string, string $element)
    {
        $start = strpos($string, '<' . $element . '>') + strlen($element) + 2;
        $length = strpos(substr($string, $start), '</' . $element . '>');

        return $length ? trim(strip_tags(substr($string, $start, $length))) : null;
    }
}
