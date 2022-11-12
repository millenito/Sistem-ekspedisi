<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdDistrictprices extends Model
{
    use HasFactory;

    protected $table = 'md_districtprices';

    public function branch()
    {
        return $this->hasOne(MdBranches::class, 'branch_code', 'branch_code');
    }

    public function branchdest()
    {
        return $this->hasOne(MdBranches::class, 'branch_code', 'branch_dest_code');
    }

    public function districtdest()
    {
        return $this->hasOne(MdBranches::class, 'district_code', 'district_dest_code');
    }

    public function service()
    {
        return $this->hasOne(MdCodes::class, 'service_code', 'code_code');
    }

    public function goodstype()
    {
        return $this->hasOne(MdCodes::class, 'goods_type_code', 'code_code');
    }
}
