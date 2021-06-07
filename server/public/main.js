const toDoForm = document.querySelector('.new-to-do-form');

fetch('/api/todos')
  .then(response => console.log(response));

toDoForm.addEventListener('submit', event => {
  event.preventDefault();
  const todo = {
    task: event.target.value,
    isCompleted: false
  };
  const init = {
    method: "POST",
    headers: {"Content-Type": "application/json"},
    body: JSON.stringify(todo)
  }
  fetch('/api/todos', init).then(response => console.log(response));
});
