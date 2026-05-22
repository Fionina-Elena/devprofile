<template>
    <header class="header">
        <nav class="header_nav">
            <router-link to="/about" class="header_link" active-class="header_link--active">
                Обо мне
            </router-link>
            <router-link to="/how-i-work" class="header_link" active-class="header_link--active">
                Принцип работы
            </router-link>
            <router-link to="/cases" class="header_link" active-class="header_link--active">
                Кейсы
            </router-link>
        </nav>
    </header>
</template>

<style scoped>
.header {
    background: var(--primary-color);
    padding: 1rem 2rem;
}

.header_nav {
    display: flex;
    gap: 2rem;
}

.header_link {
    color: white;
    font-weight: 500;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    transition: background 0.3s;
}

.header_link:hover {
    background: rgba(255, 255, 255, 0.1);
}

.header_link--active {
    font-weight: 700;
    background: rgba(255, 255, 255, 0.2);
}
</style>