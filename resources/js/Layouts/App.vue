<template>
    <div class="nav-layout">
        <Link href="/aa" class="link-home">Página inicial</Link>
        <Link href="/dd" class="link-home">Escolas</Link>
        <Link href="/ww" class="link-home">Turmas</Link>
        <Link href="/r" class="link-home">Alunos</Link>
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
