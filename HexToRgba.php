<?php


function hexToRgba(string $hex, $alpha = 1)
{
    $hex = ltrim(trim($hex), '#');

    if (strlen($hex) === 3) {
        $hex = convertLongHex($hex);
    }

    validateHexColor($hex);

    $hexArray = str_split($hex, 2);

    $hexArray = array_map(function ($item) {
        return hexdec($item);
    }, $hexArray);

    $hexArray['alpha'] = (float) $alpha;

    return "rgb($hexArray[0], $hexArray[1], $hexArray[2], $hexArray[alpha])";

}

function validateHexColor($hex)
{


    if (strlen($hex) !== 6) {
        throw new Error('Hex color must be 6 digits long.');
    }

    if ( ! ctype_xdigit($hex)) {
        throw new Error('Not a valid hex number.');
    }

}

function convertLongHex($hex)
{
    return $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
}
