import AppForm from '../app-components/Form/AppForm';

Vue.component('tipo-de-cliente-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                
            }
        }
    }

});