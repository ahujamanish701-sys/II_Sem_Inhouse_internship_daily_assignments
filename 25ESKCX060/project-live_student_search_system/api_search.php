<?php
require __DIR__ . '/../config.php';
header('Content-Type: application/json');

// Read and sanitize inputs
$q = isset($_GET['q']) ? trim($_GET['q']) : '';
$department = isset($_GET['department']) ? trim($_GET['department']) : '';
$year = isset($_GET['year']) ? trim($_GET['year']) : '';
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$limit = isset($_GET['limit']) ? max(1, min(100, (int)$_GET['limit'])) : 10;
$offset = ($page - 1) * $limit;

// Build WHERE clauses with parameters
$where = [];
$params = [];

if ($q !== '') {
    // Search across first_name, last_name, email, and department
    $where[] = "(CONCAT(first_name, ' ', last_name) LIKE :q 
                 OR first_name LIKE :q 
                 OR last_name LIKE :q 
                 OR email LIKE :q 
                 OR department LIKE :q)";
    $params[':q'] = '%' . $q . '%';
}

if ($department !== '') {
    $where[] = "department = :dept";
    $params[':dept'] = $department;
}

if ($year !== '') {
    $where[] = "year_level = :year";
    $params[':year'] = (int)$year;
}

$whereSql = $where ? ('WHERE ' . implode(' AND ', $where)) : '';

// Count total
$pdo = db();
$countSql = "SELECT COUNT(*) AS c FROM students $whereSql";
$countStmt = $pdo->prepare($countSql);
foreach ($params as $k => $v) {
    $countStmt->bindValue($k, $v);
}
$countStmt->execute();
$total = (int)$countStmt->fetch()['c'];

// Fetch page
$dataSql = "SELECT id, first_name, last_name, email, department, year_level, DATE_FORMAT(created_at, '%Y-%m-%d %H:%i') AS created_at
            FROM students
            $whereSql
            ORDER BY created_at DESC, id DESC
            LIMIT :limit OFFSET :offset";
$dataStmt = $pdo->prepare($dataSql);
foreach ($params as $k => $v) {
    $dataStmt->bindValue($k, $v);
}
$dataStmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
$dataStmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
$dataStmt->execute();
$items = $dataStmt->fetchAll();

echo json_encode([
    'ok' => true,
    'total' => $total,
    'page' => $page,
    'limit' => $limit,
    'offset' => $offset,
    'items' => $items
]);

