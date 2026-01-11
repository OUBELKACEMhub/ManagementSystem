<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


error_reporting(E_ALL);
ini_set('display_errors', '1');

// Importations précises pour éviter les erreurs "Class not found"
use App\Core\Database;
use App\Entities\Developer;
use App\Entities\Manager;
use App\Entities\FeatureTask;
use App\Entities\BugTask;

// 1. Noyau
require_once __DIR__ . "/app/Core/Database.php";

// 2. Interfaces (Indispensables pour Task)
require_once __DIR__ . "/app/Interfaces/Assignable.php";
require_once __DIR__ . "/app/Interfaces/Prioritizable.php";
require_once __DIR__ . "/app/Interfaces/Commentable.php";

// 3. Classes Abstraites (Parents)
require_once __DIR__ . "/app/Entities/TeamMember.php";
require_once __DIR__ . "/app/Entities/Task.php"; // <--- Il manquait celui-là

// 4. Classes Concrètes (Enfants)
require_once __DIR__ . "/app/Entities/Developer.php";
require_once __DIR__ . "/app/Entities/Manager.php";
require_once __DIR__ . "/app/Entities/BugTask.php";
require_once __DIR__ . "/app/Entities/FeatureTask.php";


echo "=== TASKFLOW PART 1: ARCHITECTURE VALIDATION ===\n\n";

// --- TEST 1: Singleton ---
echo "1. Testing Singleton Database:\n";
try {
    $db1 = Database::getInstance();
    $db2 = Database::getInstance();
    if ($db1 === $db2) {
        echo "   ✅ PASS: Singleton works correctly\n";
    }
} catch (Exception $e) { echo "   ❌ FAIL: " . $e->getMessage() . "\n"; }

// --- TEST 2: Membres ---
echo "\n2. Testing Inheritance Hierarchy (Members):\n";
try {
    $developer = new Developer("john_dev", "john@company.com", "pass123", 1);
    $manager = new Manager("jane_manager", "jane@company.com", "pass123", 1);
    
    if ($developer instanceof \App\Entities\TeamMember) echo "   ✅ PASS: Developer extends TeamMember\n";
    echo "   Developer can create project: " . ($developer->canCreateProject() ? 'Yes' : 'No') . " (Expected: No)\n";
} catch (Exception $e) { echo "   ❌ FAIL: " . $e->getMessage() . "\n"; }

// --- TEST 3: Tasks ---
echo "\n3. Testing Task Hierarchy:\n";
try {
    $feature = new FeatureTask("Login", "Desc", 1, 1);
    if ($feature instanceof \App\Entities\Task) echo "   ✅ PASS: FeatureTask extends Task\n";
    if ($feature instanceof \App\Interfaces\Assignable) echo "   ✅ PASS: Implements Assignable\n";
} catch (Exception $e) { echo "   ❌ FAIL: " . $e->getMessage() . "\n"; }

// // --- TEST 4: Abstract Check ---
// echo "\n4. Testing Abstract Prevention:\n";
// try {
//     $task = new \App\Entities\Task("Error", "Error", 1, 1);
// } catch (Error $e) { echo "   ✅ PASS: Cannot instantiate abstract class\n"; }

// echo "\n=== VALIDATION COMPLETE ===\n";