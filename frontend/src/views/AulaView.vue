<template>
    <div>
        <template>
            <div>
                <div class="grid">
                    <div v-for="aula in aulas" :key="aula.id" class="grid-item">
                        <h2>{{ aula.nome }}</h2>
                        <h2 :style="{ color: aula.cancelada ? 'red' : 'green' }">Status: {{ aula.cancelada ? 'Cancelada' : 'Normal' }}</h2>
                        <h2>Sala: {{ aula.sala }}</h2>
                        <h2>Dia: {{ aula.dia_da_semana }}</h2>
                        <!-- <button tag="router-link" :to="{ name: '', params: { id: aula.id } }">Ver aulas</button>-->
                        <button @click="cancelarAula(aula.id)">Cancelar Aula</button>
                        <button tag="router-link" :to="{ name: 'edit', params: { id: aula.id } } ">Editar Aula</button>
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            idTurma: this.$route.params.id,
            aulas: []
        };
    },
    mounted() {
        this.fetchAulas();
    },
    methods: {
        fetchAulas() {
            axios.get(`/api/aula/${this.idTurma}`)
                .then(response => {
                    this.aulas = response.data;
                    console.log(this.aulas)
                })
                .catch(error => {
                    console.error('Erro ao buscar aulas:', error);
                });
        },
        cancelarAula(aulaId) {
            this.$router.push('/turmas');
            axios.post(`/api/aula/cancelar/${aulaId}`)
                .then(response => {
                    // Handle success response
                    console.log('Aula canceled:', response.data);
                    // Refresh the list of aulas
                    this.fetchAulas();
                })
                .catch(error => {
                    console.error('Erro ao cancelar aula:', error);
                });
        }
    }
};
</script>

<style>
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    grid-gap: 20px;
}

.grid-item {
    border: 1px solid #ccc;
    padding: 20px;
    background-color: #f5f5f5;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.grid-item h2 {
    margin-bottom: 10px;
}

.grid-item button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
}

.grid-item button:hover {
    background-color: #0056b3;
}
</style>
</div>