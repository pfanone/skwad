<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use DB;
use Session;

class CheckIfAdmin
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null)
	{
		$user_id = Auth::id();
		$check = DB::select("SELECT `id` FROM `users` INNER JOIN `user_types` ON `users`.`id` = `user_types`.`user_id` WHERE `id` = ? AND `user_types`.`type_id` = 1 LIMIT 1", array($user_id));

		if (Session::has('flash_notice')) Session::reflash();
			
		foreach ($check as $key => $value) return $next($request);

		return redirect('/');
	}
}
