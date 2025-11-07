<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function detailPayments()
    {
        return $this->hasMany(DetailPayment::class);
    }

    public function uploadAbstract()
    {
        return $this->belongsTo(UploadAbstract::class);
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function uploadFulltexts()
    {
        return $this->hasMany(UploadFulltext::class);
    }

    /**
     * Get the receipt PDF path attribute
     * Generates path from participant name and abstract ID
     * Format: receipt/receipt-abs-{abstract_id}-{participant_name}.pdf
     */
    public function getReceiptPathAttribute()
    {
        if (!$this->participant) {
            return null;
        }

        $id = $this->upload_abstract_id ?? 'participant';
        $fullName = $this->participant->full_name1;

        return "receipt/receipt-abs-{$id}-{$fullName}.pdf";
    }
}
