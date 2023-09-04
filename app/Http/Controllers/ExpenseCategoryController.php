<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseCategoryController extends Controller
{
    protected $expense_category;
     function __construct(ExpenseCategory $expense_category) {
        $this->expense_category = $expense_category;
    }
    public function index(Request $request)
    {
        if($request->ajax())
            return $this->expense_category->getExpenseCategories($request);
        return view('expense_categories.index');
    }

    public function create(Request $request)
    {
        # code...
    }
    public function categories(Request $request)
    {

        $expense_category = $this->expense_category->where('company_id', auth()->user()->current_company);
        if(auth()->user()->type=='main') {
            $zone_id = DB::table('zones')->where('name','CENTRAL')->first()->id;
            $admin_zone = DB::table('provinces')->where('zone_id',$zone_id)->pluck('id');
            $expense_category= $expense_category->whereIn('location_id', $admin_zone);
        } else {

            $expense_category=  $expense_category->whereIn('location_id', json_decode(auth()->user()->location_id, true));
        }
        return $expense_category->get();
        // ->where('categories.user_type',auth()->user()->type)
    }

    public function store(Request $request)
    {
        $location_id = json_decode(auth()->user()->location_id,true)[0];
        if(auth()->user()->type=='main') {
            $zone_id = DB::table('zones')->where('name','CENTRAL')->first()->id;
            $location_id = DB::table('provinces')->where('zone_id',$zone_id)->first()->id;
        }

       $data = [
           'name'                   => $request->name,
           'description'            => $request->description,
           'company_id'             => auth()->user()->current_company,
            'location_id'           => $location_id,
       ];
       $this->expense_category->create($data);
    }

    public function edit($id)
    {
        // return $id;
        return $this->expense_category->find($id);
    }

    public function update(Request $request, $id)
    {
        $expense_category = $this->expense_category->find($id);
        $data = [
            'name'                   => $request->name,
            'description'            => $request->description,
        ];
        $expense_category->update($data);
    }

    public function destroy(Request $request, $id){

        $related_tables = ['expenses'];
        $count = 0;
        try {

            if(count($request->ids) > 0){

                $categories = $this->expense_category->whereIn('id', $request->ids)->get();
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
                $category = $this->expense_category->find($id);

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
