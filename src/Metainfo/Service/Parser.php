<?php

namespace Typomedia\Metainfo\Service;

/**
 * Class Parser
 * @package Typomedia\Metainfo\Parser
 */
class Parser
{
    /**
     * @param $file
     * @return string|null
     */
    public static function parse($file)
    {
        $handle = fopen($file, 'rb');
        $buffer = null;

        if ($handle) {
            while (!feof($handle)) {
                $chunk = fread($handle, 1024);

                $start = strpos($chunk, '<x:xmpmeta');
                if ($start) {
                    $buffer = substr($chunk, $start);
                }

                if ($buffer) {
                    $buffer .= $start ? '' : $chunk;
                }

                $needle = '</x:xmpmeta>';
                $end = strpos($buffer, $needle);
                if ($end) {
                    $buffer = substr($buffer, 0, $end + strlen($needle));
                }
            }
            fclose($handle);
        }
        return $buffer;
    }
}
