
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//global registration
import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
Vue.use(VueFormWizard)

Vue.component('route-table', require('./components/RouteTable.vue'));
Vue.component('route-row', require('./components/RouteRow.vue'));

Vue.component('row-woc', require('./components/lte/SingleElementRow.vue'));
Vue.component('solid-box', require('./components/lte/SolidBox.vue'));
Vue.component('simple-box', require('./components/lte/SimpleBox.vue'));

Vue.component('data-table', require('./components/lte/DataTable.vue'));
Vue.component('data-table-com', require('./components/lte/SmallDataTable.vue'));

//Vue.component('payment-box', require('./components/PaymentTemplate.vue'));
Vue.component('payment-box', require('./components/ServicesPayment.vue'));

Vue.component('dropdown', require('./components/lte/DropdownButton.vue'));
Vue.component('ddi', require('./components/lte/DropdownItem.vue'));

Vue.component('icon-box', require('./components/lte/IconBox.vue'));

const app = new Vue({
    el: '#app',
    data: {
        entries: 1,
        product_id: 1,
        quantity: 0,
        selected: '',
        selectedDesign: '',
        total: '',
        isFormWizardDone: false
    },
    methods: {
        disable(option) {
            return option == 'existente';
        },
        enableButton() {
            this.isFormWizardDone = true;
        },
        disableButton() {
            this.isFormWizardDone = false;
        }
    },
    computed: {
        iva() {
            return (this.total -  this.total/1.16).toFixed(2);
        }
    },

});
