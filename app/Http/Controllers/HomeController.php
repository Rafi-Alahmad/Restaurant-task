<?php

namespace App\Http\Controllers;

use App\DataTables\RestaurantsDataTable;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(RestaurantsDataTable $restaurantsDataTable)
    {
        return $restaurantsDataTable->render('home');
    }



    public function showRestaurant(Request $request)
    {
        $restaurant = User::find($request->restaurant);

        if (!$restaurant) {
            return redirect(route('home'));
        }

        $restaurantServices = Service::where('restaurant_id', $restaurant->id)->get();
        $restaurantServicesTypes = Service::select('type')->where('restaurant_id', $restaurant->id)->distinct()->get();

        // dd(empty($restaurantServicesTypes->toArray()));
        return view('restaurants.menu', [
            'restaurantServices' => $restaurantServices,
            'restaurantServicesTypes' => $restaurantServicesTypes,
            'restaurant' => $restaurant,
        ]);
    }
}
