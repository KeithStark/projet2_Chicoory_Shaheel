<?php

require_once('./models/Crud.php');

class Role extends Crud
{
    protected $id;
    protected $name;
    protected $description;

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllRoles()
    {
        return $this->getAll('role');
    }

    public function getRoleById($id)
    {
        return $this->getById('role', $id);
    }

    public function addRole($roleData)
    {
        return $this->add('role', $roleData);
    }

    public function updateRoleById($id, $roleData)
    {
        return $this->updateById('role', $id, $roleData);
    }

    public function deleteRoleById($id)
    {
        return $this->deleteById('role', $id);
    }
}
