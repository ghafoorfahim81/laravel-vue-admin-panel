<div class="mb-2">
    <button class="btn btn-success btn-sm waves-effect waves-light" data-toggle="collapse"
            href="#collapseExample" role="button"
            aria-expanded="false" aria-controls="collapseExample">Add payment <i
            class="fas fa-plus-circle"></i></button>
</div>
<div class="collapse" id="collapseExample">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="header-title">Add Payment </h4>
                <div>
                    <span class="font-weight-bold text-xl">Grand Total</span>
                    <span
                        class="font-weight-bold text-xl text-end">@{{grandTotal}}</span>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="form-group">
                    <label for="">@lang('lang.date')
                    </label>
                    <input type="date" name="date"
                           class="form-control" id="email"
                           v-model="paymentForm.date"
                           v-validate="'required'" data-vv-as="@lang('lang.date')"
                           placeholder="@lang('lang.date')" autocomplete="new-email">

                </div>
            </div>
            <div class="col-xl-12">
                <div class="table-responsive rounded-sm shadow-4 ">
                    <table class="table mb-0 ">
                        <thead class="bg-light-blue-7 text-white">
                        <tr>
                            <th>@lang('lang.no_of_receipant')</th>
                            <th class="p-2">@lang('lang.amount')</th>
                            <th class="p-2">@lang('lang.total')</th>
                            <th class="p-2"><i class="far fa-trash-alt" style="color:red"></i>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item, index) in payment_items">
                            <td class="p-0 border-right align-middle">
                                <input type="number"
                                       class="form-control border border-white"
                                       @click="addPaymentRow(index)"
                                       @focus="$event.target.select()"
                                       v-model="
                                                               item.item.quantity" name="quantity[]">
                            </td>
                            <td class="p-0 border-right align-middle">
                                <input type="number" @focus="$event.target.select()"
                                       class="form-control border border-white" v-model="
                                                                    item.item.amount
                                                               " name="amount[]">
                            </td>

                            <td class="p-0 border-right align-middle">
                                @{{getItemTotal(
                                item.item
                                )}}
                            </td>
                            <td class="p-0 border-right align-middle text-center"><i
                                    class="far fa-trash-alt" style="color:red"
                                    v-on:click="deletePayment(index)"></i></td>
                        </tr>
                        <input type="hidden" name="project_id" value="{{$project->id}}">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card-footer text-right pr-0 bg-white">
                        <button class="btn btn-info" type="button" @click="savePayment">
                            <span class="ml-2">Save Payment</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
