<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Sep 2019 13:36:22 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contract
 * 
 * @property int $id_contrato
 * @property int $nro_linea
 * @property string $proveedor
 * @property int $capacidad
 * @property string $descripcion
 * @property \Carbon\Carbon $fecha_inicio
 * @property \Carbon\Carbon $fecha_fin
 * @property int $periodicidad
 * @property float $costo_instala_corriente
 * @property float $costo_abono_corriente
 * @property string $moneda
 * @property string $costo_instala
 * @property string $costo_abono
 * @property int $tipo_rubro
 * @property int $tipo_alquiler
 * @property string $tipo_abono
 * @property string $unidad
 * @property float $importe_sin_iva
 * @property \Carbon\Carbon $fecha_baja
 * @property string $nro_cliente
 * @property string $nro_servicio
 * @property \Carbon\Carbon $fecha_instalacion
 * @property string $extremo_1
 * @property string $extremo_2
 * @property string $motivo_baja
 * @property string $provincia_1
 * @property string $localidad_1
 * @property string $calle_1
 * @property string $nro_1
 * @property string $torre_1
 * @property string $puerta_1
 * @property string $provincia_2
 * @property string $localidad_2
 * @property string $calle_2
 * @property string $nro_2
 * @property string $torre_2
 * @property string $puerta_2
 * @property int $meses
 * @property string $instalacion
 * @property string $renovacion
 * @property string $lineas_asociadas
 * @property string $lineas_canje
 *
 * @package App\Models
 */
class Contract extends Model
{
	protected $primaryKey = 'id_contrato';
	public $timestamps = false;

	protected $casts = [
		'nro_linea' => 'int',
		'capacidad' => 'int',
		'periodicidad' => 'int',
		'costo_instala_corriente' => 'float',
		'costo_abono_corriente' => 'float',
		'tipo_rubro' => 'int',
		'tipo_alquiler' => 'int',
		'importe_sin_iva' => 'float',
		'meses' => 'int'
	];

	protected $dates = [
		'fecha_inicio',
		'fecha_fin',
		'fecha_baja',
		'fecha_instalacion'
	];

	protected $fillable = [
		'nro_linea',
		'proveedor',
		'capacidad',
		'descripcion',
		'fecha_inicio',
		'fecha_fin',
		'periodicidad',
		'costo_instala_corriente',
		'costo_abono_corriente',
		'moneda',
		'costo_instala',
		'costo_abono',
		'tipo_rubro',
		'tipo_alquiler',
		'tipo_abono',
		'unidad',
		'importe_sin_iva',
		'fecha_baja',
		'nro_cliente',
		'nro_servicio',
		'fecha_instalacion',
		'extremo_1',
		'extremo_2',
		'motivo_baja',
		'provincia_1',
		'localidad_1',
		'calle_1',
		'nro_1',
		'torre_1',
		'puerta_1',
		'provincia_2',
		'localidad_2',
		'calle_2',
		'nro_2',
		'torre_2',
		'puerta_2',
		'meses',
		'instalacion',
		'renovacion',
		'lineas_asociadas',
		'lineas_canje'
    ];
    
    
}
