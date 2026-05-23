<template>
    <section class="how-i-work">
        <div class="how-i-work_grid">
            <div class="how-i-work_column">
                <div class="how-i-work_title">Подход к задачам</div>
                <p>К любой задаче подхожу <b>системно</b>. Сначала погружаюсь в суть — что делать, зачем, какие
                    ограничения.
                <p>Если задача <b>простая</b> — включаюсь и пишу. </p>
                <p>Если <b>сложная</b> - сначала рисую архитектуру и делю на подзадачки.</p>
                <p>Код создаю по шагам: сначала заставляю работать, потом привожу в порядок.</p>
                <p><b>Мой принцип:</b> простое работающее решение всегда лучше идеального, но недоделанного.</p>
                </p>
            </div>
            <div class="how-i-work_column">
                <div class="how-i-work_title">Как я использую AI в работе</div>
                <p>Простой код пишу сама — это быстрее, чем объяснять задание. AI включаю там, где он реально
                    экономит
                    время:</p>
                <ul>
                    <li><strong>Сложная логика и архитектура</strong> — обсуждаю подходы, оцениваю варианты</li>
                    <li><strong>Незнакомая технология</strong> — изучаю документацию вместе с AI</li>
                    <li><strong>Рутина</strong> — генерирую однотипный код</li>
                    <li><strong>Дебаг</strong> — AI помогает посмотреть на проблему иначе</li>
                    <li><strong>Рефакторинг</strong> — проверяю код на чистоту</li>
                </ul>
            </div>
        </div>

    </section>
</template>

<script setup>
</script>

<style scoped>
.how-i-work {
    padding: 3rem 2rem;
    max-width: 1200px;
    margin: 0 auto;
}

.how-i-work_grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    margin-top: 2rem;
}

.how-i-work_column {
    color: var(--primary-color);
    margin-bottom: 1rem;
    background: #efeff0;
    padding: 2rem;
    border-radius: 20px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.how-i-work_title {
    display: block;
    text-align: center;
    font-weight: 600;
    margin: 5px 0 1rem 0;
    font-size: 25px;
    padding: 10px 30px;
}
</style>