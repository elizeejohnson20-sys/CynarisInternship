// Select HTML elements
const expenseForm = document.querySelector("#expenseForm");
const expenseName = document.querySelector("#expenseName");
const expenseAmount = document.querySelector("#expenseAmount");
const expenseCategory = document.querySelector("#expenseCategory");
const expenseList = document.querySelector("#expenseList");
const totalAmount = document.querySelector("#totalAmount");

// Load saved expenses from localStorage
let expenses = JSON.parse(localStorage.getItem("expenses")) || [];

// Save expenses to localStorage
const saveExpenses = () => {
    localStorage.setItem("expenses", JSON.stringify(expenses));
};

// Display expenses on the page
const renderExpenses = () => {
    // Clear the existing list
    expenseList.innerHTML = "";

    // Calculate total
    const total = expenses.reduce((sum, expense) => {
        return sum + expense.amount;
    }, 0);

    totalAmount.textContent = `₹${total}`;

    // Display every expense
    expenses.forEach((expense) => {
        const li = document.createElement("li");

        const details = document.createElement("span");

        details.textContent =
            `${expense.name} - ₹${expense.amount} (${expense.category})`;

        const deleteButton = document.createElement("button");

        deleteButton.textContent = "Delete";
        deleteButton.dataset.id = expense.id;

        li.appendChild(details);
        li.appendChild(deleteButton);

        expenseList.appendChild(li);
    });
};

// Add a new expense
expenseForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const name = expenseName.value.trim();
    const amount = Number(expenseAmount.value);
    const category = expenseCategory.value;

    // Check the entered values
    if (name === "" || amount <= 0) {
        alert("Please enter valid expense details.");
        return;
    }

    // Create expense object
    const newExpense = {
        id: Date.now(),
        name: name,
        amount: amount,
        category: category
    };

    // Add expense to array
    expenses.push(newExpense);

    // Save and display
    saveExpenses();
    renderExpenses();

    // Clear form
    expenseForm.reset();
});

// Delete expense using event delegation
expenseList.addEventListener("click", (event) => {

    if (event.target.tagName !== "BUTTON") {
        return;
    }

    const expenseId = Number(event.target.dataset.id);

    expenses = expenses.filter((expense) => {
        return expense.id !== expenseId;
    });

    saveExpenses();
    renderExpenses();
});

// Restore expenses when page loads
renderExpenses();