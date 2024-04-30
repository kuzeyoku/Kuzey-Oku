<?php

namespace App\Services\MediaLibrary;

use Spatie\MediaLibrary\Conversions\Conversion;


class CustomFileNamer extends \Spatie\MediaLibrary\Support\FileNamer\FileNamer
{
    public function originalFileName(string $fileName): string
    {
        return md5(pathinfo($fileName, PATHINFO_FILENAME));
    }

    public function conversionFileName(string $fileName, Conversion $conversion): string
    {
        $strippedFileName = md5(pathinfo($fileName, PATHINFO_FILENAME));

        return "{$strippedFileName}-{$conversion->getName()}";
    }

    public function responsiveFileName(string $fileName): string
    {
        return md5(pathinfo($fileName, PATHINFO_FILENAME));
    }
}
