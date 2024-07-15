<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'code',
        'name',
        'email',
        'address',
        'type',
        'phone',
        'owner',
        'specialization',
        'account_number',
        'account_name',
        'bank',
        'bank_branch',
        'no_ktp',
        'no_npwp',
        'img_ktp_path',
        'img_npwp_path',
        'created_by',
        'updated_by',
    ];
}
