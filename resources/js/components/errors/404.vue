<template>
    <div>
        <section class="content-page mt-5 pt-5">
            <div class="error-page">
                <h2 class="headline text-warning"> 404</h2>
                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>
                    <p>
                        We could not find the page you were looking for.
                        Meanwhile, you may <b-link to="/">return to dashboard</b-link> or try using the search form.
                    </p>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name:'PageNotFound',
}
</script>
