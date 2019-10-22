<?php

namespace App\Exports;

use App\Customer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView            
{
	public function view(): View
	{
		$country = request('country') ;      
		$gender = request('gender') ;
		if ($country && $gender) {
			return view('excel', [
				'users' => Customer::query()->where('Country',$country)
				->where('Gender',$gender)->get()
			]);
		}
		if ($country) {
			return view('excel', [
				'users' => Customer::query()->where('Country',$country)->get()
			]);
		} 
		if ($gender) {
			return view('excel', [
				'users' => Customer::query()->where('Gender',$gender)->get()
			]);
		}
		else {
			return view('excel', [
				'users' => Customer::get()
		//		'users' => Customer::france()->get() //  we can use Scope as well uncomment to see changes
			]);
		}

	}
}