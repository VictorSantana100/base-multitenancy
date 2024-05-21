<?php

namespace App\Repository;

use App\Models\Profile;
use App\Models\PermissionProfile;

class ProfileRepository
{

    protected $profile;
    protected $permissionProfile;

    public function __construct(Profile $profile, PermissionProfile $permissionProfile)
    {
        $this->profile = $profile;
        $this->permissionProfile = $permissionProfile;
    }

    public function getProfile()
    {
        return $this->profile->get();
    }

    public function getProfileById($id)
    {
        return $this->profile->findOrFail($id);
    }

    public function storeProfile($data)
    {
        $profile = $this->profile->create([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'company_id' => $data['company_id'] ?? null
        ]);
        $this->storePermissionsProfile($data['permissions'], $profile);
        return $profile;
    }

    public function updateProfileById($data, $id)
    {
        $profile = $this->getProfileById($id);
        $profile->update([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'company_id' => $data['company_id'] ?? null
        ]);
        $this->removeProfilePermissions($id);
        $this->storePermissionsProfile($data['permissions'], $profile);
        return $profile;
    }

    public function deleteProfileById($id)
    {
        $this->removeProfilePermissions($id);
        return $this->getProfileById($id)->delete();
    }

    public function removeProfilePermissions($id){
        $this->permissionProfile->where('profile_id', $id)->delete();
    }

    public function storePermissionsProfile($permissions, $profile)
    {
        foreach ($permissions as $permission) {
            $this->permissionProfile->create([
                'permission_id' => $permission,
                'profile_id' => $profile->id
            ]);
        }
    }
}
