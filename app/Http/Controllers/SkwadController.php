<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use Auth;
use DB;
use Log;
use Redirect;
use Session;
use View;

class SkwadController extends BaseController
{
	public function index() {

		$return_array = Skwad::getDailyStats();

		$return_array['news'] = array(
			"50 Car Pile-Up Results In New City Sculpture",
			"Broccoli Tops For Moms, Last For Kids; Dads Indifferent",
			"Building Turned Into Aviary After Birds Stick To New Paint",
			"Bus Misses Turn, Dozens Late For Work",
			"9 Out Of 10 Sims Prefer Cranberry Jelly Over Preserves",
			"After 36 Years Of Marriage, Man Discovers Wife Is Actually A Rare Yucca Plant",
			"All Raccoons Cheat At Poker, Animal Researchers Say",
			"Ancient Meteorite Revealed To Be Burnt Burger",
			"Cab Fares In city name To Increase; Sims Brace For Worst"
		);

		return View::make("skwad.index", $return_array);
	}
}