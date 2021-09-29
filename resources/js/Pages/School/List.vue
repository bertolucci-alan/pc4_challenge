<template>
    <layout>
        <div class="container-students">
            <div class="search-students-container">
                <form action="">
                    <input type="text" class="input-search-students" placeholder="Digite o nome da escola...">
                    <button type="submit" class="button-search-students">Pesquisar</button>
                    <a type="submit" class="create-link-students">Registrar nova escola</a>
                </form>
            </div>
            <div class="table-students-container">
                <table class="table-students">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome da escola</th>
                            <th>Endereço</th>
                            <th>Turmas</th>
                            <th>Alunos</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Etec monsenhor antonio ba</td>
                            <td>Pinchas ditisndias 32</td>
                            <td>123</td>
                            <td>121.232</td>
                            <td>
                                <form action="">
                                    <button class="button-remove-student">Excluir</button>
                                    <Link href="/editar-escola">Editar</Link>
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