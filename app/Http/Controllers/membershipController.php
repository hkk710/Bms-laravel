<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Membership;
use Session;
use Image;

class membershipController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('membership.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'name'            => 'required|max:255',
                'department'      => 'required|max:255',
                'religion'        => 'required|max:255',
                'caste'           => 'required|max:255',
                'address'         => 'required|max:255',
                'profile_picture' => 'sometimes|image'
            ]);

        $mb = new Membership;
        $mb->name = $request->name;
        $mb->gender = $request->gender;
        $mb->department = $request->department;
        $mb->religion = $request->religion;
        $mb->caste = $request->caste;
        $mb->address = $request->address;
        if ($request->hasFile('profile_picture')) {
          $image = $request->file('profile_picture');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/profile/' . $filename);
          Image::make($image)->resize(800, 600)->save($location);
          $mb->profile_picture = 'images/profile/' . $filename;
        }
        else if ($request->gender == 'male') {
            $mb->profile_picture = 'images/profile/1.png';
        }
        else if ($request->gender == 'female') {
             $mb->profile_picture = 'images/profile/2.png';
        }
        $mb->save();

        Session::flash('success', 'You have been registerd');
        return redirect()->route('membership.show', $mb->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mb = Membership::find($id);
        return view('membership.show')->withMb($mb);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mb = Membership::find($id);
        return view('membership.edit')->withMb($mb);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'name'            => 'required|max:255',
                'department'      => 'required|max:255',
                'religion'        => 'required|max:255',
                'caste'           => 'required|max:255',
                'address'         => 'required|max:255',
                'profile_picture' => 'sometimes|image',
            ]);

        $mb = Membership::find($id);
        $mb->name = $request->name;
        $mb->gender = $request->gender;
        $mb->department = $request->department;
        $mb->religion = $request->religion;
        $mb->caste = $request->caste;
        $mb->address = $request->address;
        
        if ($request->hasFile('profile_picture')) {
          $image = $request->file('profile_picture');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/profile/' . $filename);
          Image::make($image)->resize(800, 600)->save($location);
          $mb->profile_picture = 'images/profile/' . $filename;
        }
        else if ($mb->profile_picture == 'images/profile/1.png' || $mb->profile_picture == 'images/profile/2.png') {
            if ($request->gender == 'male') {
                $mb->profile_picture = 'images/profile/1.png';
            }
            else if ($request->gender == 'female') {
                $mb->profile_picture = 'images/profile/2.png';
            }
        }
        
        $mb->save();

        Session::flash('success', 'You have been registerd');
        return redirect()->route('membership.show', $mb->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mb = Membership::find($id);
        $mb->delete();

        Session::flash('success', 'This member was successfully deleted');
        return redirect('/exist/membership');
    }
    public function exist() {
        $mbs = Membership::paginate(10);
        return view('membership.exist')->withMbs($mbs);
    }
    public function delete($id) {
        $mb = Membership::find($id);
        return view('membership.delete')->withMb($mb);
    }
}
