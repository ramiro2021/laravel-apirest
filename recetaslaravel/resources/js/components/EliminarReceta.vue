<template>


    <input
    type="submit"
    value="Eliminar"
    class="btn btn-danger d-block w-100 mr-1 mb-2"
    @click="eliminarReceta"
     ></input>


</template>

<script>
export default {
    props:['recetaId'],


    methods: {
        eliminarReceta(){


            this.$swal.fire({

            title: 'Estas seguro que deseas eliminar esta receta??',
            text: "Los datos se perderan de manera definitiva!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, deseo eliminarla!'
            }).then((result) => {
            if (result.isConfirmed) {

                  const params = {
                    id: this.recetaId
                   }

            axios.post(`/recetas/${this.recetaId}`, {params, _method: 'delete'})
                     .then(respuesta => {
                           this.$swal.fire(
                            'Receta Eliminada!',
                           'Su receta fue eliminada correctamente',
                          'success'
                             )
                            this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                     })
                     .catch(err => {
                         console.log(err);
                     });



            }
            })
        }
    },
}
</script>
