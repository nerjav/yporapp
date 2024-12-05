import AppForm from '../app-components/Form/AppForm';

Vue.component('pedido-form', {
    mixins: [AppForm],
    props:['metodo_pago','estado','tipo_cliente','buscar'],

    data: function() {
        return {
            form: {
                fecha_pedido:  '' ,
                estado:  '' ,
                tipo_cliente:  '' ,
                metodo_pago:  '' ,
                observacion:  '' ,
                cliente_id:  '' ,
                ruc:'',
                nombre: '',

            }
        }
    },
    methods: {
        findData: function () {
            axios
                .get(this.buscar + "/" + this.form.ruc)
                .then(response => {
                    console.log(response.data);
                    if (!response.data.error) {
                        this.errorcedula = '';
                        // Accede al nombre del cliente devuelto por el backend
                        this.form.nombre = response.data.cliente.nombre || 'Nombre no disponible';
                        this.form.cliente_id = response.data.cliente.id || 'Nombre no disponible';
                    } else {
                        this.mostrarError('Cédula no se encuentra en la base de datos');
                    }
                })
                .catch(error => {
                    console.error(error);
                    this.mostrarError('Error buscando datos');
                });
        },

        mostrarError: function (mensaje) {
            this.errorcedula = mensaje;
            this.$notify({ type: 'error', title: 'Error!', text: mensaje });
            // Limpia los datos del formulario
            this.form.nombre = '';
            this.form.ruc = '';
            this.form.cliente_id = '';
        }
    }


});
