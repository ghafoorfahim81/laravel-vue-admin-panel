
var aa = new window.Vue({
    el: '#app',
    data() {
        return {

            referral:{
                concernQuestion:false,
                concernTexarea:null,
                concernconfrim:false,
                readInformation:null,
                relative:null,
                referralType:false,
                haseconsent:null,
                consentReason:null,
                referredByName:null,
                referredByAgency:null,
                referredByPosition:null,
                referredByPhone:null,
                referredByEmail:null,
                referredByAddress:null,
                referredToName:null,
                referredToAgency:null,
                referredToPosition:null,
                referredToPhone:null,
                referredToEmail:null,
                referredToAddress:null,
                client_id:null,
                cFirstName:null,
                cAge:null,
                cIdCard:null,
                cAddress:null,
                cLastName:null,
                cGender:false,
                cgGender:false,
                requestedServices:false,
                relationWithClient:false,
                doesProviderAccept:false,
                cLang:null,
                cPhone:null,
                cgFirstName:null,
                cgDob:null,
                cgAge:null,
                cgIdCard:null,
                cgAddress:null,
                cgLastName:null,
                cgLanguage:null,
                minor_other_lang:null,
                cgPhone:null,
                otherRelative:null,
                reasonForReferral:null,
                selfHarm:null,
                suicide:null,
                potential:null,
                expected_outcome:null,
                noReason:null

            },
            //    idd   :1,
            Data: {},
            idd: null,
            disabilities: [],
            referral_type: [],
            flag: false,
            checked: false,

    }
    },
    mounted: function() {
    },
    computed: {
    },
    methods: {

        edit()
        {
            console.log('edi clicked');
        },
        saveResult() {
            Swal.fire({
                title: 'Are you sure to complete session?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add it it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post("{{ url('updateSession') }}", this.result)
                        .then((res) => {
                            this.completed_sessions = [];
                            this.getCompletedSession();
                            this.getWaitingSession();
                            this.result.what_action_taken = '';
                            this.result.what_discussed = '';
                            this.result.next_plan = '';
                            $('#add-result-modal').modal('hide');
                            toastSuccess('Result Successfully added');
                        })
                } else {

                }
            })
        },
    }
});

