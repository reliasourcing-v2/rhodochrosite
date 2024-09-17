import { useForm } from "@inertiajs/vue3";
import { watch } from "vue";
export default function usePRXCRMForm(page, schema, submitUrl) {
  const formData = buildFormData(page, schema);
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
    form.post(submitUrl, {
      onError: (errors) => {
        document.getElementById(Object.keys(errors)[0]).scrollIntoView();
      },
    });
  }

  return {
    form,
    submit,
  };
}

function buildFormData(page, schema) {
  let data = {
    title: page.title || null,
    description: page.description || null,
    keywords: page.keywords || null,
    og_image_path: page.og_image_path || null,
    robots_follow: page.robots_follow || true,
    robots_index: page.robots_index || true,
  };
  schema.sections.forEach((section) => {
    section.items.forEach((item) => {
      // get value from page
      const content = page.content;
      // console.log(content);
      if (item.type === "list_table") {
        // list items
        item.items.forEach((listItem) => {
          const contentId = `${section.id}_${item.id}`;
          const id = `${contentId}_${listItem.id}`;
          data[id] = [];
          if (listItem.type === "image") {
            data[`${id}_file`] = [];
          }

          if (content && content[contentId] && content[contentId].length) {
            content[contentId].forEach((contentItem) => {
              data[id].push(contentItem[listItem.id]);
              if (listItem.type === "image") {
                data[`${id}_file`].push(null);
              }
            });
          }
        });
      } else {
        // normal items
        data[`${section.id}_${item.id}`] = content
          ? content[`${section.id}_${item.id}`] || null
          : null;
      }
      if (item.type === "image") {
        data[`${section.id}_${item.id}_file`] = null;
      }
    });
  });
  return data;
}
