<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Models\Skwad;

use Auth;
use DB;
use Log;
use Redirect;
use Session;
use View;

class SkwadController extends BaseController
{
	public function index() {

		$return_array = array();

		$return_array['stats']         = Skwad::getDailyStats();
		$return_array['total_points']  = Skwad::getTotalPoints();
		$return_array['news']          = Skwad::getQuotes();
		$return_array['core_values']   = Skwad::getCoreValues();
		$return_array['daily_targets'] = Skwad::getDailyTargets();
		$return_array['gossip']        = Skwad::getGossip();

		return View::make("skwad.index", $return_array);
	}
}