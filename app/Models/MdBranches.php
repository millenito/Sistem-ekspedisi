<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdBranches extends Model
{
    use HasFactory;

    protected $table = 'md_branches';
    protected $fillable = ['branch_code', 'branch_name', 'branch_address', 'branch_phone', 'created_by', 'updated_by', 'is_active'];

    public function scopeActive($query)
    {
        return $query->where('is_active', '=', 1);
    }
}
