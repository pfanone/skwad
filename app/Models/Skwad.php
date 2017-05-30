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

		$return_array                  = array();
		$return_array['sales_today']   = 0;
		$return_array['orders_picked'] = 0;

		setlocale(LC_MONETARY, 'en_US');

		$get_sales = DB::select("SELECT ROUND(SUM(`total_price_usd`), 2) AS `total_sales` FROM `shopify_orders` WHERE `created_at` >= DATE_FORMAT(NOW(), '%y-%m-%d') AND (`fulfillment_status` IN ('fulfilled', 'pending') OR `fulfillment_status` IS NULL)", array());

		foreach ($get_sales as $key => $value) $return_array['sales_today'] = money_format("%n", $value->total_sales);

		$get_orders_picked = DB::select("SELECT COUNT(`order_id`) AS `count` FROM `shopify_orders` LEFT JOIN `shopify_orders_priority` USING(`order_id`) LEFT JOIN `shopify_orders_fulfillment` USING(`order_id`) WHERE `fulfillment_status` IS NULL AND `shopify_orders_fulfillment`.`status` IS NULL AND `risk_assessment` != 'cancel'", array());

		foreach ($get_orders_picked as $key => $value) $return_array['orders_picked'] = $value->count;

		return $return_array;
	}
}