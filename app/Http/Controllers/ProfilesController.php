<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {

        $follows = false;

        if(auth()->user()){
            $follows = auth()->user()->following->contains($user->id);
        }
      
        return view('profiles.index', compact('user', 'follows'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'sometimes|nullable|url',
            'image64' => 'sometimes|nullable|image',
        ]);

        if(request('image'))
        {
            $image64 = base64_encode(file_get_contents(request('image')->path()));
          
            $arrayImg = [ 'image64' => $image64 ];
        }

        auth()->user()->profile->update(array_merge(
            $data, 
            $arrayImg ?? [],
        ));
        
        return redirect("/profile/{$user->id}");
    }
}
