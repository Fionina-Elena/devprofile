<template>
    <footer class="footer">
        <div class="footer__content">
            <div class="footer__contacts">
                <p class="footer__contact">+7 917 604-57-16</p>
                <p class="footer__contact">filatowa.l2010@yandex.ru</p>
            </div>
            <button class="footer__button" @click="openModal">
                Связаться
            </button>
        </div>
        <ContactModal ref="modalRef" />
    </footer>
</template>

<script>
import ContactModal from '../contact/ContactModal.vue';

export default {
    components: {
        ContactModal
    },

    methods: {
        openModal() {
            this.$refs.modalRef.open();
        }
    }
};
</script>

<style scoped>
.footer {
    background: #887467;
    color: white;
    padding: 2rem;
}

.footer__content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
}

.footer__contacts {
    display: flex;
    gap: 1rem;
}

.footer__contact {
    margin: 0;
}

.footer__button {
    padding: 0.75rem 1.5rem;
    background: var(--accent-color);
    color: white;
    border-radius: 0.5rem;
    font-weight: 600;
    transition: background 0.3s;
}

.footer__button:hover {
    background: #ea580c;
}
</style>