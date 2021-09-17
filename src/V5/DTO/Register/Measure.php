<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V5\DTO\Register;

use Paillechat\Enum\Enum;

/**
 * @method static self PIECE()
 * @method static self GRAM()
 * @method static self KILOGRAM()
 * @method static self TON()
 * @method static self CENTIMETER()
 * @method static self DECIMETER()
 * @method static self METER()
 * @method static self SQUARE_CENTIMETER()
 * @method static self SQUARE_DECIMETER()
 * @method static self SQUARE_METER()
 * @method static self MILLILITER()
 * @method static self LITER()
 * @method static self CUBIC_METER()
 * @method static self KILOWATT_HOUR()
 * @method static self GIGACALORIE()
 * @method static self DAY()
 * @method static self HOUR()
 * @method static self MINUTE()
 * @method static self SECOND()
 * @method static self KILOBYTE()
 * @method static self MEGABYTE()
 * @method static self GIGABYTE()
 * @method static self TERABYTE()
 * @method static self OTHER()
 */
final class Measure extends Enum
{
    protected const PIECE = 0; // Применяется для предметов расчета, которые могут быть реализованы поштучно или единицами
    protected const GRAM = 10; // Грамм
    protected const KILOGRAM = 11; // Килограмм
    protected const TON = 12; // Тонна
    protected const CENTIMETER = 20; // Сантиметр
    protected const DECIMETER = 21; // Дециметр
    protected const METER = 22; // Метр
    protected const SQUARE_CENTIMETER = 30; // Квадратный сантиметр
    protected const SQUARE_DECIMETER = 31; // Квадратный дециметр
    protected const SQUARE_METER = 32; // Квадратный метр
    protected const MILLILITER = 40; // Миллилитр
    protected const LITER = 41; // Литр
    protected const CUBIC_METER = 42; // Кубический метр
    protected const KILOWATT_HOUR = 50; // Киловатт час
    protected const GIGACALORIE = 51; // Гигакалория
    protected const DAY = 70; // Сутки (день)
    protected const HOUR = 71; //Час
    protected const MINUTE = 72; // Минута
    protected const SECOND = 73; // Секунда
    protected const KILOBYTE = 80; // Килобайт
    protected const MEGABYTE = 81; // Мегабайт
    protected const GIGABYTE = 82; // Гигабайт
    protected const TERABYTE = 83; // Терабайт
    protected const OTHER = 255; // Применяется при использовании иных единиц измерения

}
