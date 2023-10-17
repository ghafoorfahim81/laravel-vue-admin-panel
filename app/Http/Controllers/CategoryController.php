<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    protected $category;
     function __construct(Category $category) {
        $this->category = $category;
    }
    public function index(Request $request)
    {
        if($request->ajax())
            return $this->category->getCategories($request);
        return view('backend.categories.index');
    }

    public function create(Request $request)
    {
        # code...
    }
    public function categories(Request $request)
    {

        $category = $this->category->where('company_id', auth()->user()->current_company);
        if(auth()->user()->type=='main') {
            $zone_id = DB::table('zones')->where('name','CENTRAL')->first()->id;
            $admin_zone = DB::table('provinces')->where('zone_id',$zone_id)->pluck('id');
            $category= $category->whereIn('location_id', $admin_zone);
        } else {

            $category=  $category->whereIn('location_id', json_decode(auth()->user()->location_id, true));
        }
        return $category->get();
        // ->where('categories.user_type',auth()->user()->type)
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $image =null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image = time() . '.' . $image->getClientOriginalExtension();

                // Upload the original image to the "product" folder
                $originalPath = 'categories/' . $image;
                Storage::disk('public')->put($originalPath, file_get_contents($image));

                // Create a copy of the original image and resize it to 400x600 pixels
                $resizedImage = Image::make(storage_path('app/public/' . $originalPath))
                    ->resize(445, 450);

                // Save the resized image to the "best_seller" folder
                $bestSellerPath = 'categories/thumbnail/' . $image;
                Storage::disk('public')->put($bestSellerPath, $resizedImage->encode());

                // Create a copy of the original image and resize it to 317x317 pixels
                $resizedImage = Image::make(storage_path('app/public/' . $originalPath))
                    ->resize(120, 120);

                // Save the resized image to the "best_seller" folder
                $bestSellerPath = 'categories/trending/' . $image;
                Storage::disk('public')->put($bestSellerPath, $resizedImage->encode());

                // You can also save the original image path to your database or perform any additional tasks here
            }
            $this->category->create([
                'name'  => $request->name,
                'description' => $request->description,
                'parent_id' => $request->parent_id,
                'image' => $image
            ]);

            DB::commit();
            return response()->json(['status' => 201,'message'=> 'Category created successfully',
            ]);
        } catch (\Exception $e) {
            DB::rollback();

            if ($e instanceof ValidationException) {
                return response()->json(['errors' => $e->errors()], 422);
            }

            return response()->json(['message' => 'Category creation failed'], 500);
        }
    }


    public function edit($id)
    {
        return $this->category->find($id);
    }

    public function update(Request $request, $id)
    {
        $category = $this->category->find($id);
        $data = [
            'name'                   => $request->name,
            'description'            => $request->description,
        ];
        $category->update($data);
    }

    public function destroy(Request $request, $id){

        $related_tables = ['expenses'];
        $count = 0;
        try {

            if(count($request->ids) > 0){

                $categories = $this->category->whereIn('id', $request->ids)->get();
                DB::beginTransaction();

                foreach ($categories as $key => $value) {

                    if(checkForDelete($related_tables, 'category_id', $value->id) == false){

                        // $this->crd->where('currency_id', $value->id)->delete();
                        deleteRecord('categories', 'id', $value->id);
                    }else {
                        $count += 1;
                    }

                }
                DB::commit();
                if($count > 0){
                    return ['result' => 0, 'message' => 'First Delete Related Data'];
                } else {

                    return ['result' => 1, 'message' => __('message.success')];
                }
            } else {
                // DB::beginTransaction();
                $category = $this->category->find($id);

                    if(checkForDelete($related_tables, 'category_id', $id) == false){

                        // $this->crd->where('currency_id', $id)->delete();
                        deleteRecord('categories', 'id', $id);
                        return ['result' => 1, 'message' => __('message.success')];
                    }
                // DB::commit();
            }

            return ['result' => 0, 'message' => 'First Delete Related Data'];
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => __('message.error')], 422);
        }

    }
}
