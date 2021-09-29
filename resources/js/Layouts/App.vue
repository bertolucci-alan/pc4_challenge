<template>
    <div class="nav-layout">
        <Link href="/" class="link-home">Página inicial</Link>
        <Link href="/alunos" class="link-home">Alunos</Link>
        <Link href="/turmas" class="link-home">Turmas</Link>
        <Link href="/escolas" class="link-home">Escolas</Link>
    </div>
    <slot/>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import '../../../public/css/index.css';
export default {
    components: {
        Link
    }
 
};
</script>
