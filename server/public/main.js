const form = document.querySelector('.new-to-do-form');
const toDosContainer = document.querySelector('.to-dos-container');
const tasks = document.querySelectorAll('.task');

function handleNewTodo(task) {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', '../src/create-todo.php?task=' + task);
  xhr.send();
}

function appendNewTodo(task) {
  let lastIndex = parseInt(tasks[tasks.length - 1].id);
  const container = document.createElement('div');
  container.setAttribute('class', 'task');
  container.setAttribute('id', lastIndex + 1);
  const taskWrapper = document.createElement('p');
  taskWrapper.append(task);
  container.appendChild(taskWrapper);
  toDosContainer.appendChild(container);
  lastIndex++;
}

form.addEventListener('submit', event => {
  event.preventDefault();
  const task = event.target.querySelector(".new-to-do-input").value;
  handleNewTodo(task);
  appendNewTodo(task);
});
