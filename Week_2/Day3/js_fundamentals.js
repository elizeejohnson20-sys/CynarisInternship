// Week 2 - Day 3: JavaScript Fundamentals

// 1. Arrow Function
const add = (a, b) => a + b;

console.log("1. Addition:", add(10, 20));

// 2. Default Parameter
const greet = (name = "Guest") => {
    return `Hello, ${name}!`;
};

console.log("2. Greeting:", greet());
console.log("   Greeting with name:", greet("Elizabeth"));

// 3. Rest Parameter
const calculateSum = (...numbers) => {
    return numbers.reduce((total, number) => total + number, 0);
};

console.log("3. Sum:", calculateSum(10, 20, 30, 40));

// 4. Spread Operator
const firstNumbers = [1, 2, 3];
const secondNumbers = [4, 5, 6];

const combinedNumbers = [...firstNumbers, ...secondNumbers];

console.log("4. Combined Array:", combinedNumbers);


// 5. Array map()
const doubleNumbers = numbers => {
    return numbers.map(number => number * 2);
};

console.log("5. Doubled Numbers:", doubleNumbers([1, 2, 3, 4, 5]));

// 6. Object Destructuring
const student = {
    name: "Elizabeth",
    course: "BCA",
    age: 20
};

const displayStudent = ({ name, course }) => {
    return `${name} is studying ${course}`;
};

console.log("6. Student:", displayStudent(student));

// 7. Array filter()
const getEvenNumbers = numbers => {
    return numbers.filter(number => number % 2 === 0);
};

console.log("7. Even Numbers:", getEvenNumbers([1, 2, 3, 4, 5, 6]));

// 8. Callback Function
const processNumber = (number, callback) => {
    return callback(number);
};

const square = number => number * number;

console.log("8. Square:", processNumber(5, square));

// 9. Promise with .then() and .catch()
const checkNumber = number => {
    return new Promise((resolve, reject) => {
        if (number > 0) {
            resolve(`${number} is a positive number`);
        } else {
            reject(`${number} is not a positive number`);
        }
    });
};

checkNumber(10)
    .then(result => {
        console.log("9. Promise:", result);
    })
    .catch(error => {
        console.log("9. Promise Error:", error);
    });

    // 10. Async/Await with Fetch API and Error Handling
const fetchUsers = async () => {
    try {
        const response = await fetch(
            "https://jsonplaceholder.typicode.com/users"
        );

        if (!response.ok) {
            throw new Error(`HTTP error: ${response.status}`);
        }

        const users = await response.json();

        console.log("10. Users from API:");

        users.forEach(user => {
            console.log(`${user.id}. ${user.name} - ${user.email}`);
        });
    } catch (error) {
        console.log("10. API Error:", error.message);
    }
};

fetchUsers();