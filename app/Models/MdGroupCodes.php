<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdGroupCodes extends Model
{
    use HasFactory;
    protected $table = 'md_group_codes';
    protected $fillable = ['code_code', 'code_name', 'code_descr', 'created_by', 'updated_by', 'is_active'];

    public function codes()
    {
        return $this->hasMany('App\Models\MdCodes', 'code_code', 'code_codegroup');

    }

    public function display()
    {
        //menampilkan data dari kolom nama
        return $this->code_name;
    }
}
