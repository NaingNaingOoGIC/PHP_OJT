<?php
function dbConnect()
{
    $db = null;
    try {
        $db = new PDO('mysql:dbhost=localhost;dbname=student_registration_system', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ]);
        return $db;
    } catch (PDOException $e) {
        return "cannot connect " . $e->getMessage();
    }
}

function checkLogin($email, $password)
{
    $db = dbConnect();
    if (is_string($db)) {
        return "db connect fail";
    } else {
        $sql = "SELECT * FROM admin WHERE email=? and password= ?";
        $statement = $db->prepare($sql);
        $statement->execute([$email, $password]);
        $result = $statement->fetch();
        return $result;
    }
}
function search($date)
{
    $db = dbConnect();
    if (is_string($db)) {
        return "db connect fail";
    } else {
        $sql = "SELECT * FROM student WHERE reg_date=?";
        $statement = $db->prepare($sql);
        $statement->execute([$date]);
        $result = $statement->fetchAll();
        return $result;
    }
}
function readAll()
{
    $db = dbConnect();
    if (is_string($db)) {
        return "db connect fail";
    } else {
        $statement = $db->query("SELECT * FROM student");
        $result = $statement->fetchAll();
        return $result;
    }
}
function checkRollNO($rollno)
{
    $db = dbConnect();
    if (is_string($db)) {
        return "db connect fail";
    } else {
        $sql = "SELECT * FROM student WHERE rollno=?";
        $statement = $db->prepare($sql);
        $statement->execute([$rollno]);
        $result = $statement->fetch();
        return $result;
    }
}
function addStudent($name, $rollno, $age, $regDate)
{
    $db = dbConnect();
    if (is_string($db)) {
        return "db connect fail";
    } else {
        $sql = "INSERT INTO student (id, name, rollno, age,reg_date) VALUES (NULL, :name, :rollno, :age,:reg_date)";
        $statement = $db->prepare($sql);
        $addResult = $statement->execute([
            ':name' => $name,
            ':rollno' => $rollno,
            ':age' => $age,
            ':reg_date' => $regDate
        ]);
        return $addResult;
    }
}
function allRollNo()
{
    $db = dbConnect();
    if (is_string($db)) {
        return "db connect fail";
    } else {
        $statement = $db->query("SELECT rollno FROM student");
        $result = $statement->fetchAll();
        return $result;
    }
}
function updateStudent($name, $rollno, $age)
{
    $db = dbConnect();
    if (is_string($db)) {
        return "db connect fail";
    } else {
        $sql = "UPDATE student SET name=:name,age=:age WHERE rollno = :rollno";
        $statement = $db->prepare($sql);
        $updateResult = $statement->execute([
            ':name' => $name,
            ':rollno' => $rollno,
            ':age' => $age,
        ]);
        return $updateResult;
    }
}
function delete($id)
{
    $db = dbConnect();
    if (is_string($db)) {
        return "db connect fail";
    } else {
        $sql = "DELETE FROM student WHERE id =" . $id;
        $statement = $db->prepare($sql);
        $delete = $statement->execute();
        return $delete;
    }
}
