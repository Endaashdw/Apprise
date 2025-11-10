//Matthew Bibaoco - 11/04/2025
document.addEventListener('DOMContentLoaded', function () {
    const editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const status = button.getAttribute('data-status');
        const description = button.getAttribute('data-description');
        const category = button.getAttribute('data-category');

        document.getElementById('task_id').value = id;
        document.getElementById('task_name').value = name;
        document.getElementById('task_status').value = status;
        document.getElementById('description').value = description;
        document.getElementById('category').value = category;
    });
});