import AppForm from '../app-components/Form/AppForm';

Vue.component('estados-pedido-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                
            }
        }
    }

});