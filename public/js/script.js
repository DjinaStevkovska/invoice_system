function updateCustomerFields(customerId) {
    const apiUrl = '/api/customer/' + customerId;

    fetch(apiUrl)
        .then((response) => response.json())
        .then((data) => {
            // console.log(data);
            for (const field of document.querySelectorAll('[data-field-name]')) {
                const fieldName = field.getAttribute('data-field-name');
                if (data[fieldName]) {
                    field.value = data[fieldName];
                }
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}

//ADD INVOICE ITEM
document.addEventListener('DOMContentLoaded', function() {
    const addButton = document.getElementById('add-invoice-item');
    const invoiceItems = document.getElementById('invoice-items');

    addButton.addEventListener('click', function() {
        // Get the prototype template and replace "__name__" with a unique index
        const prototype = invoiceItems.getAttribute('data-prototype');
        const newIndex = invoiceItems.querySelectorAll('.custom-invoice-item-form').length;
        const newForm = prototype.replace(/__name__/g, newIndex.toString());

        // add new invoice item row add it to the container
        const div = document.createElement('div');
        div.classList.add('custom-invoice-item');
        div.innerHTML = newForm;
        invoiceItems.appendChild(div);

        // remove button using event delegation
        div.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-invoice-item')) {
                div.remove();
            }
        });
    });
});