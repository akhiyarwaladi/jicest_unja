<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_type',
        'category',
        'early_bird',
        'payment_start',
        'payment_end',
        'fee_idr_online',
        'fee_usd_online',
        'fee_idr_offline',
        'fee_usd_offline'
    ];

    protected $casts = [
        'payment_start' => 'date',
        'payment_end' => 'date',
        'early_bird' => 'boolean'
    ];

    /**
     * Get fee for participant based on type and current date
     * @param string $participantType - e.g. 'presenter_reguler', 'participant_reguler'
     * @param string $attendance - 'online' or 'offline' (default: 'online')
     * @return array
     */
    public static function getFeeForParticipant($participantType, $attendance = 'online')
    {
        // Handle null or invalid participant type
        if (empty($participantType) || !is_string($participantType)) {
            $participantType = 'participant_reguler'; // Default fallback
        }

        // Handle null or invalid attendance type
        if (empty($attendance) || !in_array($attendance, ['online', 'offline'])) {
            $attendance = 'online'; // Default fallback
        }

        // Parse participant type
        $type = str_contains($participantType, 'student') ? 'student' : 'regular';
        $category = str_contains($participantType, 'presenter') ? 'presenter' : 'participant';

        // Get current fee based on date (use date only for comparison)
        $currentDate = now()->format('Y-m-d');

        // Try to find fee for current date first
        $fee = self::where('participant_type', $type)
                   ->where('category', $category)
                   ->whereDate('payment_start', '<=', $currentDate)
                   ->whereDate('payment_end', '>=', $currentDate)
                   ->first();

        // If no current fee found, get the latest applicable fee
        if (!$fee) {
            $fee = self::where('participant_type', $type)
                       ->where('category', $category)
                       ->orderBy('early_bird', 'desc') // Try early bird first
                       ->orderBy('payment_end', 'desc')
                       ->first();
        }

        // If still no fee found for student, fallback to regular
        if (!$fee && $type === 'student') {
            // Try current date first for regular
            $fee = self::where('participant_type', 'regular')
                       ->where('category', $category)
                       ->whereDate('payment_start', '<=', $currentDate)
                       ->whereDate('payment_end', '>=', $currentDate)
                       ->first();

            // If still no fee, get latest regular fee
            if (!$fee) {
                $fee = self::where('participant_type', 'regular')
                           ->where('category', $category)
                           ->orderBy('early_bird', 'desc')
                           ->orderBy('payment_end', 'desc')
                           ->first();
            }
        }

        if ($fee) {
            $idr = ($attendance === 'offline') ? $fee->fee_idr_offline : $fee->fee_idr_online;
            $usd = ($attendance === 'offline') ? $fee->fee_usd_offline : $fee->fee_usd_online;

            return [
                'idr' => $idr,
                'usd' => $usd,
                'formatted' => 'IDR ' . number_format($idr, 0, '.', '.') . ' / $' . number_format($usd, 0) . ' USD',
                'early_bird' => $fee->early_bird,
                'period_start' => $fee->payment_start,
                'period_end' => $fee->payment_end
            ];
        }

        // Fallback if no fee found
        return [
            'idr' => 0,
            'usd' => 0,
            'formatted' => 'IDR 0 / $0 USD',
            'early_bird' => false,
            'period_start' => null,
            'period_end' => null
        ];
    }

    /**
     * Get all pricing tiers for homepage display
     * @return array
     */
    public static function getAllPricingTiers()
    {
        $fees = self::orderBy('category')->orderBy('early_bird', 'desc')->get();

        $pricing = [
            'presenter' => ['early_bird' => null, 'non_early_bird' => null],
            'participant' => ['early_bird' => null, 'non_early_bird' => null]
        ];

        foreach ($fees as $fee) {
            $key = $fee->early_bird ? 'early_bird' : 'non_early_bird';
            $pricing[$fee->category][$key] = [
                'idr' => $fee->fee_idr_online,
                'usd' => $fee->fee_usd_online,
                'formatted' => number_format($fee->fee_idr_online / 1000, 0) . 'K IDR / ' . number_format($fee->fee_usd_online, 0) . ' USD',
                'period_start' => $fee->payment_start,
                'period_end' => $fee->payment_end
            ];
        }

        return $pricing;
    }

    /**
     * Check if current date is in early bird period
     * @return bool
     */
    public static function isEarlyBirdPeriod()
    {
        $currentDate = now()->format('Y-m-d');

        return self::where('early_bird', true)
                  ->whereDate('payment_start', '<=', $currentDate)
                  ->whereDate('payment_end', '>=', $currentDate)
                  ->exists();
    }
}