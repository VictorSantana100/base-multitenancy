<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProfileResource;
use App\Http\Requests\StoreUpdateProfileFormRequest;
use App\Services\ProfileService;

class ProfileController extends Controller
{
    
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = $this->profileService->getProfileService();
        return ProfileResource::collection($profiles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateProfileFormRequest $request)
    {
       return $this->profileService->storeProfileService($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profile = $this->profileService->getprofileByIdService($id);
        return new ProfileResource($profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateProfileFormRequest $request, string $id)
    {
        $profile = $this->profileService->updateprofileByIdService($request->all(), $id);
        return new profileResource($profile);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->profileService->deleteprofileByIdService($id);
    }
}
