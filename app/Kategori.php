<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_kategori
 * @property string $kategori
 * @property Barang[] $barangs
 */
class Kategori extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_kategori';

    /**
     * @var array
     */
    protected $fillable = ['kategori'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function barangs()
    {
        return $this->hasMany('App\Barang', 'id_kategori', 'id_kategori');
    }
}
