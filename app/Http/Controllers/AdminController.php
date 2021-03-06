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

		$return_array['current_items'] = Skwad::getGossip();

		return View::make("admin.index", $return_array);
	}

	public function store(Request $request) {

		$item_image = 'https://s3.amazonaws.com/inkboxdesigns/logo/logo_smokey.svg';

		if (null !== $request->file('upload_item_image')) {
			$upload = $request->file('upload_item_image');
			$imageFileName = time() . '.' . $upload->getClientOriginalExtension();
			$s3 = \Storage::disk('s3');
			$filePath = '/skwad/items/' . $imageFileName;
			$s3->put($filePath, file_get_contents($upload), 'public');

			$item_image = "https://s3.amazonaws.com/inkboxdesigns" . $filePath;
		}

		$item_type        = $request->input('item_type');
		$item_title       = $request->input('item_title');
		$item_description = $request->input('item_description');

		$insert = DB::insert("INSERT INTO `skwad`.`gossip` (`type`, `title`, `description`, `image_url`) VALUES (?,?,?,?)", array($item_type, $item_title, $item_description, $item_image));

		Session::flash("status_success", "Item successfully added!");

		return back();
	}

	public function delete($item_id) {
		$update = DB::update("UPDATE `skwad`.`gossip` SET `status` = 'inactive' WHERE `id` = ? LIMIT 1", array($item_id));
		Session::flash("status_success", "Item successfully removed!");
		return back();
	}
}