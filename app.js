document.addEventListener('DOMContentLoaded', function () {
    displayTask();
});

function displayTask() {
    const todo = document.getElementById('data_todo');
    todo.innerHTML = '';

    fetch('backend.php')
        .then(response => response.json())
        .then(data => {
            data.forEach(task => {
                const list = document.createElement('li');
                list.classList.add('text');
                list.textContent = task.task_add;

                // complete
                const spancom = document.createElement('span');
                spancom.classList.add('spancom')


                const complete = document.createElement('i');
                complete.classList.add("fa", "fa-check");


                // sampah
                const span = document.createElement('span');
                span.classList.add('spansampah')


                const sampah = document.createElement('i');
                sampah.classList.add("fa", "fa-trash");




                todo.append(list);
                list.append(spancom);
                list.append(span);
                spancom.append(complete);
                span.append(sampah);

                // console.log(task)

            });
        })
}

// nambah todo
function addTask() {
    const tambah = document.getElementById('tambah');
    const task = tambah.value.trim();
    if (task !== '') {
        fetch('backend.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    task
                }),
            })
            .then(() => {
                tambah.value = '';
                displayTask();
            });
    }
}

// check todo
function toggleTask(id) {
    fetch(`backend.php?id=${id}`, {
            method: 'PUT',
        })
        .then(() => displayTasks());
}

// delete todo
function deleteTask(id) {
    fetch(`backend.php?id=${id}`, {
            method: 'DELETE',
        })
        .then(() => displayTasks());
}