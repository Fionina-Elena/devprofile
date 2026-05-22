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
    'JavaScript',
]

const softSkills = [
    'Работа в команде',
    'Code Review',
    'Анализ кода',
    'Быстрое обучение'
]

const personalQualities = [
    'Аккуратность',
    'Ответственность',
    'Упорство',
    'Люблю учиться'
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