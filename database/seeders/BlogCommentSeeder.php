<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BlogCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_comments')->insert(array(
            0 => array(
                'id' => 1,
                'name' => 'Achraf Saloumi',
                'email' => 'achraf.saloumi@mail.com',
                'comment' => 'First Comment',
                'id_blogs' => 1,
                'id_parent' => NULL,
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => 2,
                'name' => 'Achraf Saloumi',
                'email' => 'achraf.saloumi@mail.com',
                'comment' => 'First sub comment',
                'id_blogs' => 1,
                'id_parent' => 1,
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => 3,
                'name' => 'Noura Bouchbaat',
                'email' => 'noura.bouchbaat@mail.com',
                'comment' => 'First Sub Sub Comment',
                'id_blogs' => 1,
                'id_parent' => 2,
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            3 => array(
                'id' => 4,
                'name' => 'Oumaima Stitini',
                'email' => 'Oumaima.Stitini@mail.com',
                'comment' => 'Second Comment',
                'id_blogs' => 1,
                'id_parent' => NULL,
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            4 => array(
                'id' => 5,
                'name' => 'Brahim Barjali',
                'email' => 'Brahim.Barjali@mail.com',
                'comment' => 'Comment 2 : Sub 1',
                'id_blogs' => 1,
                'id_parent' => 4,
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
