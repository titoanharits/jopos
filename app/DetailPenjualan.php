<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id_penjualan
 * @property string $id_barang
 * @property float $jumlah
 * @property int $saldo
 * @property float $total_harga
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Penjualan $penjualan
 * @property Barang $barang
 */
class DetailPenjualan extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['id_penjualan', 'id_barang', 'jumlah', 'saldo', 'total_harga', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penjualan()
    {
        return $this->belongsTo('App\Penjualan', 'id_penjualan', 'id_penjualan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barang()
    {
        return $this->belongsTo('App\Barang', 'id_barang', 'id_barang');
    }
}
