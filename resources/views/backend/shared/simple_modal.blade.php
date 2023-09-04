@section('css')
    <style type="text/css">
         @media screen and (min-width: 980px) /* Desktop */ {
            .modal-container {
                width: 600px!important;
            }
        }

        @media screen  and (max-width: 979px) /* Tablet */ {
            .modal-container {
                width: 500px!important;
            }
        }

        @media screen and (max-width: 500px) /* Mobile */ {
            .modal-container {
                width: 300px!important;
            }
        }

        .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
        table-layout: fixed"
        }

        .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
        }

        .modal-container {
        max-height: 80%; 
        overflow-y: auto;
        margin: 0px auto;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
        }

        .modal-header h3 {
        margin-top: 0;
        color: #42b983;
        }

        .modal-body {
        margin: 20px 0;
        }

        .modal-default-button {
        float: right;
        }

        /*
        * The following styles are auto-applied to elements with
        * transition="modal" when their visibility is toggled
        * by Vue.js.
        *
        * You can easily play with the modal transition by editing
        * these styles.
        */

        .modal-enter {
        opacity: 0;
        }

        .modal-leave-active {
        opacity: 0;
        }

        .modal-enter .modal-container,
        .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
        }

    </style>
@endsection
@push('scripts')
<script type="text/javascript">
    Vue.component('simple-modal',{
        props:['reportTitle'],
        data() {
            return{
                title:'',
            }
        },
        template:`
        <transition name="simple-modal">
        <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container">

            <div class="modal-header">
                <slot name="header">
                @{{reportTitle}}        
                </slot>
            </div>

            <div class="modal-body">

                    <slot name="body">
                        <div class="row">
                        
                        </div>
                    </slot>
                

            </div>

            <div class="modal-footer">
                <slot name="footer">
                <button class="btn btn-info" @click="saveOrSend">
                    @lang('lang.submit')
                </button>
                <button class="btn btn-danger" @click="$emit('close')">
                    @lang('lang.cancel')
                </button>
                </slot>
            </div>
            </div>
        </div>
        </div>
    </transition>
    `,
    watch:
    {
        setValue(oldValue,newValue)
        {
            console.log('old',oldValue);
            console.log('new',newValue);
        }
    },
    created:function()
    {
        
        
        this.$nextTick(()=>{
            $(document).ready(function(){
             
              


            });
        });
    },
    methods:
    {   
        /**
         * closeModal emit event to close modal
         */
        closeModal()
        {
            this.$emit('close');
        },
        /**
         * saveOrSend submit or send the form
         */
        saveOrSend()
        {
            this.closeModal();
        }
    }
    })
</script>
@endpush