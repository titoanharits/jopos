<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_customer
 * @property string $nama
 * @property string $email
 * @property string $alamat
 * @property string $telepon
 * @property string $keterangan
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Penjualan[] $penjualans
 */
class Customer extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'customer';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_customer';

    /**
     * @var array
     */
    protected $fillable = ['nama', 'email', 'alamat', 'telepon', 'keterangan', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penjualans()
    {
        return $this->hasMany('App\Penjualan', 'id_customer', 'id_customer');
    }
}
