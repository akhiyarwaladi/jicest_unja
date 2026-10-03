<?php

namespace App\Support;

class RegistrationVoucher
{
    public const CODE = 'JICEST2026FST50RB';
    public const IDR_DISCOUNT = 50000;
    public const USD_DISCOUNT = 5;

    public static function normalize(?string $code): string
    {
        return strtoupper(trim($code ?? ''));
    }

    public static function isValid(?string $code): bool
    {
        return self::normalize($code) === self::CODE;
    }

    public static function apply(array $fee, ?string $code): array
    {
        $fee['discount'] = 0;

        if (!self::isValid($code)) {
            return $fee;
        }

        $fee['idr'] = max(0, $fee['idr'] - self::IDR_DISCOUNT);
        $fee['usd'] = max(0, $fee['usd'] - self::USD_DISCOUNT);
        $fee['formatted'] = 'IDR ' . number_format($fee['idr'], 0, ',', '.')
            . ' / $' . number_format($fee['usd'], 1) . ' USD';
        $fee['discount'] = 'IDR ' . number_format(self::IDR_DISCOUNT, 0, ',', '.')
            . ' / USD ' . self::USD_DISCOUNT;

        return $fee;
    }
}
