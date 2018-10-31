<?php


class Business{
    
    protected $staff;
    public function __construct(Staff $staff){
        $this->staff=$staff;
    }
    
    public function hire(Person $person){
        $this->staff->add($person);

    }
    public function getMember(){
        return $this->staff->members();
    }

}
class Staff{
    protected $members=[];
    public function __construct($members=[]){
        var_dump($this->$members);
        $this->members=$members;

    }
    public function add(Person $person){
        $this->members[]=$person;
    }
    
    public function members(){
        return $this->members;
    }

}
class Person{
    protected $name;
    public function __construct($name){
        $this->name=$name;
    }  
}

$person = new Person("Testing 1");

$staff = new Staff([$person]);

$job=new Business($staff);

$job->hire(new Person('Testing 2'));

var_dump($job->getMember());

?>