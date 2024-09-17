# CatroServ Programming Language Documentation

### Introduction
CatroServ's programming language is designed to be simple and efficient for use in a webserver environment. Each command is written on a single line, with parameters separated by commas and commands ending with a semicolon (`;`). The language offers control flow, variable manipulation, and basic mathematical operations.

---

## 1. Syntax Overview

- Each instruction is written in the format:  
  `COMMAND,ARG1,ARG2,...;`
- Statements are separated by semicolons (`;`).
- Values are either numbers or variables.
  
Example:

```
SET,x,5;
MUL,x,2;
PRINT,x;
```

---

## 2. Commands Reference

### 2.1. Variable Commands

| Command | Description | Syntax | Example |
| ------- | ----------- | ------ | ------- |
| `SET`   | Assign a value to a variable | `SET,var,value;` | `SET,x,5;` |
| `RAND`  | Set a variable to a random float between two values | `RAND,var,min,max;` | `RAND,x,0.0,1.0;` |
| `MUL`   | Multiply the value of a variable | `MUL,var,multiplier;` | `MUL,x,10;` |
| `ADD`   | Add a value to a variable | `ADD,var,value;` | `ADD,x,2;` |
| `SUB`   | Subtract a value from a variable | `SUB,var,value;` | `SUB,x,1;` |
| `DIV`   | Divide a variable by a value | `DIV,var,value;` | `DIV,x,2;` |

---

### 2.2. Control Flow Commands

#### 2.2.1. IF
Executes a block of code if a condition is true.

**Syntax**:

```
IF,var,comparator,value;
...code...
ENDIF;
```

- **Comparators**:
  - `EQ`: Equal to
  - `GT`: Greater than
  - `LT`: Less than

**Example**:

```
SET,x,5;
IF,x,GT,2;
PRINT,x;
ENDIF;
```

#### 2.2.2. ELSE
Used with `IF` to provide an alternative block of code if the condition is false.

**Syntax**:

```
IF,var,comparator,value;
...code...
ELSE;
...code...
ENDIF;
```

**Example**:

```
IF,x,GT,5;
PRINT,"Greater than 5";
ELSE;
PRINT,"Not greater than 5";
ENDIF;
```

---

### 2.3. Output Commands

#### PRINT
Outputs a string or a variable value.

**Syntax**:

```
PRINT,value;
```

- **value**: Can be a string (doesn't matter if it has quotes or not) or a variable name.

**Example**:

```
PRINT,Hello World!;
PRINT,x;
```

---

## 3. Example Programs

### 3.1. Random Number Program
This program generates a random number between 0 and 10 and prints whether it is greater than 5.

```
RAND,x,0.0,1.0;
MUL,x,10;
IF,x,GT,5;
PRINT,x is greater than 5;
ELSE;
PRINT,x is 5 or less;
ENDIF;
```

### 3.2. Basic Arithmetic
A simple program that performs arithmetic operations on a variable.

```
SET,x,10;
ADD,x,5;
MUL,x,2;
PRINT,x;  # Output will be 30
```

---

## 4. Best Practices

- **Variable Naming**: Use short but descriptive variable names. For example, `x`, `y`, or `count`. This is to avoid lagging the interpreter alongside increasing readibilty.
- **Error Handling**: Ensure all commands are correctly formatted with commas and semicolons.
- **Avoiding Infinite Loops**: Ensure your control flow commands have proper conditions to avoid infinite loops.

---

## 5. Debugging Tips

- **Missing Semicolons**: Make sure every command ends with a semicolon (`;`). The interpreter uses this to tokenize the code.
- **Variable Initialization**: Ensure variables are assigned before using them in mathematical operations or conditions.
- **Nested IF Blocks**: Avoid excessive nesting of `IF` blocks, as it can make the code harder to read and debug.