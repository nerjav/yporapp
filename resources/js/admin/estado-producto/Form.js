import AppForm from '../app-components/Form/AppForm';

Vue.component('estado-producto-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                
            }
        }
    }

});