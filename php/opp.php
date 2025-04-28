<?php
require_once "../../trush/20250425made/print.php";
class Animal
{
    public string $name = "unknow";
    public int $age = 10;
    protected string $isFeed = "no";
    private ?string $idNumber = '001';
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
    public function speak():void
    {
        $name = $this->name ?? "Animal";
        echo "$name speaks<br>";
    }

    public function  setAnimalId($idNumber):void
    {
        $this->idNumber = $idNumber;
    }
    public function getAnimalId(): ?string
    {
        return $this->idNumber;
    }
}
class Car{
    public static string $power = 'engine';
    public $color = 'white';
    public $make;
    public $speed = 0;
    public function __construct(public string $brand = 'unknown', public string $model = 'unknown')
    {
        echo "car<br>";
    }

    /**
     * @return string
     */
    public  function  accelerate($amount)
    {
        $this->speed += $amount;
        echo $this->getInfo() . "加速了" . $amount . "km/h,当前速度：" . $this->speed . "km/h<br>";
    }
    public function brake($amount) {
        // 确保速度不会低于 0
        $this->speed -= $amount;
        if ($this->speed < 0) {
            $this->speed = 0;
        }
        echo $this->getInfo() . " 减速了 " . $amount . " km/h，当前速度: " . $this->speed . " km/h\n";
    }
    public function getInfo() {
        // 如果 make 或 model 未设置，给个默认值避免错误
        $make = $this->make ?? '未知品牌';
        $model = $this->model ?? '未知型号';
        return $make . " " . $model;
    }

    public function drive():void
    {
        echo "car is driving<br>";
    }
}
class Dog extends Animal{
    public ?string $maseter = 'dog';
    public static  string $species = "cat";
    public function  __construct($name, $age, $master = null)
    {
        parent::__construct($name, $age);
        $this->maseter = $master;
    }
    public function run():void{
        echo "dog is running<br>";
    }
    public function speak():void
    {
        echo "dog is speaking<br>";
    }
    public function  getParentPrivateProp(): ?string
    {
        return $this->getAnimalId();
    }
    public function showClassSelf():static{
        return $this;
    }
    public static function  getSelfStaticProp():string
    {
        //访问当前量
        return  self::$species;
    }
}
$luckyDog = new Dog('ljw', 3);
$luckyDog->speak();
echo $luckyDog->name."<br>";
echoWithBr("Animal 's isnumb:" . $luckyDog->getParentPrivateProp());

$luckyDog->setAnimalId("002-lucky");
echo $luckyDog->getParentPrivateProp();

varDumpWithBr($luckyDog->showClassSelf());
echoWithBr("这是物种1：".$luckyDog::$species);
echoWithBr("这是物种1：".$luckyDog::getSelfStaticProp());

$anim = new Animal("辛巴", 5);
$anljw = new Animal('ljjw', 26);
$anim->speak();
$anljw->speak();
echoWithBr($anim->name);
$anim->name = "梁精武";
echoWithBr($anim->name);

varDumpWithBr(gettype($anim));
varDumpWithBr($anim);

$car = new Car("toyo", 'caribbean');
varDumpWithBr($car->brand);
echoWithBr($car::$power);
 $mycar = new Car();
 $mycar->make = '比亚斯';
 $mycar->mode = '666';

 $mycar->accelerate((100));
 $mycar->brake(10);
$mycar->brake(40);
