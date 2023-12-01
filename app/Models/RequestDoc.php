<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDoc extends Model
{
    protected $fillable = [
        'aYear',
        'sem',
        'prog',
        'studentName',
        'studentNo',
        'req',
        'purpose',
        'totalPrice',
    ];

    public function generateTransNo()
    {
        // Retrieve the last transaction number from the database
        $lastTransaction = self::orderBy('transNo', 'desc')->first();

        if (!$lastTransaction) {
            $newTransactionCode = '0001';
        } else {
            $lastTransactionParts = $lastTransaction->transNo;
            $incrementedNumber = intval($lastTransactionParts);
            $newTransactionCode = str_pad($incrementedNumber + 1, 4, '0', STR_PAD_LEFT);

            // Keep incrementing the incremented number until a unique schedcode is generated
            while (self::where('transNo', $newTransactionCode)->exists()) {
                $incrementedNumber++;
                $newTransactionCode = str_pad($incrementedNumber, 4, '0', STR_PAD_LEFT);
            }
        }
        
        $this->attributes['transNo'] = $newTransactionCode;
    }
}
