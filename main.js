function add(num1, num2) {
    return num1 + num2;
}
  
function subtract(num1, num2) {
    return num1 - num2;
}
  
function multiply(num1, num2) {
return num1 * num2;
}
  
function divide(num1, num2) {
if (num2 !== 0) {
    return num1 / num2;
} else {
    return "Error: Cannot divide by zero";
}
}
  
console.log("Calculator");
console.log("1. Addition");
console.log("2. Subtraction");
console.log("3. Multiplication");
console.log("4. Division");

const choice = prompt("Enter your choice (1-4):");

if (choice === '1' || choice === '2' || choice === '3' || choice === '4') {
  const num1 = parseFloat(prompt("Enter the first number:"));
  const num2 = parseFloat(prompt("Enter the second number:"));

  if (choice === '1') {
    console.log("Result:", add(num1, num2));
  } else if (choice === '2') {
    console.log("Result:", subtract(num1, num2));
  } else if (choice === '3') {
    console.log("Result:", multiply(num1, num2));
  } else {
    console.log("Result:", divide(num1, num2));
  }
} else {
  console.log("3");
}