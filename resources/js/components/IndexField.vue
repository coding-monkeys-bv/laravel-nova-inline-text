<template>
    <input
        @click.stop
        :id="field.name + field.id"
        :type="field.type"
        class="w-full form-control form-input form-input-bordered inline-text-field"
        :placeholder="field.name"
        v-model="field.value"
        @blur="save"
        @keyup.enter="save"
        :style="'min-width:'+field.minWidth+'px;'"
    />
</template>

<script>
export default {
    props: ['resourceName', 'field'],

    data() {
        return {
            loading: false,
        }
    },

    methods: {
        save() {
            var vm = this;
            if (this.value != this.field.value) {
                if (!this.loading) {

                    Nova.request().post(`/inline-text/update/${this.resourceName}`, {
                        id: this.field.id,
                        attribute: this.field.attribute,
                        value: this.value
                    }).then (function (response) {
                        vm.loading = false
                        vm.field.value = vm.value 

                        Nova.success(vm.field.successMessage);
                    }).catch (function (error) {
                        vm.loading = false

                        if (error.response.status == 422) { 
                            let validationErrors = [];

                            error.response.data.errors.value.forEach(function (errorMessage) {
                                validationErrors.push(errorMessage.replace('value', vm.field.name));
                            });

                            Nova.error(validationErrors.join('<br>'));
                        }
                    })
                }
                this.loading = true;
            }
        },

        setInitialValue() {
            this.value = String(this.field.value) || ''
        },

        fill(formData) {
            formData.append(this.field.attribute, this.value || '')
        },

        handleChange(value) {
            this.value = value
        },
    },
}
</script>