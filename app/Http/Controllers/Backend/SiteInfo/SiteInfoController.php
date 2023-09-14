<?php

namespace App\Http\Controllers\Backend\SiteInfo;

use App\Http\Controllers\Controller;
use App\Models\SiteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use function App\Http\Controllers\create;

class SiteInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siteInfo  = SiteInfo::first();
//        dd($siteInfo);
        return view('backend.site-info.create',compact('siteInfo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siteInfo = SiteInfo::first();
//        dd($request->all());
        $filename =null;
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Upload the original image to the "product" folder
            $originalPath = 'logo/' . $filename;
            Storage::disk('public')->put($originalPath, file_get_contents($image));

            // You can also save the original image path to your database or perform any additional tasks here
        }
        if ($siteInfo) {
            // If a record exists, update it
            $siteInfo->update([
                'title' => $request->title,
                'slogan' => $request->slogan,
                'logo' => $filename,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'contact_number' => $request->contact_number,
                'youtube' => $request->youtube,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'tiktok' => $request->tiktok,
                'whatsapp' => $request->whatsapp,
                'wechat' => $request->wechat,
                'telegram' => $request->telegram,
                'snapchat' => $request->snapchat,
                'pinterest' => $request->pinterest,
                'reddit' => $request->reddit,
                'quora' => $request->quora,
                'twitch' => $request->twitch,
                'tumblr' => $request->tumblr,
                'address' => $request->address,
                'description' => $request->description,
            ]);
        } else {
            // If no record exists, create a new one
            $siteInfo = SiteInfo::create([
                'title' => $request->title,
                'contact_number' => $request->contact_number,
                'slogan' => $request->slogan,
                'logo' => $request->logo,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'youtube' => $request->youtube,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'tiktok' => $request->tiktok,
                'whatsapp' => $request->whatsapp,
                'wechat' => $request->wechat,
                'telegram' => $request->telegram,
                'snapchat' => $request->snapchat,
                'pinterest' => $request->pinterest,
                'reddit' => $request->reddit,
                'quora' => $request->quora,
                'twitch' => $request->twitch,
                'tumblr' => $request->tumblr,
                'address' => $request->address,
                'description' => $request->description,
            ]);
        }

        if($siteInfo){
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
