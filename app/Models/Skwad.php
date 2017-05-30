<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;
use DateTime;
use DB;
use Log;
use Session;
use View;

/**
 * Shopify
 */
class Skwad {

	/**
	 *	Order functions
	 */
	public static function getDailyStats() {

		$return_array = array();
		$return_array['sales_today'] = 0;

		$get_sales = DB::select("SELECT ROUND(SUM(`total_price_usd`), 2) AS `total_sales` FROM `shopify_orders` WHERE `created_at` >= DATE_FORMAT(NOW(), '%y-%m-%d') AND (`fulfillment_status` IN ('fulfilled', 'pending') OR `fulfillment_status` IS NULL)", array());

		foreach ($get_sales as $key => $value) $return_array['sales_today'] = $value->total_sales;

		return $return_array;
	}
}