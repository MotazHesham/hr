<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'job_number' => $this->job_number,
            'phone' => $this->phone,
            'identity_number' => $this->identity_number,
            'identity_end_date' => $this->identity_end_date,
            'birthday' => $this->birthday,
            'gender' => $this->gender,
            'image' => $this->image ? asset($this->image->getUrl()) : null,
            'userFamilies' => $this->userFamilies,
            'userUserDocuments' => $this->userUserDocuments,
            'userContracts' => $this->userContracts,
            'userAttendances' => $this->userAttendances,
            'userRewards' => $this->userRewards,
            'userVacationRequests' => $this->userVacationRequests,
            'roles' => $this->roles,
        ];
    }
}
