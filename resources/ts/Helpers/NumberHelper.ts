const numberonly = (e : any) => {
    e = e ? e : window.event;
    const charCode = e.which ? e.which : e.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        e.preventDefault();
    } else {
        return true;
    }
};

const formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'PHP',
});

export { numberonly, formatter }