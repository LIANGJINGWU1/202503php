<?php
require_once "../trush/20250425made/print.php";

//接口

interface ProductResource
{
    //获取产品详情
    public function show(int $id): mixed;
    //获取商品列表
    public function index(): mixed;
    //创建产品
    public function create(): mixed;
    //新增产品到数据库
    public  function store(array $product): mixed;
    //编辑页
    public  function edit(int $id): mixed;
    //更新
    public function update(int $id, array $product): mixed;
    //删除
    public function destroy(int $id): mixed;
}

class Product implements ProductResource
{
    public function show(int $id): string{
        return  "show product with id $id<br>";
    }
    public function index(): string
    {
        return "Listing all products<br>";
    }

    public function create(): string
    {
        return "Creating a new product<br>";
    }

    public function store(array $product): string
    {
        return "Storing product: " . json_encode($product) . "<br>";
    }

    public function edit(int $id): string
    {
        return "Editing product with ID: $id<br>";
    }

    public function update(int $id, array $product): string
    {
        return "Updating product with ID: $id<br>";
    }

    public function destroy(int $id): string
    {
        return "Deleting product with ID: $id<br>";
    }

    public function search(string $keyword): string
    {
        return "Searching for product with keyword: $keyword<br>";
    }
}
$product = new Product("ljw product");
$productInfo = $product->show(1);
echoWithBr($productInfo);

class Database
{
    public  static  string $host = "localhost";

    public  string $dbname = "school";

    public static string $username;

    public static string $password;

    private  static ?object $instance = null;

    private function  __construct($username, $password)
    {
        self::$username = $username;
        self::$password = $password;
    }
//    public  static function  conect($username, $password):object()
//    {
//        return self::$instance = new self($username, $password);
//    }
    //禁止克隆
    private function  __clone()
    {
        throw new Exception('Cloning is not allowed.');
    }


}
//$connection = Database::connect('root', 'password');
//varDumpWithBr($connection);
//echoWithBr(Database::$hpst);

trait Shareable
{
    public  function  share(string $name): string
    {
        return "sharing this {$name}";
    }

    protected function log(string $message): string{
        return "Logging message: $message";
    }

    abstract protected  function  getShareTitle():string;
}

class Controller
{
    //基础类
    public function  responseJson(array $data, int $status = 200, string $message = 'message'): string
    {
        return json_encode([
            'status' => 200,
            'message' => $data,
            'data' => $data,
        ]);
    }
}
class Post extends Controller
{
    use shareable;

    public function getShareTitle(): string
    {
        // TODO: Implement getShareTitle() method.
        return "已分享";
    }
    public function getShare():string
    {
        return $this->share("卫生安全");
    }

    //获取post详情



    public function  show():string
    {
        $post = [
        'id' => 1,
        'title' => 'hellow',
        'content' => 'this is a simple post',
        ];
    return $this->responseJson($post);
    }
}

$post = new Post();
echowithBr($post->getShare());
echoWithBr($post->share());

class TextMagic
{
    public string $name = "TestMagic";

    public function __construct()
    {
        echo "constructio<br>";
    }

    //当 PHP 试图访问一个不存在的方法时, 会自动调用 __call() 方法

    public  function  __call(string $name, array $arguments)
    {
        echoWithBr("你正在尝试访问一个不存在的方法: $name 这时 __call 会被自动调用");
        echo "method $name not exists<br>";
    }

    public static function  __callStatic($name, $arguments)
    {
        echo "static method $name not exists<br>";
    }

    public function __get($name)
    {
        echo "Getting property '$name'<br>";
        return $this->name;
    }

    public function __set($name, $value)
    {
        echo "Setting property '$name' to '$value'<br>";
        $this->name = $value;
    }

    public function __isset($name)
    {
        echo "Checking if property '$name' is set<br>";
        return isset($this->$name);
    }

    public function __unset($name)
    {
        echo "Unsetting property '$name'<br>";
        unset($this->$name);
    }
}

$testMagic = new TextMagic();
$testMagic->nonExistentMethod("arg1",  "arg2");
$testMagic->nonExistentProp = "这里是东京啊!";
unset($testMagic->nonExistentProp);

//接口


// 定义一个可记录日志的接口
interface Loggable
{
// 定义一个 log 方法签名，所有实现者都必须有这个方法
    public function log(string $message): void;
}

// 定义另一个接口，表示可以被序列化为字符串
interface StringSerializable
{
    public function __toString(): string; // 使用了魔术方法签名
}

// FileLogger 类实现了 Loggable 接口
class FileLogger implements Loggable
{
    private $logFile;

    public function __construct(string $filename)
    {
        $this->logFile = $filename;
    }

// 必须实现接口中定义的 log 方法
    public function log(string $message): void
    {
        $timestamp = date('Y-m-d H:i:s');
        file_put_contents($this->logFile, "[{$timestamp}] " . $message . PHP_EOL, FILE_APPEND);
        echo "消息已记录到文件 {$this->logFile}\n";
    }
}

// DatabaseLogger 类也实现了 Loggable 接口
class DatabaseLogger implements Loggable
{
    private $pdo; // 假设有 PDO 连接

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

// 实现 log 方法，将日志写入数据库
    public function log(string $message): void
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO logs (message, created_at) VALUES (:msg, NOW())");
            $stmt->execute([':msg' => $message]);
            echo "消息已记录到数据库\n";
        } catch (PDOException $e) {
            echo "数据库日志记录失败: " . $e->getMessage() . "\n";
        }
    }
}

// User 类同时实现了 Loggable 和 StringSerializable 接口
class User implements Loggable, StringSerializable
{
    public string $name;
    private Loggable $logger; // 类型提示为接口，可以是任何实现 Loggable 的对象

    public function __construct(string $name, Loggable $logger)
    { // 依赖注入 Logger
        $this->name = $name;
        $this->logger = $logger;
        $this->log("User '{$this->name}' created.");
    }

// 实现 Loggable 接口的 log 方法 (委托给内部 logger)
    public function log(string $message): void
    {
        $this->logger->log($message);
    }

// 实现 StringSerializable 接口的 __toString 方法
    public function __toString(): string
    {
        return "User(name={$this->name})";
    }
}

// --- 使用 ---
// $pdo = new PDO(...); // 假设已连接数据库
// $dbLogger = new DatabaseLogger($pdo);
$fileLogger = new FileLogger('app.log');

// 创建 User 对象，可以传入 FileLogger 或 DatabaseLogger
$user1 = new User('Alice', $fileLogger); // 使用文件日志
// $user2 = new User('Bob', $dbLogger); // 使用数据库日志

echo $user1; // 调用 $user1 的 __toString() 方法，输出: User(name=Alice)

//后端静态绑定
//当涉及到继承时，self:: 的行为有时可能不符合预期。self:: 总是指向定义该方法的类，而不是调用该方法的类。
//static:: 关键字解决了这个问题，它指向运行时实际调用该方法的类。

class ParentClass
{
    protected static string $name = 'Parent';

    public static function whoAreYouSelf(): void
    {
        echo self::$name . "\n"; // self:: 总是指向 ParentClass
    }

    public static function whoAreYouStatic(): void
    {
        echo static::$name . "\n"; // static:: 指向调用时的类
    }
}

class ChildClass extends ParentClass
{
    protected static string $name = 'Child'; // 子类覆盖静态属性
}

ChildClass::whoAreYouSelf();  // 输出: Parent (因为 whoAreYouSelf 在 ParentClass 定义，self 指向 ParentClass)
ChildClass::whoAreYouStatic(); // 输出: Child  (因为 static 指向运行时调用的类 ChildClass)

//对象比较

class SimpleBox {
    public $value;
    public function __construct($value)
    {
        $this->value = $value;
    }
}

$box1 = new SimpleBox(10);
$box2 = new SimpleBox(10);
$box3 = new SimpleBox(20);
$box4 = $box1; // $box4 指向 $box1，同一个对象

var_dump($box1 == $box2);  // 输出: bool(true)  (类相同，属性值相同)
var_dump($box1 === $box2); // 输出: bool(false) (不是同一个实例)

var_dump($box1 == $box3);  // 输出: bool(false) (属性值不同)
var_dump($box1 === $box3); // 输出: bool(false)

var_dump($box1 == $box4);  // 输出: bool(true)  (指向同一个对象，当然相等)
var_dump($box1 === $box4); // 输出: bool(true)  (指向同一个实例)
