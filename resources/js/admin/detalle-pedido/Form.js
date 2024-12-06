import AppForm from '../app-components/Form/AppForm';

Vue.component('detalle-pedido-form', {
    mixins: [AppForm],
    props:['pedido'],
    data: function() {
        return {
            form: {
                pedido_id: this.pedido ,
                producto_id:  '' ,
                cantidad:  '' ,
                precio_gral:  '' ,
                
            }
        }
    }

});