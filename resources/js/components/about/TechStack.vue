<template>
    <section class="tech-stack">
        <h2 class="tech-stack__title">Стек технологий</h2>
        <div class="tech-stack__list">
            <span v-for="tech in techStack" :key="tech" class="tech-stack__item">
                <i v-if="techIcons[tech]" :class="techIcons[tech].icon" :style="{ color: techIcons[tech].color }"
                    class="tech-stack__icon">
                </i>
                {{ tech }}
            </span>
        </div>
    </section>
</template>

<script setup>
const techStack = [
    'Linux', 'Laravel', 'PHP 8.1+', 'Vue.js', 'JavaScript', 'MySQL',
    'PostgreSQL', 'REST API', 'Git', 'Docker', 'OAuth', 'HTML', 'CSS'
]

const techIcons = {
    'Linux': { icon: 'fa-brands fa-linux', color: '#FFFF00' },
    'Laravel': { icon: 'fa-brands fa-laravel', color: '#ff2d20' },
    'Vue.js': { icon: 'fa-brands fa-vuejs', color: '#4fc08d' },
    'PHP 8.1+': { icon: 'fa-brands fa-php', color: '#777bb4' },
    'JavaScript': { icon: 'fa-brands fa-js', color: '#f7df1e' },
    'MySQL': { icon: 'fa-solid fa-database', color: '#D2691E' },
    'PostgreSQL': { icon: 'fa-solid fa-database', color: '#00BFFF' },
    'REST API': { icon: 'fa-solid fa-server', color: '#6b7280' },
    'Git': { icon: 'fa-brands fa-git-alt', color: '#f05032' },
    'Docker': { icon: 'fa-brands fa-docker', color: '#2496ed' },
    'OAuth': { icon: 'fa-solid fa-key', color: '#6b7280' },
    'HTML': { icon: 'fa-brands fa-html5', color: '#e34f26' },
    'CSS': { icon: 'fa-brands fa-css3-alt', color: '#1572b6' }
}
</script>

<style scoped>
.tech-stack {
    padding: 4rem 2rem;
    max-width: 1200px;
    margin: 0 auto;
}

.tech-stack__title {
    margin-bottom: 2rem;
    color: var(--primary-color);
}

.tech-stack__list {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
}

.tech-stack__item {
    padding: 0.5rem 1rem;
    background: var(--primary-color);
    color: white;
    border-radius: 0.5rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.tech-stack__icon {
    font-size: 1.2rem;
}
</style>