<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . "/app/Core/Database.php";

// 2. Charger les INTERFACES (Darouriya 9bel Task)
require_once __DIR__ . "/app/Interfaces/Assignable.php";
require_once __DIR__ . "/app/Interfaces/Prioritizable.php";
require_once __DIR__ . "/app/Interfaces/Commentable.php";

// 3. Charger les CLASSES PARENTES (Abstract)
require_once __DIR__ . "/app/Entities/TeamMember.php";
require_once __DIR__ . "/app/Entities/Task.php";

// 4. Charger les CLASSES CONCRÈTES (Enfants)
require_once __DIR__ . "/app/Entities/Developer.php";
require_once __DIR__ . "/app/Entities/Manager.php";
require_once __DIR__ . "/app/Entities/FeatureTask.php";
require_once __DIR__ . "/app/Entities/BugTask.php";

// Utilisation des Namespaces bach PHP i-3raf l-classe fine kayna
use App\Core\Database;
use App\Entities\Developer;
use App\Entities\Manager;
use App\Entities\FeatureTask;
use App\Entities\BugTask;
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

// --- TEST 3: Task Hierarchy ---
echo "\n3. Testing Task Hierarchy:\n";
try {
    $feature = new FeatureTask("Login", 1, 1,"Desc");
    if ($feature instanceof \App\Entities\Task) echo "   ✅ PASS: FeatureTask extends Task\n";
    if ($feature instanceof \App\Interfaces\Assignable) echo "   ✅ PASS: Implements Assignable\n";
} catch (Exception $e) { echo "   ❌ FAIL: " . $e->getMessage() . "\n"; 
}
// --- TEST 4: Abstract Check ---
echo "\n4. Testing Abstract Prevention:\n";
try {
    $task = new \App\Entities\Task("Error", "Error", 1, 1);
} catch (Error $e) { echo "   ✅ PASS: Cannot instantiate abstract class\n"; }

echo "\n=== VALIDATION COMPLETE ===\n";