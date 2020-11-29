<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DataLayanan extends Model
{
    protected $table = 'layanan';
    protected $fillable= ['fotolayanan', 'namalayanan', 'deskripsi', 'harga'];
  
    public function getPhoto(){
      if(!$this->fotolayanan){
        return asset('/images/barber.jpg');
      }
      return asset('images/'.$this->foto_paket);
    }
  
    public function getharga()
    {
      return money_format('Rp%i', $this->harga);
    }
  
    // public function roles()
    // {
    //     return $this->belongsTo(Role::class, 'id_role');
    // }

    // public function hasRole($role)
    // {
    //     return $this->roles()->where('name', $role)->count() == 1;
    // }
}
