<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\api_return;
use App\Models\User; 
use App\Http\Resources\V1\User\UserResource;

class UserController extends Controller
{
    use api_return;

    public function index(){  
        $users = User::with('userFamilies','userUserDocuments','userContracts','userAttendances','userRewards','userVacationRequests','roles')
                        ->orderBy('created_at','desc')
                        ->paginate(10);
                        
        $new = UserResource::collection($users);
        return $this->returnPaginationData($new,$users,"success");
    }
}
