<template>
    <section class="hero">
        <div class="hero__photo">
            <img :src="photoUrl" alt="Елена Фионина">
        </div>
        <div class="hero__content">
            <h1 class="hero__title">Fullstack Developer</h1>
            <p class="hero__description">27 лет, активно ищу работу и хочу развиваться</p>
            <p class="hero__experience"> <b>Опыт:</b> 1 год 6 месяцев</p>
        </div>
    </section>
</template>

<script setup>
const photoUrl = '/images/photo.jpg';
</script>

<style scoped>
.hero {
    display: flex;
    gap: 2rem;
    padding: 4rem 2rem;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
}

.hero__photo img {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid var(--primary-color);
}

.hero__content {
    flex: 1;
}

.hero__title {
    font-size: 2.5rem;
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.hero__description {
    font-size: 1.2rem;
    color: #6b7280;
}

.hero__experience {
    font-size: 1.2rem;
    color: #887467;
}
</style>