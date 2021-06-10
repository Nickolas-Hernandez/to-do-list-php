const form = document.querySelector('.new-to-do-form');
const toDosContainer = document.querySelector('.to-dos-container');
const tasks = document.querySelectorAll('.task');
let lastIndex = tasks.length === 0 ? 0 : parseInt(tasks[tasks.length - 1].id);


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
  checkIcon.setAttribute('class', 'fas fa-check-square check-icon');
  const deleteIcon = document.createElement("i");
  deleteIcon.setAttribute("class", "fas fa-minus-square delete-icon");
  container.appendChild(checkIcon);
  container.appendChild(deleteIcon);
  toDosContainer.appendChild(container);
  lastIndex++;
}

function updateTask(id, status) {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', `../src/complete-todo.php?id=${id}&isCompleted=${status}`);
  xhr.send();
}

function updateClassName(parent, status) {
  parent.classList.toggle('completed');
}

function deleteTask(id){
  const xhr = new XMLHttpRequest();
  xhr.open('GET', '../src/delete-todo.php?id=' + id);
  xhr.send();
}

function removeFromDOM(id){
  const task = document.getElementById(id);
  console.log(task);
  task.remove();
}

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
  const id = parent.id;
  if(event.target.classList.contains("check-icon")){
    const isCompleted = parent.classList.contains("completed")
      ? "true"
      : "false";
    updateTask(id, isCompleted);
    updateClassName(parent, isCompleted);
  }else if(event.target.classList.contains('delete-icon')){
    deleteTask(id);
    console.log('id:', id);
    removeFromDOM(id);
  }
});
