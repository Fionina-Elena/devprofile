<template>
    <Header />
    <main>
        <router-view />
    </main>
    <Footer />
    <ContactModal />
</template>

<script setup>
import Header from './layout/Header.vue';
import Footer from './layout/Footer.vue';
import ContactModal from './contact/ContactModal.vue';
</script>