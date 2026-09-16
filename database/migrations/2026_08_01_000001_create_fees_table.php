<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Creates the `fees` table and seeds the JICEST 2026 pricing tiers.
 *
 * Why this exists: the table was previously shipped only inside jicestunja_database.sql,
 * so a fresh `php artisan migrate` left it missing and the homepage failed with
 * "Base table or view not found: jicest_unja.fees" (Fee::getAllPricingTiers()).
 *
 * Fee amounts are unchanged from the previous edition; only the payment windows move to
 * the 2026 dates:
 *   Early bird : 1 August 2026  - 14 October 2026
 *   Regular    : 15 October 2026 - 9 November 2026
 *
 * The table is only created when absent, and rows are only seeded when the table is empty,
 * so this is safe to run against an existing production database.
 */
return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('fees')) {
            Schema::create('fees', function (Blueprint $table) {
                $table->increments('id');
                $table->string('participant_type', 50)->nullable();
                $table->string('category', 20)->nullable();
                $table->boolean('early_bird')->nullable();
                $table->date('payment_start')->nullable();
                $table->date('payment_end')->nullable();
                $table->decimal('fee_idr_online', 10, 2)->nullable();
                $table->decimal('fee_usd_online', 10, 2)->nullable();
                $table->decimal('fee_idr_offline', 10, 2)->nullable();
                $table->decimal('fee_usd_offline', 10, 2)->nullable();
            });
        }

        // Never overwrite pricing that is already in place.
        if (DB::table('fees')->exists()) {
            return;
        }

        $tiers = [
            // [participant_type, category, early_bird, idr_online, usd_online, idr_offline, usd_offline]
            ['student', 'participant', true, 50000, 5, 100000, 10],
            ['student', 'presenter', true, 250000, 25, 300000, 30],
            ['student', 'participant', false, 75000, 7.5, 125000, 12.5],
            ['student', 'presenter', false, 300000, 30, 350000, 35],
            ['regular', 'participant', true, 100000, 10, 150000, 15],
            ['regular', 'presenter', true, 350000, 35, 500000, 50],
            ['regular', 'participant', false, 150000, 15, 200000, 20],
            ['regular', 'presenter', false, 400000, 40, 600000, 60],
        ];

        $rows = [];

        foreach ($tiers as [$type, $category, $earlyBird, $idrOnline, $usdOnline, $idrOffline, $usdOffline]) {
            $rows[] = [
                'participant_type' => $type,
                'category' => $category,
                'early_bird' => $earlyBird,
                'payment_start' => $earlyBird ? '2026-08-01' : '2026-10-15',
                'payment_end' => $earlyBird ? '2026-10-14' : '2026-11-09',
                'fee_idr_online' => $idrOnline,
                'fee_usd_online' => $usdOnline,
                'fee_idr_offline' => $idrOffline,
                'fee_usd_offline' => $usdOffline,
            ];
        }

        DB::table('fees')->insert($rows);
    }

    /**
     * Rolling back removes the pricing table. Export the `fees` rows first if they are
     * the only copy of the live fees.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
