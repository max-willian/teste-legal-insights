<template>
    <div class="card">
        <h5 class="card-header">Ver Processo</h5>
        <div class="card-body">
            <form @submit.prevent="edit">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="numeroUnicoProcesso">Número único</label>
                            <input type="text" class="form-control" id="numeroUnicoProcesso" placeholder="Digite o número" v-model="processo.numero_unico_processo" disabled>
                        </div>

                        <div class="form-group">
                            <label for="reuPrincipal">Reu Principal</label>
                            <input type="text" class="form-control" id="reuPrincipal" placeholder="Digite o nome" v-model="processo.reu_principal" disabled>
                        </div>

                        <div class="form-group">
                            <label for="vara">Vara</label>
                            <input type="text" class="form-control" id="vara" placeholder="Digite a vara" v-model="processo.vara" disabled>
                        </div>

                        <div class="form-group">
                            <label for="marca">Estado</label>
                            <select class="form-control" id="marca" v-model="processo.estado" disabled>
                                <option value="">Selecione</option>
                                <option v-for="estado in estados" v-bind:value="estado.sigla">
                                    {{estado.nome}}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="dataDistribuicao">Data de Distribuição</label>
                            <input type="date" class="form-control" id="dataDistribuicao" placeholder="Digite a data" v-model="processo.data_distribuicao" disabled>
                        </div>

                        <div class="form-group">
                            <label for="valorCausa">Valor Causa</label>
                            <input type="text" class="form-control" id="valorCausa" placeholder="Digite o valor" v-model="processo.valor_causa" disabled>
                        </div>

                        <div class="form-group">
                            <label for="comarca">Comarca</label>
                            <input type="text" class="form-control" id="comarca" placeholder="Digite a comarca" v-model="processo.comarca" disabled>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>


<script>
    export default {
        name: "EditarProcesso",
        data() {
            return {
                error: null,
                estados: [
                    {"nome": "Acre", "sigla": "AC"},
                    {"nome": "Alagoas", "sigla": "AL"},
                    {"nome": "Amapá", "sigla": "AP"},
                    {"nome": "Amazonas", "sigla": "AM"},
                    {"nome": "Bahia", "sigla": "BA"},
                    {"nome": "Ceará", "sigla": "CE"},
                    {"nome": "Distrito Federal", "sigla": "DF"},
                    {"nome": "Espírito Santo", "sigla": "ES"},
                    {"nome": "Goiás", "sigla": "GO"},
                    {"nome": "Maranhão", "sigla": "MA"},
                    {"nome": "Mato Grosso", "sigla": "MT"},
                    {"nome": "Mato Grosso do Sul", "sigla": "MS"},
                    {"nome": "Minas Gerais", "sigla": "MG"},
                    {"nome": "Pará", "sigla": "PA"},
                    {"nome": "Paraíba", "sigla": "PB"},
                    {"nome": "Paraná", "sigla": "PR"},
                    {"nome": "Pernambuco", "sigla": "PE"},
                    {"nome": "Piauí", "sigla": "PI"},
                    {"nome": "Rio de Janeiro", "sigla": "RJ"},
                    {"nome": "Rio Grande do Norte", "sigla": "RN"},
                    {"nome": "Rio Grande do Sul", "sigla": "RS"},
                    {"nome": "Rondônia", "sigla": "RO"},
                    {"nome": "Roraima", "sigla": "RR"},
                    {"nome": "Santa Catarina", "sigla": "SC"},
                    {"nome": "São Paulo", "sigla": "SP"},
                    {"nome": "Sergipe", "sigla": "SE"},
                    {"nome": "Tocantins", "sigla": "TO"}
                ],
                processo: {
                    numero_unico_processo: '',
                    data_distribuicao: '',
                    reu_principal: '',
                    estado: '',
                    valor_causa: '',
                    vara: '',
                    comarca: ''
                }
            }
        },
        created(){
            let id = this.$route.params.id;
            axios.get('/api/processos/' + id).then((response) => {
                this.processo = response.data;
            });
        },
    }
</script>

<style scoped>

</style>
