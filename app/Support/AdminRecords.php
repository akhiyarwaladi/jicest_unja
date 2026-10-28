<?php

namespace App\Support;

use App\Models\Participant;
use App\Models\Payment;
use App\Models\UploadAbstract;
use App\Models\UploadFulltext;
use Illuminate\Database\Eloquent\Builder;

class AdminRecords
{
    public const PRESENTERS = ['presenter', 'presenter_reguler', 'presenter_student', 'professional presenter', 'student presenter'];
    public const PARTICIPANTS = ['participant', 'participant_reguler', 'participant_student'];

    public static function participants($name = '', $from = null, $to = null, ?string $paidCategory = null): Builder
    {
        $query = Participant::with('user');
        self::text($query, ['full_name1', 'full_name2'], $name);
        if ($paidCategory !== null) {
            $query->whereIn('participant_type', $paidCategory === 'presenter' ? self::PRESENTERS : self::PARTICIPANTS)
                ->whereHas('payments', function ($payments) use ($from, $to) {
                    $payments->where('validation', 'valid');
                    self::dates($payments, $from, $to);
                });
        } else {
            self::dates($query, $from, $to);
        }
        return $query->orderBy('full_name1')->orderBy('id');
    }

    public static function abstracts($status = '', $name = '', $from = null, $to = null): Builder
    {
        $query = UploadAbstract::with('participant.user');
        if (in_array($status, ['reviewed', 'ted'], true)) {
            $query->whereIn('status', ['accepted', 'rejected']);
        } else {
            self::status($query, 'status', $status);
        }
        self::text($query, ['presenter', 'authors'], $name, 'participant');
        self::dates($query, $from, $to);
        return $query->orderBy('topic')->orderBy('id');
    }

    public static function payments($status = '', $name = '', $from = null, $to = null): Builder
    {
        $query = Payment::with(['participant.user', 'uploadAbstract']);
        self::status($query, 'validation', $status);
        self::text($query, [], $name, 'participant');
        self::dates($query, $from, $to);
        return $query->orderBy('created_at')->orderBy('id');
    }

    public static function papers($status = '', $term = '', $from = null, $to = null): Builder
    {
        $query = UploadFulltext::with(['payment.participant.user']);
        self::status($query, 'validation', $status);
        self::text($query, ['title'], $term, 'payment.participant');
        self::dates($query, $from, $to);
        return $query->orderByDesc('created_at')->orderByDesc('id');
    }

    public static function members($status = '', $name = ''): Builder
    {
        $query = Participant::with('user')->whereNotNull('member_card')->where('member_card', '<>', '');
        self::status($query, 'hki_status', $status);
        self::text($query, ['full_name1', 'full_name2'], $name);
        return $query->orderBy('full_name1')->orderBy('id');
    }

    private static function dates(Builder $query, $from, $to): void
    {
        if ($from) {
            $query->whereDate('created_at', '>=', $from);
        }
        if ($to) {
            $query->whereDate('created_at', '<=', $to);
        }
    }

    private static function status(Builder $query, string $column, $status): void
    {
        $status = mb_strtolower(trim((string) $status), 'UTF-8');
        if ($status !== '') {
            $query->whereRaw('LOWER('.$column.') = ?', [$status]);
        }
    }

    private static function text(Builder $query, array $columns, $search, ?string $participantRelation = null): void
    {
        $terms = preg_split('/\s+/u', trim((string) $search), -1, PREG_SPLIT_NO_EMPTY);
        foreach ($terms ?: [] as $term) {
            $pattern = '%'.str_replace(['!', '%', '_'], ['!!', '!%', '!_'], mb_strtolower($term, 'UTF-8')).'%';
            $query->where(function ($match) use ($columns, $participantRelation, $pattern) {
                foreach ($columns as $column) {
                    $match->orWhereRaw("LOWER(COALESCE($column, '')) LIKE ? ESCAPE '!'", [$pattern]);
                }
                if ($participantRelation) {
                    $match->orWhereHas($participantRelation, function ($person) use ($pattern) {
                        $person->where(function ($names) use ($pattern) {
                            foreach (['full_name1', 'full_name2'] as $column) {
                                $names->orWhereRaw("LOWER(COALESCE($column, '')) LIKE ? ESCAPE '!'", [$pattern]);
                            }
                        });
                    });
                }
            });
        }
    }
}
