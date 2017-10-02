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
	 *	Total Points
	 */
	public static function getTotalPoints() {
		return 'TBD';
	}

	/**
	 *	Daily Stats Function
	 */
	public static function getDailyStats() {

		$return_array                  = array();
		$return_array['sales_today']   = 0;
		$return_array['orders_picked'] = 0;

		setlocale(LC_MONETARY, 'en_US');

		$get_sales = DB::select("SELECT ROUND(SUM(`total_price_usd`), 2) AS `total_sales` FROM `shopify_orders` WHERE `created_at` >= DATE_FORMAT(NOW(), '%y-%m-%d') AND (`fulfillment_status` IN ('fulfilled', 'pending') OR `fulfillment_status` IS NULL)", array());

		foreach ($get_sales as $key => $value) $return_array['sales_today'] = money_format("%n", $value->total_sales);

		$get_orders_picked = DB::select('SELECT "Total", COUNT(`order_id`) AS `orders_picked` FROM `shopify_orders_fulfillment` WHERE DATE_FORMAT(CONVERT_TZ(`created_at`, "GMT", "EST"), "%Y-%m-%d") >= DATE_FORMAT(CONVERT_TZ(NOW(), "GMT", "EST"), "%Y-%m-%d") AND `status` = "complete"', array());

		foreach ($get_orders_picked as $key => $value) $return_array['orders_picked'] = $value->orders_picked;

		return $return_array;
	}

	/**
	 *	Daily Targets
	 */
	public static function getDailyTargets() {

		$return_array = array('daily target');

		return $return_array;
	}

	/**
	 *	Quotes
	 */
	public static function getQuotes() {

		$return_array = array();

		$get_quotes_count = DB::select("SELECT COUNT(`quote`) AS `count` FROM `skwad`.`quotes`", array());

		$quote_count = 0;
		$offset = 0;

		foreach ($get_quotes_count as $key => $value) {
			$quote_count = $value->count;

			if ($quote_count > 0) {
				$range_val = round($quote_count / 10);
				$offset = rand(0, $range_val);
			}
		}

		$get_quotes = DB::select("SELECT `quote` FROM `skwad`.`quotes` ORDER BY `created_at` DESC LIMIT ?,10", array($offset));

		foreach ($get_quotes as $key => $value) array_push($return_array, $value->quote);

		return $return_array;
	}

	/**
	 *	Gossip
	 */
	public static function getGossip() {

		$return_array = array();

		$get_quotes = DB::select("SELECT `title`, `description`, `image_url`, `type`, DATE_FORMAT(`created_at`, '%Y-%m-%d') as `posted_date` FROM `skwad`.`gossip` WHERE `status` = 'active' ORDER BY `created_at` DESC", array());

		foreach ($get_quotes as $key => $value) {
			$item_type = $value->type;
			if ($item_type == 'news' || $item_type == 'event') $item_type = 'gossip';

			if (!isset($return_array[$item_type])) $return_array[$item_type] = array();

			array_push($return_array[$item_type], array(
					'title'       => $value->title,
					'description' => $value->description,
					'image_url'   => $value->image_url,
					'posted_date' => $value->posted_date,
					'type'        => $value->type,
				)
			);
		}

		return $return_array;
	}

	/**
	 *	Core Values
	 */
	public static function getCoreValues() {

		$return_array = array('core values');

		return $return_array;
	}
}