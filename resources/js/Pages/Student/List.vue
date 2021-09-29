<template>
    <layout>
        <div class="container-students">
            <div class="search-students-container">
                <form action="">
                    <input type="text" class="input-search-students" placeholder="Digite o nome do aluno...">
                    <button type="submit" class="button-search-students">Pesquisar</button>
                    <a type="submit" class="create-link-students">Registrar novo aluno</a>
                </form>
            </div>
            <div class="table-students-container">
                <table class="table-students">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome completo</th>
                            <th>E-mail</th>
                            <th>Nascimento</th>
                            <th>Turma</th>
                            <th>Escola</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Alan dos Snatos Berotlucci</td>
                            <td>beterrababir23@gmail,com</td>
                            <td>22/11/1111</td>
                            <td>Desencolvimento</td>
                            <td>Etec mansenhor antoniao magliano</td>
                            <td>
                                <form action="">
                                    <button class="button-remove-student">Excluir</button>
                                    <Link href="/editar-aluno">Editar</Link>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Alan dos Snatos Berotlucci</td>
                            <td>beterrababir23@gmail,com</td>
                            <td>22/11/1111</td>
                            <td>Desencolvimento</td>
                            <td>Etec mansenhor antoniao magliano</td>
                            <td>
                                <form action="">
                                    <button class="button-remove-student">Excluir</button>
                                    <Link href="/editar-aluno">Editar</Link>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </layout>
</template>

<script>
import Layout from '../../Layouts/App.vue';
import { Link } from '@inertiajs/inertia-vue3';

export default {
    layout: Layout,

    components: {
        Link,
    }

};
</script>