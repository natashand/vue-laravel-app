<?php namespace App\Models;

/**
 * Enum FileExtension
 *
 * @package App\Models
 */
interface FileExtension
{
    const JPG = 'jpg';
    const JPEG = 'jpeg';
    const PNG = 'png';
    const GIF = 'gif';
    const BMP = 'bmp';

    const USER_ICON_FORMATS = [self::JPG, self::JPEG, self::PNG, self::GIF, self::BMP];
}
