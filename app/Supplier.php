<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string $email
 * @property string $telepon
 * @property string $fax
 * @property string $website
 * @property string $nama_cp
 * @property string $telepon_cp
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Barang[] $barangs
 */
class Supplier extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['nama', 'alamat', 'email', 'telepon', 'fax', 'website', 'nama_cp', 'telepon_cp', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function barangs()
    {
        return $this->hasMany('App\Barang', 'id_supplier');
    }
}
