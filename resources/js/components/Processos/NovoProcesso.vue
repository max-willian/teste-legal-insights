<template>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link :to="`/`">Home</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Novo Processo</li>
            </ol>
        </nav>

        <div class="card">
        <h5 class="card-header">Novo Processo</h5>
        <div class="card-body">
            <div class="alert alert-danger" role="alert" v-if="error">
                {{error.message}}

                <ul>
                    <li v-for="error in error.errors">
                        {{error[0]}}
                    </li>
                </ul>
            </div>
            <form @submit.prevent="add">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="numeroUnicoProcesso">Número único</label>
                            <input type="text" class="form-control" id="numeroUnicoProcesso" placeholder="Digite o número" v-model="processo.numero_unico_processo">
                        </div>

                        <div class="form-group">
                            <label for="reuPrincipal">Reu Principal</label>
                            <input type="text" class="form-control" id="reuPrincipal" placeholder="Digite o nome" v-model="processo.reu_principal">
                        </div>

                        <div class="form-group">
                            <label for="vara">Vara</label>
                            <input type="text" class="form-control" id="vara" placeholder="Digite a vara" v-model="processo.vara">
                        </div>

                        <div class="form-group">
                            <label for="marca">Estado</label>
                            <select class="form-control" id="marca" v-model="processo.estado">
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
                            <input type="date" class="form-control" id="dataDistribuicao" placeholder="Digite a data" v-model="processo.data_distribuicao">
                        </div>

                        <div class="form-group">
                            <label for="valorCausa">Valor Causa</label>
                            <input type="text" class="form-control" id="valorCausa" placeholder="Digite o valor" v-model="processo.valor_causa">
                        </div>

                        <div class="form-group">
                            <label for="comarca">Comarca</label>
                            <input type="text" class="form-control" id="comarca" placeholder="Digite a comarca" v-model="processo.comarca">
                        </div>
                    </div>
                </div>
                <router-link to="/" class="btn btn-light">Voltar</router-link>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>

    </div>
</template>

<script>
    export default {
        name: "NovoProcesso",
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
                    comarca: '',
                }
            }
        },
        methods: {
            add(){
                axios.post('/api/processos', this.$data.processo).then((response) => {
                    if(!response.status === 201){
                        this.error = "Erro ao adicionar";
                        return false;
                    }

                    this.$router.push('/');
                }).catch((error) => {
                    this.error = error.response.data;
                })
            }
        }
    }
</script>

<style scoped>

</style>
