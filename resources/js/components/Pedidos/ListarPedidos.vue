<template>
    <div class="card">
        <h5 class="card-header">Pedidos</h5>
        <div class="card-body">
            <router-link to="pedidos/novo" class="btn btn-primary">Novo Pedido</router-link>

            <table class="table table-bordered mt-4">
                <thead>
                <tr>
                    <th scope="col">Valor Risco Provável</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <template v-if="!pedidos.length">
                    <tr>
                        <td colspan="6" class="text-center">Nenhum pedido foi adicionado até agora</td>
                    </tr>
                </template>
                <template v-else>
                    <tr v-for="pedido in pedidos" :key="pedido.id">
                        <td>{{ pedido.valor_risco_provavel }}</td>
                        <td>{{ pedido.tipo_pedido.nome }}</td>
                        <td>{{ pedido.status }}</td>
                        <td>
                            <router-link :to="`/processos/${idProcesso}/pedidos/${pedido.id}/editar`">Editar</router-link>
                        </td>
                        <td>
                            <router-link :to="`/processos/${idProcesso}/pedidos/${pedido.id}`">Ver</router-link>
                        </td>
                        <td>
                            <a href="#" v-on:click.prevent="deletar(pedido.id)">Excluir</a>
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
        name: "ListarPedidos",
        data() {
            return {
                idProcesso: this.$route.params.id,
                pedidos: []
            }
        },
        mounted(){
            axios.get('/api/processos/' + this.idProcesso + '/pedidos').then((response) => {
                this.pedidos = response.data;
            });
        },
        methods: {
            deletar(id){
                axios.delete('/api/pedidos/' + id).then(response => {
                    let index = this.pedidos.findIndex(item => item.id === id);
                    this.pedidos.splice(index, 1);

                    alert('Deletado com sucesso');
                })
            }
        }
    }
</script>

<style scoped>

</style>
