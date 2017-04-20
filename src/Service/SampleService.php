<?php

namespace Batch\Sample\Service;

use Batch\Sample\Model\Dao\UserDao;

class SampleService
{

    /** @var  UserDao */
    private $userDao;

    /**
     * SampleService constructor.
     * @param UserDao $userDao
     */
    public function __construct(UserDao $userDao)
    {
        $this->userDao = $userDao;
    }


    public function run(){
        //Modelを使ってバッチ処理を行う
        $users = $this->userDao->findAll();
        foreach ($users as $user){
        }
        return true;
    }
}