<?php

declare(strict_types=1);

namespace App\Modules\Users;
use App\Modules\Datatable\DatatableRepository;

class UsersDatatableRepository extends DatatableRepository
{
    protected string $table = "users";
    protected array $orderColumns = [
        "id",
        "name",
        "email"
    ];
    protected array $searchColumns = [
        "name",
        "email"
    ];
    protected array $selectColumns = [
        "users.id",
        "users.name",
        "users.email"
    ];
    protected array $exceptionColumns = [
        "id" => "users.id",
        "name" => "users.name",
        "email" => "users.email", 
    ];
    protected string $joinQuery = "";
    protected string $where = "users.id > 0";



}