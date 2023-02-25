<script>
export default {
    data() {
        return {
            errors: {}
        }
    },
    methods: {
        state: function (field) {
            let errors = this.errors;
            if (!errors.hasOwnProperty(field)) {
                return;
            }
            return false;
        },
        invalidFeedback: function (field) {
            let errors = this.errors;
            if (!errors.hasOwnProperty(field)) {
                return;
            }
            let errHtml = '';
            errors[field].forEach(function (error) {
                errHtml += error;
            });
            return errHtml;
        },
        toPrice: function (value) {
            return Number(value.replace(/[^0-9]/g, '')).toLocaleString();
        }
    },
}
</script>
