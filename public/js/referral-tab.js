$(document).ready(function () {
    // alert('hello seprate');
    // $('#concern-reason-input').hide();
    $('#consent-check-no').click(function () {
        $('#consent-reason').prop('hidden', false);
    });
    $('#consent-check-yes').click(function () {
        $('#consent-reason').prop('hidden', true);
    });
    //add other language for client:
    $('#other-lang').change(function () {
        if ($('#other-lang').is(':checked')) {
            $('.other-lang-input').append(`
                        <div class="input-group mb-3 other-input">
                             <input type="text" class="form-control rounded-pill"
                                 placeholder="Specify your lang"
                                 aria-label="Specify language"
                                 name="cgLanguage[]"
                                 aria-describedby="button-addon2">
                         </div>
                    `);
        }
        if ($('#other-lang').is(":checked") == false) {
            $('.other-input').remove();
        }
    });
    $('#concern-no-check').click(function () {
        $('#concern-reason-input').prop('hidden', false);
    });
    $('#concern-yes-check').click(function () {
        $('#concern-reason-input').prop('hidden', true);
    });
    //add input for minor other language
    $('#minor-other-lang').change(function () {
        if ($('#minor-other-lang').is(':checked')) {
            $('.minor-other-lang-input').append(`
                    <div class="input-group mb-3 minor-other-input">
                        <input type="text" class="form-control rounded-pill"
                            placeholder="Specify your lang"
                            aria-label="Specify language"
                            name="cgLanguage[]"
                            aria-describedby="button-addon2">
                    </div>
                `);
        }
        if ($('#minor-other-lang').is(":checked") == false) {
            $('.minor-other-input').remove();
        }
    });
    $('#otherRelative').click(function () {
        $('#other-relative').prop('hidden', false);
        // $('input=[name="relationWithClient"]')
    });
    //add other reason input:
    $('#no-radio').click(function () {
        $('#no-reason-input').prop('hidden', false);
    });
    $('#yes-radio').click(function () {
        $('#no-reason-input').prop('hidden', true);
    });
    $('#btn-add-other-services').click(() => {
        $('#other-service-inputs').append(`
        <div class="col-md-4 mt-2">
         <input type="text" name="requestedServices[]" placeholder="Service name" class="form-control rounded-pill other-servicesInput">
        </div>
                 `);
    });
    $('input[name="relationWithClient"]').click(function () {
        $('#other-relative').val('');
        $('#other-relative').prop('hidden', true);
    });
}); // End document ready
//Edit & insert refferal data:
function showInputsForEdit(param) {
    $('#btn-edit-refferal').hide();
    $('#save-refferal').prop('hidden', param);
    $('.concern-div').prop('hidden', param);
    $('#concern-reason-input').prop('hidden', param);
    $('.lang-after-edite').prop('hidden', !param);
    $('.caregiver-gender-radios').prop('hidden', param);
    $('.want-tobe-referred-checkboxes').prop('hidden', param);
    $('#confrim-first-input').prop('hidden', param);
    $('#confirm-additional-support-input').prop('hidden', param);
    $('.confirm-first-question-text').prop('hidden', !param);
    $('.confirm-first-question').addClass('d-none');

    $('#relative').prop('hidden', param);
    $('.relative-span').prop('hidden', !param);
    $('#case-no').prop('hidden', param);
    $('.case-no-text').prop('hidden', !param);
    $('.read-note').prop('hidden', param);
    $('.read-note-icon').prop('hidden', !param);
    $('#refferal-date').prop('hidden', param);
    $('.refferal-date-text').hide();
    $('#consent-reason-input').prop('hidden', param);
    $('.hasconsent-result-text').prop('hidden', !param);
    $('.noconsent-result-text').prop('hidden', !param);
    $('.referral-type-text').prop('hidden', !param);
    $('#reffered-by-name').prop('hidden', param);
    $('#reffered-by-agency').prop('hidden', param);
    $('#reffered-by-positioin').prop('hidden', param);
    $('#reffered-by-address').prop('hidden', param);
    $('#reffered-by-position').prop('hidden', param);
    $('#reffered-by-email').prop('hidden', param);
    $('#reffered-by-phone').prop('hidden', param);
    $('.reffered-by-name-text').prop('hidden', !param);
    $('.reffered-by-agency-text').prop('hidden', !param);
    $('.reffered-by-email-text').prop('hidden', !param);
    $('.reffered-by-position-text').prop('hidden', !param);
    $('.reffered-by-phone-text').prop('hidden', !param);
    $('.reffered-by-address-text').prop('hidden', !param);
    $('#reffered-to-name').prop('hidden', param);
    $('#reffered-to-agency').prop('hidden', param);
    $('#reffered-to-position').prop('hidden', param);
    $('#reffered-to-email').prop('hidden', param);
    $('#reffered-to-address').prop('hidden', param);
    $('#reffered-to-phone').prop('hidden', param);
    $('.reffered-to-name-text').prop('hidden', !param);
    $('.reffered-to-agency-text').prop('hidden', !param);
    $('.reffered-to-position-text').prop('hidden', !param);
    $('.reffered-to-email-text').prop('hidden', !param);
    $('.reffered-to-phone-text').prop('hidden', !param);
    $('.reffered-to-address-text').prop('hidden', !param);
    $('.caregiver-name-text').prop('hidden', !param);
    $('.caregiver-last-name-text').prop('hidden', !param);
    $('.caregiver-age-text').prop('hidden', !param);
    $('#caregiver-date-of-birth-input').prop('hidden', param);
    $('.caregiver-other-phone-text').prop('hidden', !param);
    $('.caregiver-age-text').prop('hidden', !param);
    $('.caregiver-id-card-text').prop('hidden', !param);
    $('.caregiver-current-address-text').prop('hidden', !param);
    $('#caregiver-name-input').prop('hidden', param);
    $('#caregiver-last-name-input').prop('hidden', param);
    $('#caregiver-current-address-input').prop('hidden', param);
    $('#caregiver-id-card-input').prop('hidden', param);
    $('#caregiver-other-phone-input').prop('hidden', param);
    $('#caregiver-age-input').prop('hidden', param);
    $('#caregiver-relation-radios').prop('hidden', param);
    $('#reason-for-refferal-text').prop('hidden', param);
    $('#self-harm-input').prop('hidden', param);
    $('#self-harm-text').prop('hidden', !param);
    $('#reason-for-referral-input').prop('hidden', param);
    $('.reason-for-referral-text').prop('hidden', !param);
    $('.suicide-text').prop('hidden', !param);
    $('#suicide-input').prop('hidden', param);
    $('.potential-text').prop('hidden', !param);
    $('#potential-input').prop('hidden', param);
    $('.expected-outcome-text').prop('hidden', !param);
    $('#expected-outcome').prop('hidden', param);
    $('#relativeRadio').prop('hidden', param);
    $('#caregiver-language').prop('hidden', param);
    $('#caregiver-gender-text').prop('hidden', !param);
    $('#caregiver-gender-radio').prop('hidden', param);
    $('#has-consent').prop('hidden', param);
    $('.has-consent').prop('hidden', param);
    $('.want-tobe-referred').prop('hidden', param);
    $('.have-concern-radio').prop('hidden', param);
    $('#provider-accept-radios').prop('hidden', param);
    $('.referral-type-radio').prop('hidden', param);
    $('.personal-first-name').prop('hidden', !param);
    $('#personal-first-name-input').prop('hidden', param);
    $('.personal-age').prop('hidden', !param);
    $('#personal-age-input').prop('hidden', param);
    $('.personal-nic').prop('hidden', !param);
    $('#personal-nic-input').prop('hidden', param);
    $('.personal-current-address').prop('hidden', !param);
    $('#personal-current-address-input').prop('hidden', param);
    $('.personal-last-name').prop('hidden', !param);
    $('#personal-last-name-input').prop('hidden', param);
    $('.personal-gender-text').prop('hidden', !param);
    $('.client-gender').prop('hidden', param);
    $('.personal-lang').prop('hidden', !param);
    $('#client-lang-input').prop('hidden', param);
    $('.personal-tel').prop('hidden', !param);
    $('#client-tel-input').prop('hidden', param);
    $('.requested-services-list').prop('hidden', !param);
    $('#requested-services-radios').prop('hidden', param);
    $('.other-services-input').prop('hidden', param);
    // $('#other-relative').prop('hidden', param);
}
//save refferal data
var REQUESTED_SERVICES = [];
function serviceData(servicId) {
    $('.services-' + servicId).each(function () {
        if ($(this).is(':checked')) {
            REQUESTED_SERVICES.push($(this).val());
        }
    });
}

function uncheckedRelativeRadios() {
    $('input[name="relationWithClient"]').prop('checked', false);
    // $('input[name="relationWithClient"]').val('');
}
