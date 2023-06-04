<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Content;
use App\Models\Province;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){
        $contents = Content::where('status_publish', 1)->latest()->limit(9)->get();
        return view('homepage.index', compact('contents'));
    }
    public function detailContent(Province $province, City $city, Content $content)
    {
        $contents = Content::where('status_publish', 1)->get()->random('5');
        $provinces = Province::get()->random('5');
       return view('homepage.detail', compact('province','city','content','contents','provinces'));
    }
    public function getContentProvince(Province $province)
    {
        $city = City::where('province_id', $province->id)->pluck('id');
        $contents = Content::where('status_publish', 1)->whereIn('city_id', $city)->paginate(12);
        return view('homepage.getContentProvince', compact('contents','province'));
    }
    public function getProvince()
    {
        $provinces = Province::all();
        return view('homepage.getProvince', compact('provinces'));
    }
    public function result(Request $request)
    {
        $search = $request->search;

        $city = City::where('name','like', '%' . $search . '%')->first();
        $province = Province::where('name','like', '%' . $search . '%')->first();

        $contents = Content::where('status_publish', 1)->where('title','like', '%' . $search . '%')->paginate(12);

        if ($city == !null) {
            $contents = Content::where('status_publish', 1)->where('city_id',$city->id)->paginate(12);
        }

        if ($province == !null) {
            $city = City::where('province_id', $province->id )->pluck('id');
            $contents = Content::where('status_publish', 1)->whereIn('city_id',$city)->paginate(12);
        }

        return view('homepage.result', compact('search','contents'));
    }
    public function otherContent()
    {
        $current_id = Content::where('status_publish', 1)->offset(0)->limit(9)->latest()->pluck('id');
        $contents = Content::where('status_publish', 1)->latest()->whereNotIn('id', $current_id)->paginate(9);
        return view('homepage.otherContent', compact('contents'));
    }
}
