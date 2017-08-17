<?php

namespace App\Repositories\Account;

use Auth;
use DB;

use App\User;
use App\Table;
use App\Repositories\EloquentCrud;

class AccountEloquent implements IAccount
{
    /**
     * User instance, Laravel's model
     * @var App\User
    */
    private $model;
    
    /**
     * Assign required properties and instantiate required classes
     *
     * @param User   $model         App\User    
    */
    public function __construct(User $model) {
        $this->model = $model;        
    }

    /**
     * Get Laravel's model
     *
     * @return void
    */
    public function getModel() {
        return $this->model;
    }

    /**
     * Get users for index and edit
     *
     * @param int $id  id of specified user
     * @return object
    */
    public function get($id = NULL) {
        return $this->model
                ->leftJoin(
                    Table::USERS,
                    Table::ADVERTISEMENTS . '.advertiser_id',
                    '=',
                    Table::USERS . '.id')
                ->select(
                    Table::USERS . '.id',
                    Table::USERS . '.name',
                    Table::USERS . '.email',
                    Table::USERS . '.password',
                    Table::ADVERTISEMENTS . '.id AS advert_id',              
                    Table::ADVERTISEMENTS . '.title',              
                    Table::ADVERTISEMENTS . '.description',              
                    Table::ADVERTISEMENTS . '.price',              
                    Table::ADVERTISEMENTS . '.img_path')
                ->where(Table::USERS . '.id', $id)                    
                ->get();
        
    }
}
