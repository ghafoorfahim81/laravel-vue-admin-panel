@extends('layouts.master')
@section('title', 'Categories Management')
@section('css')
<style>

    .badge-delete:hover{
        cursor: pointer;
        background-color: rgb(228, 121, 121);
    }



    .category-title{

        font-size: 1.2em;
        font-weight: bold;
    }

</style>
@endsection
@section('content')

    <!-- end page title end breadcrumb -->
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <span class="font-weight-bolder category-title"> Symptoms</span>
                            <span onclick="OnSymptomAdd()" class="float-right" style="cursor: pointer" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus"></i></span>
                        </div>
                        <div class="card-body" id="symptom">
                            @foreach($symptoms as $symptom)
                                <span id="sym-{{$symptom->id}}" data-toggle="modal" data-target=".delete-modal" class="badge badge-secondary badge-delete" onclick="deleteItem({{$symptom->id}},1)" ><i class="fa fa-times mr-2 times_items" onclick=""></i>{{$symptom->name}}</span>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <span class="category-title">Major Symptoms</span>
                            <span onclick="OnMajorSymptomAdd()" class="float-right" style="cursor: pointer" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus"></i></span>
                        </div>
                        <div class="card-body" id="major-symptom">
                            @foreach($majorSymptoms as $majorSymptom)
                                <span id="major-sym-{{$majorSymptom->id}}" data-toggle="modal" data-target=".delete-modal" class="badge badge-secondary badge-delete" onclick="deleteItem({{$majorSymptom->id}},2)" ><i class="fa fa-times mr-2 times_items" onclick=""></i>{{$majorSymptom->name}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start Row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <span class="category-title">Disabilities</span>
                            <span onclick="OnDisabilityAdd()" class="float-right" style="cursor: pointer" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus"></i></span>
                        </div>
                        <div class="card-body" id="disability">
                            @foreach($disabilities as $disability)
                                <span id="dis-{{$disability->id}}" data-toggle="modal" data-target=".delete-modal" class="badge badge-secondary badge-delete" onclick="deleteItem({{$disability->id}},3)" ><i class="fa fa-times mr-2 times_items" onclick=""></i>{{$disability->name}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- Start Row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <span class="category-title">Differential Diagnoses</span>
                            <span onclick="OnDiffDiagnoseAdd()" class="float-right" style="cursor: pointer" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus"></i></span>
                        </div>
                        <div class="card-body" id="diffDiagnose">
                            @foreach($diffDiagnoses as $diffDiagnose)
                                <span id="diff-{{$diffDiagnose->id}}" data-toggle="modal" data-target=".delete-modal" class="badge badge-secondary badge-delete" onclick="deleteItem({{$diffDiagnose->id}},4)" ><i class="fa fa-times mr-2 times_items" onclick=""></i>{{$diffDiagnose->name}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- Start Row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <span class="category-title">Reason of distress/problems</span>
                            <span onclick="OnDistressReasonAdd()" class="float-right" style="cursor: pointer" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus"></i></span>
                        </div>
                        <div class="card-body" id="distress-reason">
                            @foreach($distressReasons as $distressReason)
                                <span id="diss-{{$distressReason->id}}" data-toggle="modal" data-target=".delete-modal" class="badge badge-secondary badge-delete" onclick="deleteItem({{$distressReason->id}},5)" ><i class="fa fa-times mr-2 times_items" onclick=""></i>{{$distressReason->name}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- Start Row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <span class="category-title">Evaluations</span>
                            <span onclick="OnEvaluationAdd()" class="float-right" style="cursor: pointer" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus"></i></span>
                        </div>
                        <div class="card-body" id="evaluation">
                            @foreach($evaluations as $evaluation)
                                <span id="eval-{{$evaluation->id}}" data-toggle="modal" data-target=".delete-modal" class="badge badge-secondary badge-delete" onclick="deleteItem({{$evaluation->id}},6)" ><i class="fa fa-times mr-2 times_items" onclick=""></i>{{$evaluation->name}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- Start Row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <span class="category-title">Termination Reasons</span>
                            <span onclick="OnTerminationAdd()" class="float-right" style="cursor: pointer" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus"></i></span>
                        </div>
                        <div class="card-body" id="termination-reason">
                            @foreach($terminationReasons as $terminationReason)
                                <span id="term-{{$terminationReason->id}}" data-toggle="modal" data-target=".delete-modal" class="badge badge-secondary badge-delete" onclick="deleteItem({{$terminationReason->id}},7)" ><i class="fa fa-times mr-2 times_items" onclick=""></i>{{$terminationReason->name}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- Start Row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <span class="category-title">Epilepsy Symptoms</span>
                            <span onclick="OnEpilSymptomsAdd()" class="float-right" style="cursor: pointer" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus"></i></span>
                        </div>
                        <div class="card-body" id="epilepsy-symptoms">
                            @foreach($epilepsySymptoms as $epilepsySymptom)
                                <span id="epil-{{$epilepsySymptom->id}}" data-toggle="modal" data-target=".delete-modal" class="badge badge-secondary badge-delete" onclick="deleteItem({{$epilepsySymptom->id}},8)" ><i class="fa fa-times mr-2 times_items" onclick=""></i>{{$epilepsySymptom->name}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div id="parts-model" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="mySmallModalLabel">Add New Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control" name="" id="newItem" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-primary" onclick="SubmitNewItem()">Add</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            <!-- delete modal item -->
            <div id="deletemodal" class="modal fade delete-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="mySmallModalLabel">Are you sure you want to delete this item?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="submit"  data-dismiss="modal" class="btn btn-sm btn-secondary">NO</button>
                            <button type="submit" class="btn btn-sm btn-danger"  onclick="submitDelete()">YES</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </div>

    </div>

<!-- end container-fluid -->
@endsection
@section('js')
<script>
    $(document).ready(function(){
    })
    // 1 = symtoms, 2 = major symtom , 3= diabilities 4 = differential diagnosis, 5= reason of distress / problem 6= evaluation,  7= termination, 8 = epilepsy symptoms
    var whichAttrAdd= 0;
    var deleteItemId = 0;
    var deleteItemModel = 0;

    let OnSymptomAdd = () => whichAttrAdd = 1;
    let OnMajorSymptomAdd = () => whichAttrAdd = 2;
    let OnDisabilityAdd = () => whichAttrAdd = 3;
    let OnDiffDiagnoseAdd = () => whichAttrAdd = 4;
    let OnDistressReasonAdd = () => whichAttrAdd = 5;
    let OnEvaluationAdd = () => whichAttrAdd = 6;
    let OnTerminationAdd = () => whichAttrAdd = 7;
    let OnEpilSymptomsAdd = () => whichAttrAdd = 8;


    function SubmitNewItem() {
        let newItem = $('#newItem').val();

        if(newItem == ''){
            console.log('invalid values');
            return;
        }

        $('#newItem').val('');
        $('#parts-model').modal('hide');
        //console.log(newItem);
        $.ajaxSetup({headers: {'X-CSRF-TOKEN':'@php echo csrf_token() @endphp '}});
        $.ajax({
            url:"{{url('partial/symptom')}}",
            type:'post',
            data:{
                whichAttrAdd,
                newItem
            },
            success:function(response){
                console.log(response);
                //toastr.success('Order Purchased Successfully!');
                if(whichAttrAdd == 1 ){
                    $('#symptom').append(`
                        <span id='sym-${response.id}' data-toggle="modal" data-target=".delete-modal" class="badge badge-secondary badge-delete" onclick="deleteItem(${response.id},1)" ><i class="fa fa-times mr-2 times_items" onclick=""></i>${response.name}</span>
                    `);
                }
                if(whichAttrAdd == 2){
                    $('#major-symptom').append(`
                        <span id='major-sym-${response.id}' data-toggle="modal" data-target=".delete-modal" class="badge badge-secondary badge-delete" onclick="deleteItem(${response.id},2)" ><i class="fa fa-times mr-2 times_items" onclick=""></i>${response.name}</span>
                    `);
                }
                if(whichAttrAdd == 3){
                    $('#disability').append(`
                        <span id='dis-${response.id}' data-toggle="modal" data-target=".delete-modal" class="badge badge-secondary badge-delete" onclick="deleteItem(${response.id},3)" ><i class="fa fa-times mr-2 times_items" onclick=""></i>${response.name}</span>
                    `);
                }
                if(whichAttrAdd == 4){
                    $('#diffDiagnose').append(`
                        <span id='diff-${response.id}' data-toggle="modal" data-target=".delete-modal" class="badge badge-secondary badge-delete" onclick="deleteItem(${response.id},4)" ><i class="fa fa-times mr-2 times_items" onclick=""></i>${response.name}</span>
                    `);
                }
                if(whichAttrAdd == 5){
                    $('#distress-reason').append(`
                        <span id='diss-${response.id}' data-toggle="modal" data-target=".delete-modal" class="badge badge-secondary badge-delete" onclick="deleteItem(${response.id},5)" ><i class="fa fa-times mr-2 times_items" onclick=""></i>${response.name}</span>
                    `);
                }
                if(whichAttrAdd == 6){
                    $('#evaluation').append(`
                        <span id='eval-${response.id}' data-toggle="modal" data-target=".delete-modal" class="badge badge-secondary badge-delete" onclick="deleteItem(${response.id},6)" ><i class="fa fa-times mr-2 times_items" onclick=""></i>${response.name}</span>
                    `);
                }
                if(whichAttrAdd == 7){
                    $('#termination-reason').append(`
                        <span id='term-${response.id}' data-toggle="modal" data-target=".delete-modal" class="badge badge-secondary badge-delete" onclick="deleteItem(${response.id},7)" ><i class="fa fa-times mr-2 times_items" onclick=""></i>${response.name}</span>
                    `);
                }
                if(whichAttrAdd == 8){
                    $('#epilepsy-symptoms').append(`
                        <span id='epil-${response.id}' data-toggle="modal" data-target=".delete-modal" class="badge badge-secondary badge-delete" onclick="deleteItem(${response.id},8)" ><i class="fa fa-times mr-2 times_items" onclick=""></i>${response.name}</span>
                    `);
                }

            }
        });

      }


      function deleteItem(id,target){

          deleteItemId = id;
          deleteItemModel = target;
          console.log(deleteItemModel, deleteItemId);
         // $('.delete-model').modal('show');
      }

      function submitDelete(){
          console.log(deleteItemId);
        $('#deletemodal').modal('hide');
        $.ajaxSetup({headers: {'X-CSRF-TOKEN':'@php echo csrf_token() @endphp '}});
        $.ajax({
            url:"{{url('partial/symptom/del')}}",
            type:'post',
            data:{
                deleteItemModel,
                deleteItemId
            },
            success:function(response){
                console.log(response);
                //toastr.success('Order Purchased Successfully!');
                if(deleteItemModel == 1){
                    $('#sym-'+deleteItemId).remove();
                }
                else if(deleteItemModel == 2){
                    $('#major-sym-'+deleteItemId).remove();
                }
                else if(deleteItemModel == 3 ){
                    $('#dis-'+deleteItemId).remove();
                }
                else if(deleteItemModel == 4 ){
                    $('#diff-'+deleteItemId).remove();
                }
                else if(deleteItemModel == 5 ){
                    $('#diss-'+deleteItemId).remove();
                }
                else if(deleteItemModel == 6 ){
                    $('#eval-'+deleteItemId).remove();
                }
                else if(deleteItemModel == 7 ){
                    $('#term-'+deleteItemId).remove();
                }
                else if(deleteItemModel == 8 ){
                    $('#epil-'+deleteItemId).remove();
                }
            }
        });
      }

</script>
@endsection
