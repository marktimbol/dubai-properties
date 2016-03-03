<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class StoreUserRoomRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required',
            'price' => 'required',
            'minimumStay' => 'required',
            'propertyType'  => 'required',
            'roomType'  => 'required',
            'accommodates'  => 'required',
            'bathrooms' => 'required',
            'bedType'   => 'required',
            'bedrooms'  => 'required',
            'beds'  => 'required',
            'checkIn'   => 'required',
            'checkOut'  => 'required',
            'extraPeopleFee'    => 'required',
            'cleaningFee'   => 'required',
        ];
    }
}
