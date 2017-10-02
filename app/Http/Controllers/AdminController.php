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

class AdminController extends BaseController
{
	public function index() {

		$return_array = array();

		return View::make("admin.index", $return_array);
	}

	public function store(Request $request) {

		$item_image = 'https://s3.amazonaws.com/inkboxdesigns/logo/logo_smokey.svg';

		if (null !== $request->file('upload_item_image')) {
			$upload = $request->file('upload_item_image')->store('skwad/items', 's3', 'public');

			$item_image = "https://s3.amazonaws.com/inkboxdesigns/" . $upload;
		}

		$item_type        = $request->input('item_type');
		$item_title       = $request->input('item_title');
		$item_description = $request->input('item_description');

		$insert = DB::insert("INSERT INTO `skwad`.`gossip` (`type`, `title`, `description`, `image_url`) VALUES (?,?,?,?)", array($item_type, $item_title, $item_description, $item_image));

		Session::flash("status_success", "Item successfully added!");

		return back();
	}
}