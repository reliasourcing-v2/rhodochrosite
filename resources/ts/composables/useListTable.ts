export default function useListTable(form) {
  function updateList(event) {
    const keys = Object.keys(event.form);
    switch (event.action) {
      case "create":
        keys.forEach((key) => {
          form[key].push(event.form[key]);
        });
        break;
      case "edit":
        keys.forEach((key) => {
          form[key][event.selectedIndex] = event.form[key];
        });
        break;
      case "delete":
        keys.forEach((key) => {
          form[key].splice(event.selectedIndex, 1);
        });
        break;
      case "reorder":
        keys.forEach((key) => {
          form[key] = event.order.map((order) => {
            return form[key][order];
          });
        });
        break;
    }
  }
  return {
    updateList,
  };
}
