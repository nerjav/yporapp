import AppForm from '../app-components/Form/AppForm';

Vue.component('productos-force-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                
            }
        }
    }

});