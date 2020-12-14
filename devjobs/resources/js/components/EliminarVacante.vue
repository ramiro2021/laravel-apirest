<template>
    <button
        class="text-red-600 hover:text-red-900  mr-5"
        @click="eliminarVacante()"
    >
        Eliminar
    </button>
</template>

<script>
export default {
    props: ["vacanteId"],

    methods: {
        eliminarVacante() {
            this.$swal
                .fire({
                    title: "Estas deacuerdo?",
                    text:
                        "Al eliminarse los datos se perderan de manera permanente!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, Eliminar!",
                    cancelButtonText: "Cancelar"
                })
                .then(result => {
                    if (result.isConfirmed) {
                        // enviar peticion

                        const params = {
                            id: this.vacanteId,
                            _method: "delete"
                        };

                        axios
                            .post(`/vacantes/${this.vacanteId}`, params)
                            .then(result => {
                                this.$swal.fire(
                                    "Eliminado!",
                                    result.data.mensaje,
                                    "success"
                                );

                                // eliminar del dom
                                this.$el.parentNode.parentNode.parentNode.removeChild(
                                    this.$el.parentNode.parentNode
                                );
                            })
                            .catch(err => {
                                console.log(err);
                            });
                    }
                });
        }
    }
};
</script>
