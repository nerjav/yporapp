import AppForm from '../app-components/Form/AppForm';

Vue.component('detalle-pedido-form', {
    mixins: [AppForm],
    props: ['pedidoid'],  // Recibe 'pedidoid' como una prop desde la vista
    data: function() {
        return {
            form: {
                pedido_id: this.pedidoid,  // Asigna el 'pedidoid' recibido a 'pedido_id' en el formulario
                producto_id: '',
                cantidad: '',
                precio_gral: ''
            }
        }
    }
});
