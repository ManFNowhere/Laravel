<?php

namespace Database\Seeders;

use App\Models\Code;
use App\Models\Date;
use App\Models\Events;
use App\Models\Room;
use App\Models\Time;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat kode default untuk user, speaker, dan admin
        Code::create([
            'codename' => 'speaker',
            'code' => 333333,
        ]);
        Code::create([
            'codename' => 'admin',
            'code' => 666666,
        ]);

        // Buat data tanggal
        for ($i = 5; $i <= 6; $i++) {
            Date::create([
                'date' => '2024-06-0' . $i,
            ]);
        }

        // Buat data ruangan dan waktu
        $time = 0;
        for ($i = 1; $i <= 5; $i++) {
            Room::create([
                'room_name' => 'Room ' . $i,
                'room_number' => $i
            ]);

            Time::create(['time_events' => '15:' . $time . ':00']);
            $time = $time + 10;
        }

        // Buat user
        User::create([
            'name' => 'admin',
            'email' => 'admin@webmen.de',
            'password' => Hash::make('test'),
            'role' => 1
        ]);
        User::create([
            'name' => 'Tanwir Khalid Mahdi',
            'email' => 'tma@webmen.de',
            'password' => Hash::make('test'),
            'role' => 2
        ]);
        
        User::create([
            'name' => 'Tanwir Mahdi',
            'email' => 'vrlix03@gmail.com',
            'password' => Hash::make('test'),
            'role' => 2
        ]);

        // Buat event dan data per event
        $title = 'Test Event ';
        $slug = 'test-event-';
        $description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus sequi, quo optio, officiis nobis excepturi ullam aliquam pariatur unde ducimus consequuntur rerum quaerat consequatur. Consequuntur accusamus facere reiciendis consectetur at. Praesentium, in nostrum. Facilis, fugit inventore repellendus quibusdam tempora enim nisi, veritatis ut ipsam nesciunt ea rem. Totam, optio laborum perspiciatis incidunt eveniet assumenda est, excepturi libero soluta, veniam minima. Labore hic pariatur facere illo doloremque, officia illum deleniti eveniet! Quibusdam magni error quia atque quas itaque voluptatibus corrupti rem eligendi debitis accusantium impedit placeat repellendus, quod, in temporibus qui blanditiis! Iusto quia quisquam corporis, obcaecati magni a nostrum quod! Laboriosam recusandae sequi vel rerum ratione numquam tenetur, animi velit amet eum inventore, aliquam sapiente ipsa! Nostrum amet reiciendis nam assumenda consequuntur vel a unde animi earum, maiores fugit ullam vero excepturi atque obcaecati similique ex natus qui nobis maxime! Non, autem ullam explicabo sunt, minima veniam doloribus suscipit eum velit adipisci enim repellendus facere quos! Quibusdam, hic. Voluptates, iste iusto nam animi voluptate deserunt nostrum asperiores! Tempora pariatur, dolorem eveniet placeat molestiae cum temporibus, nisi optio architecto officia quaerat natus libero eius quisquam! Cumque animi voluptates laborum, error nihil adipisci necessitatibus non a nemo, iste commodi eius aperiam esse.';
        $cover = 'cover-event/test.jpg';
        $data = 'data-event/test.pptx';
        for ($i = 1; $i <= 3; $i++) {

            $event = Events::create([
                'title' => $title . $i,
                'slug' => $slug . $i,
                'description' => $description,
                'user_id' => 2,
                'date_id' => 2,
                'time_id' => $i,
                'room_id' => $i,
                'cover' => $cover,
                'data' => $data
            ]);

            // Tambahkan pengguna ke event
            $event->participants()->attach($i);
        }
    }
}
