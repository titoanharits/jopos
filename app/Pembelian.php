<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id_pembelian
 * @property int $id_supplier
 * @property string $no_bukti
 * @property string $tanggal
 * @property float $biaya_kirim
 * @property float $diskon_satu
 * @property float $diskon_dua
 * @property string $jenis_transaksi
 * @property string $jatuh_tempo
 * @property float $neto
 * @property float $uang_muka
 * @property float $sisa_piutang
 * @property float $total
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Supplier $supplier
 * @property HutangPembelian[] $hutangPembelians
 */
class Pembelian extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_pembelian';

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
    protected $fillable = ['id_pembelian', 'id_supplier', 'no_bukti', 'tanggal', 'biaya_kirim', 'neto', 'diskon_satu', 'diskon_dua', 'jenis_transaksi', 'uang_muka', 'sisa_piutang', 'total', 'created_at', 'updated_at', 'deleted_at'];

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
    public function hutangPembelians()
    {
        return $this->hasMany('App\HutangPembelian', 'id_pembelian', 'id_pembelian');
    }
}
