<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * JICEST 2026 registration fee periods.
 *
 * Early Bird : 1 August 2026  - 14 October 2026
 * Regular    : 15 October 2026 - 9 November 2026
 *
 * The fees table is seeded outside of migrations (see jicestunja_database.sql),
 * so this migration is defensive and simply re-dates the existing rows.
 */
return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('fees')) {
            return;
        }

        DB::table('fees')->where('early_bird', 1)->update([
            'payment_start' => '2026-08-01',
            'payment_end' => '2026-10-14',
        ]);

        DB::table('fees')->where('early_bird', 0)->update([
            'payment_start' => '2026-10-15',
            'payment_end' => '2026-11-09',
        ]);
    }

    public function down(): void
    {
        if (!Schema::hasTable('fees')) {
            return;
        }

        DB::table('fees')->where('early_bird', 1)->update([
            'payment_start' => '2024-08-01',
            'payment_end' => '2024-09-14',
        ]);

        DB::table('fees')->where('early_bird', 0)->update([
            'payment_start' => '2024-09-15',
            'payment_end' => '2024-10-10',
        ]);
    }
};
