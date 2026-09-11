// Select HTML elements
const todoForm = document.querySelector("#todoForm");
const todoInput = document.querySelector("#todoInput");
const todoList = document.querySelector("#todoList");

// Load saved tasks from localStorage
let todos = JSON.parse(localStorage.getItem("todos")) || [];

// Save tasks to localStorage
const saveTodos = () => {
    localStorage.setItem("todos", JSON.stringify(todos));
};

// Display all tasks
const renderTodos = () => {
    // Remove existing list items
    while (todoList.firstChild) {
        todoList.removeChild(todoList.firstChild);
    }

    // Create each task dynamically
    todos.forEach((todo) => {
        const li = document.createElement("li");

        li.dataset.id = todo.id;

        if (todo.completed) {
            li.classList.add("completed");
        }

        const taskText = document.createElement("span");
        taskText.textContent = todo.text;

        const completeButton = document.createElement("button");
        completeButton.textContent = todo.completed
            ? "Undo"
            : "Complete";
        completeButton.classList.add("complete-btn");

        const deleteButton = document.createElement("button");
        deleteButton.textContent = "Delete";
        deleteButton.classList.add("delete-btn");

        li.appendChild(taskText);
        li.appendChild(completeButton);
        li.appendChild(deleteButton);

        todoList.appendChild(li);
    });
};

// Add a new task
todoForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const taskText = todoInput.value.trim();

    if (taskText === "") {
        alert("Please enter a task.");
        return;
    }

    const newTodo = {
        id: Date.now(),
        text: taskText,
        completed: false
    };

    todos.push(newTodo);

    saveTodos();
    renderTodos();

    todoInput.value = "";
    todoInput.focus();
});

// Event delegation for dynamically created buttons
todoList.addEventListener("click", (event) => {
    const clickedButton = event.target;

    const li = clickedButton.closest("li");

    if (!li) {
        return;
    }

    const todoId = Number(li.dataset.id);

    // Complete / Undo task
    if (clickedButton.classList.contains("complete-btn")) {
        todos = todos.map((todo) => {
            if (todo.id === todoId) {
                return {
                    ...todo,
                    completed: !todo.completed
                };
            }

            return todo;
        });

        saveTodos();
        renderTodos();
    }

    // Delete task
    if (clickedButton.classList.contains("delete-btn")) {
        const taskIndex = todos.findIndex(
            (todo) => todo.id === todoId
        );

        if (taskIndex !== -1) {
            todos.splice(taskIndex, 1);
        }

        saveTodos();
        renderTodos();
    }
});

// Restore saved tasks when the page loads
renderTodos();