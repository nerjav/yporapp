import AppForm from '../app-components/Form/AppForm';

Vue.component('venta-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                cliente_id:  '' ,
                total_vidones:  '' ,
                monto_total:  '' ,
                metodo_pago:  '' ,
                monto_abonado:  '' ,
                fecha_venta:  '' ,
                estado_venta:  '' ,
                observaciones:  '' ,
                
            }
        }
    }

});