<template>
    <div class="skill-column">
        <h3 class="skill-column__title">{{ title }}</h3>
        <ul class="skill-column__list">
            <li v-for="skill in skills" :key="skill" class="skill-column__item">
                {{ skill }}
            </li>
        </ul>
    </div>
</template>

<script setup>
const props = defineProps({
    title: String,
    skills: Array
})
</script>

<style scoped>
.skill-column {
    flex: 1;
}

.skill-column__title {
    margin-bottom: 1rem;
    color: var(--primary-color);
}

.skill-column__list {
    list-style: none;
    padding: 0;
}

.skill-column__item {
    padding: 0.5rem 0;
    border-bottom: 1px solid #e5e7eb;
    color: #4b5563;
}

.skill-column__item:last-child {
    border-bottom: none;
}
</style>