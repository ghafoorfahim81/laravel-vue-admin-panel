<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\CurrencyRate;
use App\Models\HomeCurrency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{
    protected $currency;
    protected $crd;
    protected $home_currency;


    public function __construct(Currency $currency,CurrencyRate $crd, HomeCurrency $home_currency)
    {
        $this->currency             = $currency;
        $this->crd                  = $crd;
        $this->home_currency        = $home_currency;
    }
    public function index(Request $request)
    {
        if($request->ajax())
            return $this->currency->getCurrencies($request);
        return view('currencies.index');
    }

    public function getCurrencies()
    {
        return DB::table('currency_lists')->get();
    }
    public function defaultCurrenies()
    {
        return DB::table('currencies')->get();
    }
    public function create()
    {
        // return view('currencies.create_currency');
    }
     
    public function store(Request $request)
    {
        // return $request->all();
       $data = [
           'name'          => $request->name,
           'code'          => $request->code,
           'symbol'        => $request->symbol,
           'flag'          => $request->flag,
           'format'        => $request->get('format'),
           'exchange_rate' => $request->exchange_rate,
           'company_id'    => auth()->user()->current_company

       ];
        // $x = Config::set('currencies.default','USD');
        // dd($x);
       $this->currency->create($data);
        // Artisan::call('currency:manage',['action' => 'add', 'currency' => $request->get('currency')]);
        // $currency=$this->currency->where('code',$request->get('currency'))->first();
        // if ($currency) {
        //     return['currency Message'=>$this->currency->where('code',$request->get('currency'))->first()];
        // }
    }
    public function rateIndex()
    {
        return view('currencies.rate');
    }
    public function editRate(Request $request)
    {
       return  $this->crd->getRates($request);   
    }
    public function getRate($id)
    {
        return $this->crd->getRate($id);
    }
    public function getOpeningCurrency(Request $request)
    {
        $home_currency = $this->home_currency->where('company_id', auth()->user()->current_company)->first();
        return ["currencies"=>$this->crd->currencyList(), 'home_currency'=>$home_currency];
    }
    public function update_rate(Request $request)
    {
        for ($i=0; $i < count($request->all()); $i++) {
            $this->crd->create([
                'currency_id'   =>$request->all()[$i]['id'],
                'date'   =>date_create(),
                'exchange_rate'   =>$request->all()[$i]['exchange_rate'],
                'company_id'      => auth()->user()->current_company
            ]);
            $currency = $this->currency->find($request->all()[$i]['id']);
            $currency->update(['exchange_rate'=>$request->all()[$i]['exchange_rate']]);
        }
    }

    public function destroy(Request $request, $id){

        $related_tables = ['invoices', 'orders', 'payments', 'receipt_details', 'accounts'];
        $count = 0;
        try {
            
            if(count($request->ids) > 0){

                $currencies = $this->currency->whereIn('id', $request->ids)->get();
                DB::beginTransaction();

                foreach ($currencies as $key => $value) {

                    if(checkForDelete($related_tables, 'currency', $value->code) == false){

                        $this->crd->where('currency_id', $value->id)->delete();
                        deleteRecord('currencies', 'id', $value->id);
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
                $currency = $this->currency->find($id);

                    if(checkForDelete($related_tables, 'currency', $currency->code) == false){

                        $this->crd->where('currency_id', $id)->delete();
                        deleteRecord('currencies', 'id', $id);
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
