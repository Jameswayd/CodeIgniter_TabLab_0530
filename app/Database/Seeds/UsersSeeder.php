<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'user1',
                'password' => 'password1',
            ],
            [
                'username' => 'user2',
                'password' => 'password2',
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
    
}
