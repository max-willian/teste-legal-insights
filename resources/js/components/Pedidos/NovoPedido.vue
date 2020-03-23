<template>
    <div class="card">
        <h5 class="card-header">Novo Pedido</h5>
        <div class="card-body">
            <div class="alert alert-danger" role="alert" v-if="error">
                {{error.message}}
            </div>
            <form @submit.prevent="add">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="valorRiscoProvavel">Valor Risco Provavel</label>
                            <input type="text" class="form-control" id="valorRiscoProvavel" placeholder="Digite o valor" v-model="pedido.valor_risco_provavel">
                        </div>

                        <div class="form-group">
                            <label for="marca">Tipo de Pedido</label>
                            <select class="form-control" id="marca" v-model="pedido.tipo_pedido_id">
                                <option value="">Selecione</option>
                                <option v-for="tipo in tipos" v-bind:value="tipo.id">
                                    {{tipo.nome}}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" placeholder="Digite o status" v-model="pedido.status">
                        </div>
                    </div>
                </div>
                <router-link to="/" class="btn btn-light">Voltar</router-link>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "NovoPedido",
        data(){
            return({
                error: null,
                idProcesso: this.$route.params.id,
                tipos: [],
                pedido: {
                    tipo_pedido_id: '',
                    valor_risco_provavel: '',
                    status: '',
                }
            });
        },
        mounted(){
            axios.get('/api/tipo-pedidos').then(response => {
                console.log(response.data);
                this.tipos = response.data;
            });
        },
        methods: {
            add(){
                axios.post('/api/processos/' + this.idProcesso + '/pedidos', this.$data.pedido).then(response => {
                    if(!response === 201){
                        this.error = "Erro ao adicionar";
                        return false;
                    }

                    this.$router.push('/processos/' + this.idProcesso + '/pedidos');
                }).catch((error) => {
                    this.error = error.response.data;
                })
            }
        }
    }
</script>

<style scoped>

</style>
