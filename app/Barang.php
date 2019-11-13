<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id_barang
 * @property int $id_kategori
 * @property int $id_supplier
 * @property string $nama_barang
 * @property float $harga_beli
 * @property float $harga_jual
 * @property float $laba
 * @property int $stok
 * @property string $satuan_satu
 * @property string $satuan_dua
 * @property int $stok_dua
 * @property string $satuan_turunan_dua
 * @property string $satuan_tiga
 * @property int $stok_tiga
 * @property string $satuan_turunan_tiga
 * @property string $satuan_empat
 * @property int $stok_empat
 * @property string $satuan_turunan_empat
 * @property string $satuan_terakhir
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Kategori $kategori
 * @property Supplier $supplier
 * @property DetailPembelian[] $detailPembelians
 * @property DetailPenjualan[] $detailPenjualans
 * @property DetailReturPembelian[] $detailReturPembelians
 */
class Barang extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_barang';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['id_barang','id_kategori', 'id_supplier', 'nama_barang', 'harga_beli', 'harga_jual', 'laba', 'stok', 'satuan_satu', 'satuan_dua', 'stok_dua', 'satuan_turunan_dua', 'satuan_tiga', 'stok_tiga', 'satuan_turunan_tiga', 'satuan_empat', 'stok_empat', 'satuan_turunan_empat', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'id_kategori', 'id_kategori');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier()
    {
        return $this->belongsTo('App\Supplier', 'id_supplier');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailPembelians()
    {
        return $this->hasMany('App\DetailPembelian', 'id_barang', 'id_barang');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailPenjualans()
    {
        return $this->hasMany('App\DetailPenjualan', 'id_barang', 'id_barang');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailReturPembelians()
    {
        return $this->hasMany('App\DetailReturPembelian', 'id_barang', 'id_barang');
    }
}
