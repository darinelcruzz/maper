
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
        subtotal: 0,
        retention: 0,
        iva: 0,
        isFormWizardDone: false,
        checked: []
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
        },
        generateFormat(){
            this.$refs.generateFormat.submit()
            return true
        }
    },
    computed: {
        total() {
            return (this.subtotal - this.retention + Number(this.iva)).toFixed(2);
        },
        services_sum() {
            return this.checked.reduce((a, b) => a + (b.amount + b.maneuver + b.pension + b.others - b.discount), 0).toFixed(2)
        },
        selected_services() {
            return this.checked.map((a) => a.id)
        }
    }
});
