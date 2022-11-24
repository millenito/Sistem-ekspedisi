<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TxHistory extends Model
{
    use HasFactory;

    protected $table = 'tx_histories';

    protected $fillable = ['cn_no',
        'cn_processdatetime',
        'cn_processno',
        'cn_processcode',
        'cn_processdesc',
        'created_by',
        'updated_by',
        'is_active'
    ];

    public function connote()
    {
        return $this->belongsTo('App\Models\TxConnotes', 'cn_no', 'cn_no');
    }
}
