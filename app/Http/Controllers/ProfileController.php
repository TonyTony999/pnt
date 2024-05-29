<?php

namespace App\Http\Controllers;

use App\Http\Requests\BioUpdateRequest;
use App\Models\Buyer;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show(User $user)
    {

        //$user=$request->user();
        //dd($user);
        return view("profile.show", ["user" => $user]);
    }

    public function edit(User $user): View
    {

        if ($user->user_type === "seller") {
            return view('profile.seller-edit', ['user' => $user]);
        }

        return view('profile.buyer-edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        Gate::authorize("update", $user);

        $validated = $request->validate([

            'bio' => 'required|min:5|max:3000',
            'image' => 'image',
        ]);

        $validated['age'] = request()->get("age") ? (int)request()->get("age") : null;
        $validated['height'] = request()->get("height") ? (int)request()->get("height") : null;
        $validated['weight'] = request()->get("weight") ? (int)request()->get("weight") : null;


        if (request()->has("image")) {

            $imagePath = $request->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
            Storage::disk('public')->delete($user->image ?? '');
        }

        if ($user->user_type === "seller") {
            $seller = Seller::find($user->id);

            $validated['sexually_active'] = request()->get("sexually_active") ? request()->get("sexually_active") : null;
            $validated['sex_frequency'] = request()->get("sex_frequency") ? request()->get("sex_frequency") : null;
            $validated['birth_control'] = request()->get("birth_control") ? request()->get("birth_control") : null;
            $validated['anal_sex'] = request()->get("anal_sex") ? request()->get("anal_sex") : null;

            $seller->update($validated);
        } elseif ($user->user_type === "buyer") {
            $buyer = Buyer::where("user_id", $user->id)->firstOrFail();

            $buyer->update($validated);

            //dump($buyer);
        }







        // $validated = $request->validated();



        //$user->update($validated);



        //$user->name=request()->get("name");
       // $user->bio=request()->get("bio");
       // $user->save();


        // return redirect("/")->with("success", "idea updated!");
        return redirect()->route("profile.show", $user->id)->with("success", "bio updated!");
    }

    public function test(User $user)
    {
        //$buyer = Buyer::where("user_id",2)->get();
        $buyer = Buyer::where("user_id", $user->id)->firstOrFail();
        //$buyer=Buyer::find(1);
        $buyer->age=20;
        $buyer->save();
        //$buyer = Buyer::find(1);
        //$seller = Seller::find($user->id);

        //dd($user->id);
        dd($buyer);
    }
}
