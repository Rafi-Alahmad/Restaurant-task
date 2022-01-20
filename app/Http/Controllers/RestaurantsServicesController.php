<?php

namespace App\Http\Controllers;

use App\DataTables\ServicesDataTable;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RestaurantsServicesController extends Controller
{


    public function showServicesScreen(ServicesDataTable $servicesDataTable)
    {
        return $servicesDataTable->render('services.services');
    }

    public function create(Request $request)
    {
        Validator::make($request->all(), [
            "description" => ['nullable', 'string', 'max:500'],
            "title" => ['string', 'required', 'max:50'],
            "subtitle" => ['string', 'required', 'max:50'],
            "price" => ['required', 'numeric', 'min:0'],
            "type" => ['string', 'required', 'in:drink,meal'],
            "image" => ['nullable', 'file', 'max:2048'],
        ])->validate();

        $image_path = ("img/food-and-drink.jpg");
        if (isset($request->image)) {
            $image_path = $request->file('image')->store('services');
        }

        Service::create([
            "restaurant_id" => Auth::guard()->user()->id,
            "description" => $request->description,
            "title" => $request->title,
            "subtitle" => $request->subtitle,
            "price" => $request->price,
            "type" => $request->type,
            "image" => $image_path,
        ]);

        return $request->wantsJson()
            ? new JsonResponse([
                "code" => 1,
                "data" => "",
                "msg" => trans('app.success_insertion_msg')
            ], 200)
            : back()->with('success', trans('app.success_insertion_msg'));
    }


    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'id' => ['required', 'max:190', 'exists:App\Models\Service,id'],
            "description" => ['nullable', 'string', 'max:500'],
            "title" => ['string', 'required', 'max:50'],
            "subtitle" => ['string', 'required', 'max:50'],
            "price" => ['required', 'numeric', 'min:0'],
            "type" => ['string', 'required', 'in:drink,meal'],
            "image" => ['nullable', 'file', 'max:2048'],
        ])->validate();

        $service = Service::find($request->id);

        $service->description =  $request->description;
        $service->title =  $request->title;
        $service->subtitle =  $request->subtitle;
        $service->price =  $request->price;
        $service->type =  $request->type;
        
        
        if (isset($request->image)) {
            $service->image = $request->file('image')->store('services');
        }

        $service->save();

        return $request->wantsJson()
            ? new JsonResponse([
                "code" => 1,
                "data" => "",
                "msg" => trans('app.success_update_msg')
            ], 200)
            : back()->with('success', trans('app.success_update_msg'));
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            'id' => ['required', 'max:190', 'exists:App\Models\Service,id'],
        ], [], [])->validate();

        $service = Service::find($data['id']);

        $service->delete();
        return $request->wantsJson()
            ? new JsonResponse([
                "code" => 1,
                "data" => "",
                "msg" => trans('app.success_delete_msg')
            ], 200)
            : back()->with('success', trans('app.success_delete_msg'));
    }
}
