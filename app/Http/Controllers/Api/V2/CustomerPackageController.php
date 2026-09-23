<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Resources\V2\CustomerPackageResource;
use App\Models\CustomerPackage;
use Illuminate\Http\Request;


class CustomerPackageController extends Controller
{
    public function customer_packages_list()
    {
            $customer_packages = CustomerPackage::all();
            return CustomerPackageResource::collection($customer_packages);
    }
}
