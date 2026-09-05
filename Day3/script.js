// Day 3 - JavaScript ES6+ Basics

// 1. Object destructuring
const student = {
    name: "Elizabeth",
    course: "BCA",
    cgpa: 8.9
};

const { name, course, cgpa } = student;

const studentInfo = document.getElementById("studentInfo");

studentInfo.textContent = `${name} is studying ${course} with a CGPA of ${cgpa}.`;


// 2. Array destructuring
const skills = ["HTML", "CSS", "JavaScript"];

const [firstSkill, secondSkill, thirdSkill] = skills;

console.log(firstSkill);
console.log(secondSkill);
console.log(thirdSkill);


// 3. Arrow function
const greet = (studentName) => {
    return `Hello, ${studentName}!`;
};

console.log(greet(name));


// 4. Array of products
const products = [
    { name: "Laptop", price: 50000, category: "Electronics" },
    { name: "Phone", price: 20000, category: "Electronics" },
    { name: "Book", price: 500, category: "Education" },
    { name: "Headphones", price: 2000, category: "Electronics" }
];


// 5. filter()
const electronics = products.filter(
    (product) => product.category === "Electronics"
);

console.log("Electronics:", electronics);


// 6. map()
const productNames = products.map(
    (product) => product.name
);

console.log("Product names:", productNames);


// 7. reduce()
const totalPrice = products.reduce(
    (total, product) => total + product.price,
    0
);

console.log("Total price:", totalPrice);


// Display products on webpage
const productsContainer = document.getElementById("products");

productsContainer.innerHTML = productNames
    .map((productName) => `<p>${productName}</p>`)
    .join("");


// 8. Event listener - interactive component
const button = document.getElementById("showMessage");
const message = document.getElementById("message");

button.addEventListener("click", () => {
    message.textContent = greet(name);
});