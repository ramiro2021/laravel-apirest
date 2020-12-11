<template>
    <div>
        <ul class="flex flex-wrap justify-center">
            <li
                class="border hover:bg-blue-300 border-gray-500 px-10 py-3 mb-3 rounded mr-4"
                v-for="(skill, i) in this.skills"
                :class="verificarClaseActiva(skill)"
                v-bind:key="i"
                @click="activar($event)"
            >
                {{ skill }}
            </li>
        </ul>
        <input type="hidden" name="skills" id="skills" />
    </div>
</template>

<script>
export default {
    props: ["skills", "oldskills"],
    data() {
        return {
            habilidades: new Set()
        };
    },
    created() {
        if (this.oldskills) {
            const skillsArray = this.oldskills.split(",");
            skillsArray.forEach(skill => this.habilidades.add(skill));
        }
    },
    mounted() {
        document.querySelector("#skills").value = this.oldskills;
    },
    methods: {
        activar(e) {
            if (e.target.classList.contains("bg-blue-500")) {
                e.target.classList.remove("bg-blue-500", "text-white");

                //Eliminar del SET
                this.habilidades.delete(e.target.textContent.trim());
            } else {
                e.target.classList.add("bg-blue-500", "text-white");
                //Agregar al SET
                this.habilidades.add(e.target.textContent.trim());
            }

            // agregar las habilidades al input hidden
            const stringHabilidades = [...this.habilidades];
            document.querySelector("#skills").value = stringHabilidades;
        },
        // && "text-white"
        verificarClaseActiva(skill) {
            return this.habilidades.has(skill)
                ? "bg-blue-500 , text-white"
                : "";
        }
    }
};
</script>
