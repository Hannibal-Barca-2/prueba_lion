<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form>
                    <p>
                        Fecha:
                        <input type="date" name="fecha" class="form-control" v-model="fecha"/>
                    </p>
                    <p>
                        Hora Inicio:
                        <select
                            name="horaInicio"
                            placeholder="Hora de Inicio"
                            class="form-control"
                            v-model = "horaInicio"
                            @change="consultarHoras"
                        >
                            <option value="8:00:00">8:00:00</option>
                            <option value="9:00:00">9:00:00</option>
                            <option value="10:00:00">10:00:00</option>
                            <option value="11:00:00">11:00:00</option>
                            <option value="12:00:00">12:00:00</option>
                            <option value="13:00:00">13:00:00</option>
                            <option value="14:00:00">14:00:00</option>
                            <option value="15:00:00">15:00:00</option>
                            <option value="16:00:00">16:00:00</option>
                            <option value="17:00:00">17:00:00</option>
                            <option value="18:00:00">18:00:00</option>
                        </select>
                    </p>
                    <p>
                        Hora Fin:
                        <select  
                            name="horaFin" 
                            class="form-control"
                            v-model="horaFin"
                        >
                            <option value="8:00:00">8:00:00</option>
                            <option value="9:00:00">9:00:00</option>
                            <option value="10:00:00">10:00:00</option>
                            <option value="11:00:00">11:00:00</option>
                            <option value="12:00:00">12:00:00</option>
                            <option value="13:00:00">13:00:00</option>
                            <option value="14:00:00">14:00:00</option>
                            <option value="15:00:00">15:00:00</option>
                            <option value="16:00:00">16:00:00</option>
                            <option value="17:00:00">17:00:00</option>
                            <option value="18:00:00">18:00:00</option>
                        </select>
                    </p>
                    <p>
                        Sala:
                        <select
                            type="text"
                            name="sala"
                            placeholder="Nombre"
                            class="form-control"
                            v-model="sala_id"
                        >   
                            <option 
                                v-for="(nombre, id) in array_salas"
                                :value="array_salas[0].id"
                                :key="id"
                            >
                                {{ array_salas[0].nombre }}
                            </option>
                        </select>
                    </p>
                    <button class="button" type="submit" @click="crear()">Crear</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    data() {
        return {
            horasDisponibles: "",
            fecha: "",
            horaInicio: "",
            horaFin: "",
            Sala: "",
        };
    },

    props: {
        array_salas: "",
    },

    mounted() {
        console.log("Component mounted.");
    },

    methods: {
        crear() {
            let data = new FormData();
            data.append("fecha", this.fecha);
            data.append("horaInicio", this.horaInicio);
            data.append("horaFin", this.horaFin);
            data.append("Sala", this.sala);

            axios.post("/salas", data)
            .catch(function (error) {
                console.log(error.response.data);
            });
        },

        consultarHoras() {
            let data = new FormData();
            data.append("horaFin", this.horaFin);
                axios
                    .post('/traerhoras', data)
                    .then((res) => {
                        this.horasDisponibles = res.data;
                        console.log(res);
                    })
                    .catch(function (error) {
                        console.log(error.response.data);
                    });
        },

    },
};
</script>
