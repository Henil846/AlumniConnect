<?php
namespace App\Models;

class User {
    public $id;
    public $full_name;
    public $email;
    public $password;
    public $role;
    public $college_id;
    public $is_verified;
    public $created_at;

    public function __construct($data = []) {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}
