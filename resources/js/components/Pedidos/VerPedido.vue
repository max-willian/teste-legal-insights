<template>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link :to="`/`">Home</router-link></li>
                <li class="breadcrumb-item"><router-link :to="`/processos/${idProcesso}`">Processo</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Ver Pedido</li>
            </ol>
        </nav>
        <div class="card">
            <h5 class="card-header">Ver Pedido</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="valorRiscoProvavel">Valor Risco Provavel</label>
                            <input type="text" class="form-control" id="valorRiscoProvavel" placeholder="Digite o valor" v-model="pedido.valor_risco_provavel" readonly>
                        </div>

                        <div class="form-group">
                            <label for="marca">Tipo de Pedido</label>
                            <select class="form-control" id="marca" v-model="pedido.tipo_pedido_id" readonly>
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
                            <input type="text" class="form-control" id="status" placeholder="Digite o status" v-model="pedido.status" readonly>
                        </div>
                    </div>

                    <div class="col-12">
                        <router-link class="btn btn-light" :to="`/processos/${idProcesso}/pedidos`">Voltar</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "NovoPedido",
        data(){
            return({
                error: null,
                idProcesso: this.$route.params.idProcesso,
                idPedido: this.$route.params.id,
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

            axios.get('/api/pedidos/' + this.idPedido).then(response => {
                this.pedido = response.data;
            });
        }
    }
</script>

<style scoped>

</style>
