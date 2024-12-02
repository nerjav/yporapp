import AppForm from '../app-components/Form/AppForm';

Vue.component('detalle-pedido-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                pedido_id:  '' ,
                producto_id:  '' ,
                cantidad:  '' ,
                precio_gral:  '' ,
                
            }
        }
    }

});