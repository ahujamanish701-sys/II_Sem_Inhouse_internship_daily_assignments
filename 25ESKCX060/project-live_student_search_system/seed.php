<?php
require __DIR__ . '/config.php';

/*
Run this once to populate sample data:
- From CLI: php seed.php
- Or via browser if accessible.
*/

$firstNames = ['Aarav','Vihaan','Vivaan','Ananya','Diya','Ishaan','Kabir','Aadhya','Myra','Aryan','Rohan','Sneha','Rahul','Priya','Kriti','Neha','Ankit','Riya','Siddharth','Kunal'];
$lastNames  = ['Sharma','Verma','Gupta','Patel','Reddy','Iyer','Khan','Singh','Das','Ghosh','Bose','Kapoor','Mehta','Jain','Chopra','Malhotra','Bhatia','Agarwal','Tripathi','Kulkarni'];
$departments = ['Computer Science','Electronics','Mechanical','Civil','Mathematics','Physics','Chemistry','Biotechnology','Economics','English'];

$pdo = db();

$countStmt = $pdo->query("SELECT COUNT(*) AS c FROM students");
$existing = (int)$countStmt->fetch()['c'];

if ($existing > 0) {
    echo "Students already seeded: $existing\n";
    exit;
}

$pdo->beginTransaction();
try {
    $stmt = $pdo->prepare("INSERT INTO students (first_name, last_name, email, department, year_level) VALUES (?, ?, ?, ?, ?)");
    $emailSet = [];
    for ($i = 0; $i < 200; $i++) {
        $fn = $firstNames[array_rand($firstNames)];
        $ln = $lastNames[array_rand($lastNames)];
        $dept = $departments[array_rand($departments)];
        $year = random_int(1, 4);

        // Create a unique email
        $base = strtolower($fn . '.' . $ln);
        $suffix = random_int(100, 999);
        $email = $base . $suffix . '@example.edu';
        while (isset($emailSet[$email])) {
            $suffix = random_int(100, 999);
            $email = $base . $suffix . '@example.edu';
        }
        $emailSet[$email] = true;

        $stmt->execute([$fn, $ln, $email, $dept, $year]);
    }
    $pdo->commit();
    echo "Seeded 200 students.\n";
} catch (Throwable $e) {
    $pdo->rollBack();
    http_response_code(500);
    echo "Seeding failed: " . $e->getMessage() . "\n";
}

