<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdDistricts extends Model
{
    use HasFactory;

    protected $table = 'md_districts';

    public function branch()
    {
        return $this->hasOne(MdBranches::class, 'branch_code', 'branch_code');
    }
}
