<div class="d-flex align-items-center flex-wrap mb-3" style="gap: 12px">
    <button type="button" class="btn btn-secondary btn-sm" wire:click="allDates" wire:loading.attr="disabled">All dates</button>
    <span class="text-muted small">{{ $dateLabel }}{{ !$date_from && !$date_to ? ' · All years' : '' }}</span>
    @if ($date_from && $date_to && $date_from > $date_to)
        <span class="text-danger small" role="alert">Date From must be on or before Date To.</span>
    @endif
</div>
