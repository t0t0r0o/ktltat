-- Tạo bảng register
CREATE TABLE register (
    student_id INT,
    student_name VARCHAR(50),
    subject_id INT,
    subject_name VARCHAR(50),
    score FLOAT
);

-- Chèn dữ liệu vào bảng register
INSERT INTO register (student_id, student_name, subject_id, subject_name, score) VALUES
(1, 'John', 101, 'Mathematics', 85.5),
(2, 'Alice', 102, 'Physics', 78.0),
(3, 'Bob', 103, 'Chemistry', 91.2),
(4, 'Emma', 104, 'Biology', 79.8),
(5, 'Michael', 105, 'History', 88.6);


-- Tạo bảng subject
CREATE TABLE subject (
    subject_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    number_of_credit INT
);

-- Chèn dữ liệu vào bảng subject
INSERT INTO subject (name, number_of_credit) VALUES
('Mathematics', 4),
('Physics', 3),
('Chemistry', 3),
('Biology', 4),
('History', 3);



-- Tạo bảng user
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    role_id INT,
    birthday DATE,
    gender ENUM('Male', 'Female', 'Other')
);

-- Chèn dữ liệu vào bảng user
INSERT INTO user (name, username, password, role_id, birthday, gender) VALUES
('John Doe', 'john_doe', 'hashed_password_here', 1, '1990-05-15', 'Male'),
('Alice Smith', 'alice_smith', 'hashed_password_here', 2, '1992-08-21', 'Female'),
('Bob Johnson', 'bob_johnson', 'hashed_password_here', 2, '1985-12-10', 'Male'),
('Emma Brown', 'emma_brown', 'hashed_password_here', 3, '1988-04-03', 'Female');

