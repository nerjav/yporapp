import AppForm from '../app-components/Form/AppForm';

Vue.component('producto-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                descripcion:  '' ,
                precio_unitario:  '' ,
                stock_actual:  '' ,
                
            }
        }
    }

});