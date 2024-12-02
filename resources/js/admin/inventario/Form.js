import AppForm from '../app-components/Form/AppForm';

Vue.component('inventario-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                vidones_disponibles:  '' ,
                vidones_recargados:  '' ,
                vidones_vendidos:  '' ,
                vidones_devueltos:  '' ,
                fecha:  '' ,
                
            }
        }
    }

});