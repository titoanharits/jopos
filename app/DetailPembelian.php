<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id_pembelian
 * @property string $id_barang
 * @property int $jumlah
 * @property int $saldo
 * @property string $satuan
 * @property float $diskon_satu
 * @property float $diskon_dua
 * @property float $total_harga
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Barang $barang
 * @property Pembelian $pembelian
 */
class DetailPembelian extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['id_pembelian', 'id_barang', 'jumlah', 'saldo', 'satuan', 'diskon_satu', 'diskon_dua', 'total_harga', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barang()
    {
        return $this->belongsTo('App\Barang', 'id_barang', 'id_barang');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pembelian()
    {
        return $this->belongsTo('App\Pembelian', 'id_pembelian', 'id_pembelian');
    }
}
