<template>
    <layout>
        <div class="container-students">
            <div class="search-students-container">
                <form action="">
                    <input type="text" class="input-search-students" placeholder="Pesquise a turma pelo ano...">
                    <button type="submit" class="button-search-students">Pesquisar</button>
                    <a type="submit" class="create-link-students">Registrar nova turma</a>
                </form>
            </div>
            <div class="table-students-container">
                <table class="table-students">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ano da turma</th>
                            <th>Nível de ensino</th>
                            <th>Série</th>
                            <th>Turno</th>
                            <th>Alunos</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2019</td>
                            <td>médio</td>
                            <td>3</td>
                            <td>noturno</td>
                            <th>22</th>
                            <td>
                                <form action="">
                                    <button class="button-remove-student">Excluir</button>
                                    <Link href="/editar-turma">Editar</Link>
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
import { Link } from '@inertiajs/inertia-vue3';
import Layout from '../../Layouts/App.vue';
export default {
    layout: Layout,

    components: {
        Link,
    }

};
</script>