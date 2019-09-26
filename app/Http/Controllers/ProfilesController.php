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
            'image' => '',
        ]);
        
/*        if(request('image'))
        {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $arrayImg = [ 'image' => $imagePath ];
        }*/
        

        if(request('image'))
        {
            
            request('image')["pathname"];die;
            dd(request());
            $imagePath = request('image')->store('profile', 'public');

            print_r($imagePath);die;
            print_r(public_path("storage/{$imagePath}"));
            print_r(file_get_contents(public_path("storage/{$imagePath}")));die;
            
            
            //Image::make(file_get_contents())->save($path);

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $arrayImg = [ 'image' => $imagePath ];
        }

        auth()->user()->profile->update(array_merge(
            $data, 
            $arrayImg ?? [],
        ));
        
        return redirect("/profile/{$user->id}");
    }
}
