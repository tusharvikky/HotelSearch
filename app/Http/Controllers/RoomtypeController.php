<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RoomType;

class RoomtypeController extends Controller
{
    /**
     * Search for Room Availability
     *
     * @return Response
     */
    public function searchAvailability(Request $request)
    {
        $inputs = $request->all();

        $room_types = RoomType::where('city', $inputs['city'])
                                ->where('max_occupancy', '>=' , $inputs['guests']);
        
        if ($request->has('price')) {
            $pr = explode(';', $inputs['price']);
            $room_types = $room_types->whereBetween('base_price', $pr);
        }

        if ($request->has('rating')) {
            foreach ($inputs['rating'] as $rating) {
                switch ($rating) {
                    case '0' :
                        $room_types = $room_types->where('rating', '>', 90);
                        break ;
                    case '1' :
                        $room_types = $room_types->whereBetween('rating', [85,90]);
                        break ;
                    case '2' :
                        $room_types = $room_types->whereBetween('rating', [80,85]);
                        break ;
                    case '3' :
                        $room_types = $room_types->where('rating', '<', 80);
                        break ;
                }

            }
        }

        if ($request->has('type')) {
            $room_types = $room_types->whereIn('room_type', $inputs['type']);
        }

        $room_types = $room_types->get()->toArray();

        return \Response::json($room_types);

    }
}
