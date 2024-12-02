import AppForm from '../app-components/Form/AppForm';

Vue.component('cliente-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                ruc:  '' ,
                direccion:  '' ,
                telefono:  '' ,
                email:  '' ,
                fecha_registro:  '' ,
                
            }
        }
    }

});