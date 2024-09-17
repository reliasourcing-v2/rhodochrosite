import { useForm } from "@inertiajs/vue3";
import { watch } from "vue";
export default function usePRXForm(formData, submitUrl) {
  const form = useForm(formData);

  watch(
    () => Object.keys(formData).map((key) => form[key]),
    (val, oldVal) => {
      for (let i = 0; i < val.length; i++) {
        if (val[i] !== oldVal[i]) {
          form.errors[Object.keys(formData)[i]] = null;
        }
      }
    },
    { deep: true }
  );

  function submit() {
    form.post(submitUrl);
  }

  return {
    form,
    submit,
  };
}
