<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id_penjualan
 * @property int $id_customer
 * @property string $tanggal
 * @property float $total
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Customer $customer
 * @property DetailPenjualan[] $detailPenjualans
 */
class Penjualan extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_penjualan';

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
    protected $fillable = ['id_penjualan', 'id_customer', 'tanggal', 'total', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'id_customer', 'id_customer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailPenjualans()
    {
        return $this->hasMany('App\DetailPenjualan', 'id_penjualan', 'id_penjualan');
    }
}
