<script>
    function toCapitalize(str) {
        return str
            .toLowerCase()
            .split(' ')
            .map(word => word.charAt(0).toUpperCase() + word.slice(1))
            .join(' ');
    }

    function toUpper(str) {
        return str.toUpperCase();
    }

    function toggleButtonState(buttonElement, isLoading) {
        const btn = $(buttonElement);
        const btnText = btn.find("#btn-text");
        const btnSpinner = btn.find("#btn-spinner");

        if (isLoading) {
            btn.prop("disabled", true);
            btnText.hide();
            btnSpinner.show();
        } else {
            btn.prop("disabled", false);
            btnText.show();
            btnSpinner.hide();
        }
    }
</script>
