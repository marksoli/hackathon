<?php
class User extends Model{
	public $username;
	public $password;
    public $user_id;
    public $complete;
    public $first_name;
    public $last_name;
    public $age;
    public $yearEarn;
    public $monthExp;
    public $housing;
    public $food;
    public $misc;
    public $invest;
    public $completeInv;
    public $goal;
    public $period;
    public $types;
    public $invested;

    public function __construct()
    {   
        parent::__construct();
    }

    public function find($username){
        $stmt = self::$_connection->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username'=>$username]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
        return $stmt->fetch();
    }

    public function findFirstTime($user_id){
        $stmt = self::$_connection->prepare("SELECT complete FROM users WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$user_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
        return $stmt->fetch();
    }

    public function findId($user_id){
        $stmt = self::$_connection->prepare("SELECT * FROM users WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$user_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
        return $stmt->fetch();
    }
      
    public function insert(){
	    $stmt = self::$_connection->prepare("INSERT INTO users(username, password, first_name, last_name) VALUES(:username, :password, :first_name, :last_name)");
        $stmt->execute(['username'=>$this->username,
                        'password'=>$this->password,
                        'first_name'=>$this->first_name,
                        'last_name'=>$this->last_name]);
    }

    public function getAll(){
        $stmt = self::$_connection->prepare("SELECT * FROM users");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        return $stmt->fetchAll();
    }

    public function edit(){
        $stmt = self::$_connection->prepare("UPDATE users SET password = :password WHERE user_id = :user_id");
        $stmt->execute(['password'=>$this->password,
                        'user_id'=>$this->user_id]);        
    }

    public function setAge($age){
        $stmt = self::$_connection->prepare("UPDATE users SET age = :age WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$this->user_id,
                        'age'=>$age]);        
    }

    public function setYearEarn($yearEarn){
        $stmt = self::$_connection->prepare("UPDATE users SET yearEarn = :yearEarn WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$this->user_id,
                        'yearEarn'=>$yearEarn]);        
    }

    public function setMonthExp($monthExp){
        $stmt = self::$_connection->prepare("UPDATE users SET monthExp = :monthExp WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$this->user_id,
                        'monthExp'=>$monthExp]);        
    }

    public function setHousing($housing){
        $stmt = self::$_connection->prepare("UPDATE users SET housing = :housing WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$this->user_id,
                        'housing'=>$housing]);        
    }

    public function setFood($food){
        $stmt = self::$_connection->prepare("UPDATE users SET food = :food WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$this->user_id,
                        'food'=>$food]);        
    }

    public function setMisc($misc){
        $stmt = self::$_connection->prepare("UPDATE users SET misc = :misc WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$this->user_id,
                        'misc'=>$misc]);        
    }

    public function setComplete($val){
        $val++;
        $stmt = self::$_connection->prepare("UPDATE users SET complete = :val WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$this->user_id,
                        'val'=>$val]);        
    }

    public function setGoal($goal){
        $stmt = self::$_connection->prepare("UPDATE users SET goal = :goal WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$this->user_id,
                        'goal'=>$goal]);        
    }

    public function setPeriod($period){
        $stmt = self::$_connection->prepare("UPDATE users SET period = :period WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$this->user_id,
                        'period'=>$period]);        
    }

    public function setTypes($types){
        $stmt = self::$_connection->prepare("UPDATE users SET types = :types WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$this->user_id,
                        'types'=>$types]);        
    }

    public function setInvested($invested){
        $stmt = self::$_connection->prepare("UPDATE users SET invested = :invested WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$this->user_id,
                        'invested'=>$invested]);        
    }

    public function setCompleteInv($val){
        $val++;
        $stmt = self::$_connection->prepare("UPDATE users SET completeInv = :val WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$this->user_id,
                        'val'=>$val]);        
    }


}
?>