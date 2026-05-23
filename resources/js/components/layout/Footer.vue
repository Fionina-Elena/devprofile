<template>
    <footer class="footer">
        <div class="footer__content">
            <div class="footer__col">
                <p class="footer__contact"><i class="fa-solid fa-phone" style="color: rgb(192, 198, 205);"></i>
                    +7 917 604-57-16</p>
                <p class="footer__mail"><i class="fa-solid fa-envelope" style="color: rgb(192, 198, 205);"></i>
                    filatowa.l2010@yandex.ru</p>
            </div>
            <div class="footer__col">
                <p class="footer__mail"><i class="fa-solid fa-paper-plane" style="color: rgb(192, 198, 205);"></i>
                    @fionina_elena98</p>
                <a href="https://github.com/Fionina-Elena" class="footer__mail footer__link" target="_blank">
                    <i class="fa-brands fa-github" style="color: rgb(192, 198, 205);"></i>
                    https://github.com/Fionina-Elena
                </a>
            </div>
            <button class="footer__button" @click="openModal">
                Связаться <i class="fa-solid fa-reply-all fa-lg" style="color: rgb(255, 255, 255);"></i>
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
    justify-content: flex-start;
    gap: 3rem;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
}

.footer__col {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.footer__contact {
    margin: 0;
}

.footer__button {
    margin-left: auto;
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

.footer__link {
    color: white;
    text-decoration: none;
    transition: opacity 0.3s;
}

.footer__link:hover {
    opacity: 0.8;
    text-decoration: underline;
}
</style>