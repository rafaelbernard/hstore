<?php
/**
 * HStore utility class
 * Class for HStore content manipulation
 * @author Rafael Bernard Rodrigues Araujo
 */

abstract class HStore
{

    /**
     * Parse HStore data to Array
     * @return array
     */
    public static function parseToArray($hstore_data)
    {
        $split  = preg_split('/[,\s]*"([^"]+)"[,\s]*|[,=>\s]+/', $hstore_data, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        $array = array();
        for ($index = 0; $index < count($split); $index = $index + 2)
        {
            $array[$split[$index]] = $split[$index + 1] != 'NULL' ? $split[$index + 1] : null;
        }
        return $array;
    }

}
