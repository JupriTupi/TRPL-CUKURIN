<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataVoucher extends Model
{
    protected $table = 'voucher';
    protected $fillable= ['jenisvoucher', 'jumlahcoin', 'jumlahvoucher'];
}
