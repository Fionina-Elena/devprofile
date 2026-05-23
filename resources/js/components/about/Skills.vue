<template>
    <section class="skills">
        <SkillColumn title="/ ХАРД СКИЛЫ" :skills="hardSkills" />
        <SkillColumn title="/ СОФТ СКИЛЫ" :skills="softSkills" />
        <SkillColumn title="ЛИЧНЫЕ КАЧЕСТВА" :skills="personalQualities" />
    </section>
</template>

<script setup>
import SkillColumn from './SkillColumn.vue';

const hardSkills = [
    'PHP / Laravel',
    'Vue.js / Vue Router',
    'JavaScript',
    'HTML / CSS',
    'MySQL / PostgreSQL',
    'CRUD, миграции БД',
    'REST API / JSON API',
    'JWT Auth / OAuth',
    'Docker',
    'GitHub / GitLab',
    'Linux',
    'Яндекс.Карты API / Яндекс.Cloud',
    'Feature-тестирование'
]

const softSkills = [
    'Работа в команде',
    'Code Review',
    'Готовность к командировкам',
    'Самостоятельная разработка от идеи до продакшена',
    'Стремление учиться и расти как специалист'
]

const personalQualities = [
    'Аккуратность',
    'Ответственность',
    'Усидчивость',
    'Коммуникабельность',
    'Пунктуальность',
    'Инициативность',
]
</script>

<style scoped>
.skills {
    display: flex;
    gap: 2rem;
    padding: 4rem 2rem;
    background: #f9fafb;
    max-width: 1200px;
    margin: 0 auto;
}
</style>