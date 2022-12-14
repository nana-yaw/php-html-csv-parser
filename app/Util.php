<?php
namespace App;

class Util
{
    public static function removeExtraWhiteSpaces(string $value): string
    {
        $formattedValue = preg_replace("/\s+/", " ", trim($value));
        return $formattedValue;
    }

    public static function print(string $value): void
    {
        echo nl2br($value ."\r\n");
    }

    public static function println(string $value): void
    {
        $output = self::removeExtraWhiteSpaces($value);
        echo nl2br($output ."\r\n");
    }

    public static function formatNte(string $value): float
    {
        $newVal = str_ireplace(array("$", ","), '', $value);
        return floatval($newVal);
    }

    public static function formatScheduledDate(string $dateStr): string
    {
        $dateVal = self::removeExtraWhiteSpaces($dateStr);
        $newDate = date("Y-m-d H:i", strtotime("$dateVal"));
        return $newDate;
    }

    public static function formatAddress(string $address): array
    {
        $addressArr = explode(" ", self::removeExtraWhiteSpaces($address));
        $street = $addressArr[0] ." ". $addressArr[1] ." ". $addressArr[2];
        $city = $addressArr[3];
        $state = $addressArr[4];
        $zip = $addressArr[5];
        $addressObj = [
            "street" => "$street",
            "city" => "$city",
            "state" => "$state",
            "zip_code" => "$zip"
        ];
        return $addressObj;
    }

    public static function formatPhoneNumber(string $value): string
    {
        $newPhoneNumber = str_ireplace("-", '', $value);
        return $newPhoneNumber;
    }
}
?>