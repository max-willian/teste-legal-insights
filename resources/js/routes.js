import Home from "./components/Home";
import NovoProcesso from "./components/Processos/NovoProcesso"
import EditarProcesso from "./components/Processos/EditarProcesso";
import VerProcesso from "./components/Processos/VerProcesso";
import ListarPedidos from "./components/Pedidos/ListarPedidos";
import NovoPedido from "./components/Pedidos/NovoPedido";
import EditarPedido from "./components/Pedidos/EditarPedido";
import VerPedido from "./components/Pedidos/VerPedido";

export const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/processos/novo',
        component: NovoProcesso
    },
    {
        path: '/processos/:id/editar',
        component: EditarProcesso
    },
    {
        path: '/processos/:id',
        component: VerProcesso
    },
    {
        path: '/processos/:id/pedidos',
        component: ListarPedidos
    },
    {
        path: '/processos/:id/pedidos/novo',
        component: NovoPedido
    },
    {
        path: '/processos/:idProcesso/pedidos/:id/editar',
        component: EditarPedido
    },
    {
        path: '/processos/:idProcesso/pedidos/:id',
        component: VerPedido
    }
];
