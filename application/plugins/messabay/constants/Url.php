<?php

namespace Messabay\Constants;

use VthSupport\Enums\BaseEnum;

use TechSupport\Helpers\StringHelper;

class Url extends BaseEnum

{

	const CONTACT = 'gui-lien-he'; //contact
	const SEARCH = 'tim-kiem'; // search
	const QUICK_CONTACT = 'gui-lien-he-nhanh'; // quickContact
	const ALLPRO = 'san-pham'; //allpro
	const ALLNEWS = 'tin-tuc'; //allnews
	public static function getRoutes()
	{

		$constants = static::getConstants();

		$results = [];

		foreach ($constants as $key => $constant) {

			$fnc = StringHelper::camelCase($key);

			$results[$fnc] = $constant;
		}

		return $results;
	}
}
