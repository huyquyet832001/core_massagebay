<?php 
namespace Bionex\Models;
use TechSupport\Models\BaseModel as Base;
class ProCategory extends Base{
	protected $table = 'pro_categories';
	public static function getListFillter($idCate)

	{

		$where = [['act','=',1]];

		if ($idCate > 0) {

			$itemCate = static::find($idCate);

			if (!$itemCate->isEmpty()) {

				$listIdProperty = extraJson($itemCate->property_categories);

				array_push($listIdProperty,-1);

				array_push($where,['id','in',$listIdProperty]);

			}

		}

		return PropertyCategory::where($where);

	}
}
