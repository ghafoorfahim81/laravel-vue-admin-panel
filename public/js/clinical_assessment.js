$(document).ready(function(){

    //Adding more items

    $('.addOther1').click(function(e){
        $('.addInput1').append('<input type="text" class="form-control rounded-pill mt-2" id="exampleInputEmail1" name="epilepsy_symptoms[]" aria-describedby="emailHelp" placeholder="Add another">');
        e.preventDefault();
    })
    $('.addOther2').click(function(e){
        $('.addInput2').append('<input type="text" class="form-control rounded-pill mt-2" id="exampleInputEmail1" name="distress_reasons[]" aria-describedby="emailHelp" placeholder="Add another">');
        e.preventDefault();
    })
    $('.addOther3').click(function(e){
        $('.addOther3').before('<input type="text" class="form-control rounded-pill mt-2 d-inline" id="exampleInputEmail1" name="priorities[]"  aria-describedby="emailHelp" placeholder="Add another">');
        e.preventDefault();
    })
    $('.addOtherForDD').click(function(e){
        $('.addInputDD').append('<input type="text" class="form-control rounded-pill mt-2 d-inline" id="" name="diff_diagnosis[]"  aria-describedby="emailHelp" placeholder="Add another">');
        e.preventDefault();
    })

    $('.addOtherForMajor').click(function(e){
        $('.major-symptom-area').append('<input type="text" class="form-control rounded-pill mt-2 d-inline" id="" name="major_symptoms[]"  aria-describedby="emailHelp" placeholder="Add another">');
        e.preventDefault();
    })
    //arrow icon rotate animation

    $('.cus-btn1').click(function(){
        $('.cus-icon1').toggleClass('active-arrow')
    })

    $('.cus-btn2').click(function(){
        $('.cus-icon2').toggleClass('active-arrow')
    })

    $('.cus-btn3').click(function(){
        $('.cus-icon3').toggleClass('active-arrow')
    })

    // show & close input for thoughts or a plan to end your life details

    $('.plan2end1').click(function(e){
        $('.plan2end-info').removeClass('d-none');
        $('.description_lable').removeClass('d-none');
        $('.related-from-groups').removeClass('d-none');
    })
    $('.date_based').click(function(e){
        $('.date-input').removeClass('d-none');
        $('.text-input').addClass('d-none');

    })
    $('.other_based_select').click(function(e){
        $('.text-input').removeClass('d-none');
        $('.date-input').addClass('d-none');

    })

    $('.plan2end2').click(function(e){
        $('.plan2end-info').addClass('d-none')
        $('.related-from-groups').addClass('d-none');

    })

    // show & close input for plan to end life in next two week

    $('.planWeek1').click(function(e){
        $('.planWeek').removeClass('d-none')
    })

    $('.planWeek2').click(function(e){
        $('.planWeek').addClass('d-none')

    })

    $('.planWeek3').click(function(e){
        $('.planWeek').removeClass('d-none')

    })

    // show & close input for mental health

    $('.mentalhealth1').click(function(e){
        $('.mentalhealth').removeClass('d-none')
    })

    $('.mentalhealth2').click(function(e){
        $('.mentalhealth').addClass('d-none')

    })



});

