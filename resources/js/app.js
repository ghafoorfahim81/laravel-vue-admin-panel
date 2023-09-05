require('./bootstrap');

import Alpine from 'alpinejs';

import Vue from 'vue/dist/vue.esm.js';
// import LaravelVuePagination from 'laravel-vue-pagination';

window.Vue=Vue;
window.Alpine = Alpine;
import Tagify from 'tagify-vue'
Vue.component('pagination', require('laravel-vue-pagination'));
import vSelect from 'vue-select';
// import { round } from 'lodash';
import Skeleton from 'vue-loading-skeleton';
import swal from 'sweetalert2';

import Avatar from 'vue-avatar'
Vue.component('v-select', vSelect);
Vue.component('skeleton', Skeleton);
Vue.component('tagify', Tagify);
Vue.component('swal', swal);
Vue.component('Avater',Avatar);

window.Avatar=Avatar;
// Vue.component('multiRage', Tagify);
import VueSkeletonLoader from 'skeleton-loader-vue';

// Register the component globally
Vue.component('vue-skeleton-loader', VueSkeletonLoader);

window.VueSkeletonLoader=VueSkeletonLoader;

import VeeValidate,{ Validator } from 'vee-validate';
Vue.use(VeeValidate);

window.Validator = Validator;
window.VeeValidate = VeeValidate;
// import en from 'vee-validate/dist/locale/en.js';
import fa from 'vee-validate/dist/locale/fa.js';
// Install English and Arabic locales.

  Validator.localize({ fa: fa });
Vue.use(VeeValidate, { locale: "fa" });

Vue.component('datatable', require('./components/LaravelVueDatatable.vue').default);
Vue.component('save-banner', require('./components/SaveBanner.vue').default);
Vue.component('table-skeleton', require('./components/skeletons/TableSkeleton.vue').default);

// Vue.component('pagination', require('./pagination/LaravelVuePagination.vue').default);
// Vue.component('my-calendar', require('./components/calendar/MyCalendar.vue').default);


Vue.mixin({
    data() {
        return {
            categories:[],
            languages:[],
        }
    },
    computed: {},
    mounted() {

    },
    methods: {
        //search Items from create and edit modal

        async getDropdownItem(types) {
            return new Promise((resovle, reject) => {
                axios.get('/get-dropdown-data' + '?type=' + types).then(res => {
                    resovle(res.data);
                    if (types.includes('categories')) {
                        this.categories = res.data.categories;
                    }
                    if (types.includes('languages')) {
                        this.languages = res.data.languages;
                    }

                })
            })

        },
    }
})
