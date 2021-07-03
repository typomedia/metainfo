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
     * @param $filename
     */
    public function read($filename)
    {
        $metainfo = Parser::parse($filename);

        $this->title = $this->get($metainfo, 'dc:title');
        $this->author = $this->get($metainfo, 'dc:creator');
        $this->format = $this->get($metainfo, 'dc:format');
        $this->description = $this->get($metainfo, 'dc:description');
    }

    /**
     * @param $string
     * @param $element
     * @return string
     */
    protected function get($string, $element)
    {
        $start = strpos($string, '<' . $element . '>') + strlen($element) + 2;
        $length = strpos(substr($string, $start), '</' . $element . '>');

        return $length ? trim(strip_tags(substr($string, $start, $length))) : null;
    }
}
