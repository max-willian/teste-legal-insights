<template>
    <div class="card">
        <h5 class="card-header">Processos</h5>
        <div class="card-body">
            <router-link to="/processos/novo" class="btn btn-primary">Novo Processo</router-link>

            <table class="table table-bordered mt-4">
                <thead>
                <tr>
                    <th scope="col">Número Único</th>
                    <th scope="col">Data Distribuição</th>
                    <th scope="col">Réu Principal</th>
                    <th scope="col">Valor Causa</th>
                    <th scope="col">Vara</th>
                    <th scope="col">Comarca</th>
                    <th scope="col">Estado</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <template v-if="!processos.length">
                    <tr>
                        <td colspan="11" class="text-center">Nenhum processo foi adicionado até agora</td>
                    </tr>
                </template>
                <template v-else>
                    <tr v-for="processo in processos" :key="processo.id">
                        <td>{{ processo.numero_unico_processo }}</td>
                        <td>{{ processo.data_distribuicao }}</td>
                        <td>{{ processo.reu_principal }}</td>
                        <td>{{ processo.valor_causa }}</td>
                        <td>{{ processo.vara }}</td>
                        <td>{{ processo.comarca }}</td>
                        <td>{{ processo.estado }}</td>
                        <td>
                            <router-link :to="`/processos/${processo.id}/editar`">Editar</router-link>
                        </td>
                        <td>
                            <router-link :to="`/processos/${processo.id}`">Ver</router-link>
                        </td>
                        <td>
                            <a href="#" v-on:click.prevent="deletar(processo.id)">Excluir</a>
                        </td>
                        <td>
                            <router-link :to="`/processos/${processo.id}/pedidos`">Pedidos</router-link>
                        </td>
                    </tr>
                </template>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Home",
        data() {
            return {
                processos: []
            }
        },
        mounted(){
            axios.get('/api/processos').then((response) => {
                this.processos = response.data;
            });
        },
        methods: {
            deletar(id){
                axios.delete('/api/processos/' + id).then(response => {
                    let index = this.processos.findIndex(item => item.id === id);
                    this.processos.splice(index, 1);

                    alert('Deletado com sucesso');
                })
            }
        }
    }
</script>

<style scoped>

</style>
