<template>
    <section class="hero">
        <div class="hero__photo">
            <img :src="photoUrl" alt="Елена Фионина">
        </div>
        <div class="hero__content">
            <h1 class="hero__title">Fullstack Developer</h1>
            <p class="hero__description"> <b>Фионина Елена</b></p>
            <p class="hero__description">12 июня 1998</p>
            <p class="hero__description">Ульяновск, Россия</p>
            <p class="hero__experience"> <b>Опыт в разработке:</b> 1 год 6 месяцев</p>
            <p class="hero__description">
                <a href="#contacts" class="hero__contact-link"><b>Связаться со мной &#x2B07;</b></a>
            </p>
        </div>
        <div class="hero__about">
            <p class="hero__about-text">ищу команду, где смогу приносить пользу, перенимать опыт у старших коллег и
                расти как специалист.</p>
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
    font-family: "Philosopher", sans-serif;
}

.hero__description {
    font-size: 1.1rem;
    color: #4b5563;
}

.hero__experience {
    font-size: 1.1rem;
    color: #4b5563;
}

.hero__about {
    flex: 1;
    max-width: 360px;
    margin-top: 76px;
}

.hero__about-text {
    font-size: 1.1rem;
    line-height: 1.6;
    color: #4b5563;
    font-style: italic;
    border-left: 3px solid var(--primary-color);
    padding-left: 2rem;
    font-family: 'Times New Roman', Times, serif;
}

.hero__contact-link {
    color: #7b4b4b;
    text-decoration: none;
    transition: color 0.3s ease;
    cursor: pointer;
    margin-top: 1.2rem;
    display: block;
}

.hero__contact-link:hover {
    color: var(--primary-color);
    text-decoration: underline;
}
</style>