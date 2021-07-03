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
                $chunk = fread($handle, 4096);

                $start = strpos($chunk, '<x:xmpmeta');
                if ($start) {
                    $buffer = trim(substr($chunk, $start));
                }

                if ($buffer) {
                    $buffer .= $chunk;
                }

                $end = strpos($buffer, '</x:xmpmeta>');
                if ($end) {
                    $buffer = trim(substr($buffer, 0, $end + 12));
                }
            }
            fclose($handle);
        }
        return $buffer;
    }
}
