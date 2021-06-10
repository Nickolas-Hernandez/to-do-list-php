const form = document.querySelector('.new-to-do-form');
const toDosContainer = document.querySelector('.to-dos-container');
const tasks = document.querySelectorAll('.task');
let lastIndex = parseInt(tasks[tasks.length - 1].id);

function handleNewTodo(task) {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', '../src/create-todo.php?task=' + task);
  xhr.send();
}

function appendNewTodo(task) {
  const container = document.createElement('div');
  container.setAttribute('class', 'task');
  container.setAttribute('id', lastIndex + 1);
  const taskWrapper = document.createElement('p');
  taskWrapper.append(task);
  container.appendChild(taskWrapper);
  const checkIcon = document.createElement('i');
  checkIcon.setAttribute('class', 'fas fa-check-square completed-todo');
  container.appendChild(checkIcon);
  toDosContainer.appendChild(container);
  lastIndex++;
}

function updateDatabase(id, status) {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', `../src/complete-todo.php?id=${id}&isCompleted=${status}`);
  xhr.send();
}

// updateClassName(parent, status) {
//   parent.classList.toggle('completed');
// }


form.addEventListener('submit', event => {
  event.preventDefault();
  const task = event.target.querySelector(".new-to-do-input").value;
  if(task === '') return;
  handleNewTodo(task);
  appendNewTodo(task);
  event.target.querySelector(".new-to-do-input").value = '';
});

toDosContainer.addEventListener('click', event => {
  if(event.target.tagName !== "I") return;
  const parent = event.target.parentElement;
  console.log(parent);
  const id = parent.id;
  console.log(id);
  const isCompleted = parent.classList.contains("completed") ? "true" : "false";
  console.log(isCompleted);
  updateDatabase(id, isCompleted);
  // updateClassName(parent, isCompleted);
});
