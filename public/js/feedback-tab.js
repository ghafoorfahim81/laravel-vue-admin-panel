$(document).ready(function() {
    $('.addForTer').click(function(e) {
        $('#add_other_termination').append(`
            <div class="col-md-6 mt-2">
                <input type="text" class="form-control form-control rounded-pill"  id=""<input type="text" name="terminateQuestion[]" class="form-control rounded-pill mt-2" placeholder="Add Termination" >
            </div>
        `);

        e.preventDefault();
    });

    $('.addForEva').click(function(e) {
        $('#add_other_evaluation').append(`
            <div class="col-md-6 mt-2">
                <input type="text" class="form-control form-control rounded-pill"  id=""<input type="text" name="evaluation_name[]" class="form-control rounded-pill mt-2" placeholder="Add Evaluation" >
            </div>
        `);
        e.preventDefault();
    });

    $('.rate-num > div').click(function(e) {


        let allOption = $('.rate-num > div');
        let currentOption = e.target;

        for (let i = 0; i < allOption.length; i++) {
            if (!allOption[i].classList.contains('selected-rate')) {
                currentOption.classList.add("selected-rate");
            } else {
                allOption[i].classList.remove('selected-rate');
                currentOption.classList.add("selected-rate");
            }
        }


    });
    $('#addEvaluationInput').click(() => {
        $('#custom-evaluate').append(
            `
            <div class="col-md-4 mt-1">
             <div class="form-group">
                 <input type="text" name="evlQuestion[]" class="form-control" placeholder="Add Evaluation" >
             </div>
             </div>
            `
        );
    });


    $('#addTerminationInput').click(() => {
        $('#custom-terminate').append(
            `
             <div class="col-md-4 mt-1">
              <div class="form-group">
                  <input type="text" name="terminateQuestion[]" class="form-control" placeholder="Add Termination" >
              </div>
              </div>
         `
        );
    });
});





function submitTermination(){
    //alert(888);
    var form_data = $('#terminationForm').serialize();
    var path = "/insert_termination";
    $.ajax({
        data: form_data,
        method: "post",
        url: path,
        success: function(data) {
            toastSuccess('Termaintion Successfully added');

            $('#termination').modal('hide');
            //$('#terminationForm')[0].reset();
            let terminate_array = JSON.parse(data.terminations);
            let htmldata = '';
            for (let index = 0; index < terminate_array.length; index++) {
                if(terminate_array[index] == null){
                    htmldata= htmldata;
                }
                else{
                    htmldata = htmldata +
                        `
                    <div class="col-md-12">
                        <div class="form-check">
                            <label class="form-check-label" ><i class="fas fa-check-circle"  style="color:blue"></i>
                            ${terminate_array[index]}</label>
                        </div>
                    </div>`;
                }
            }
            $('#termination_show').html(htmldata);
            if ($.isEmptyObject(data.error)) {} else if (!$.isEmptyObject(data.error)) {
                $.each(data.error, function(key, value) {
                    alertify.error(value);
                });
            }
        },
        error: function(err) {}
    });
}
function submitEvaluations(){

    var form_data = $('#evaluationForm').serialize();
    var path = "insert_evaluation";
    $.ajax({
        data: form_data,
        method: "post",
        url: '/insert_evaluation',
        success: function(data) {
            toastSuccess('Evaluatuation Successfully added');
            $('#evaluation').modal('hide');
           // $('#evaluationForm')[0].reset();
            let evalate_array = JSON.parse(data.evaluation);
            let htmldata = '';
            for (let index = 0; index < evalate_array.length; index++) {
                if(evalate_array[index] == null){
                    htmldata= htmldata;
                }else{
                    htmldata = htmldata +
                        `
                    <div class="col-md-12">
                        <div class="form-check">
                            <label class="form-check-label" ><i class="fas fa-check-circle"  style="color:blue"></i>
                            ${evalate_array[index]}</label>
                        </div>
                    </div>`;
                }
            }
            $('#evaluation_show').html(htmldata);
            if ($.isEmptyObject(data.error)) {} else if (!$.isEmptyObject(data.error)) {
                $.each(data.error, function(key, value) {
                    alertify.error(value);
                });
            }
        },
        error: function(err) {}
    });
}


function getValue(value) {
    var form_data = $('#satisfactionForm').serialize();
    var value = value;
    var client_id = $('#client_id').val();
    $.ajax({
        data: form_data,
        url:"/insert_satisfaction/" + value + '/' + client_id,
        method: "get",
        success: function(data) {
            if (data.error) {
                alertify.error("Please Write your reason first");
            }else{
                
                toastSuccess('satisfaction Servey Successfully added');
                $('#satisfaction').modal('hide');
             
                let satisfaction = data.satisfaction_data;
                let satisfaction_servey = data.satisfaction_reason;
                for (let index = 1; index <= 5; index++) {
                    $('#emoje-' + index).css("color", "black");
                }
                $('#emoje-' + satisfaction).css("color", "green");
                $('#reason').text(satisfaction_servey);
            }

          
        },
        error: function(err) {}
    });
}


