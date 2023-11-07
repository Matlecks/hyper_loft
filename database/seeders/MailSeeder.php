<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Letter;

class MailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Letter::create([
            'id' => 1,
            'title' => "Lucas Kriebel (via Twitter)",
            'from' => 'lucas@mail.ru',
            'status' => '',
            'category' => 'inbox',
            'label' => '',
            'message' => 'Hello! I recently visited your website and wanted to reach out to express my appreciation for the great content you provide. Keep up the fantastic work!
            ',
            /* 'updated_at' => '', */
        ]);

        Letter::create([
            'id' => 2,
            'title' => "Randy, me (5)",
            'from' => 'randy@mail.ru',
            'status' => '',
            'category' => 'inbox',
            'label' => '',
            'message' => 'Hi there! I just wanted to let you know that I found your website incredibly informative and user-friendly. Its evident that a lot of effort has been put into creating such a valuable resource.',
            /* 'updated_at' => '', */
        ]);

        Letter::create([
            'id' => 3,
            'title' => "Andrew Zimmer",
            'from' => 'andrew@mail.ru',
            'status' => '',
            'category' => 'inbox',
            'label' => '',
            'message' => 'Greetings! I wanted to take a moment to thank you for the exceptional service I received from your websites support team. They were prompt, professional, and resolved my issue efficiently. Im impressed!
            ',
            /* 'updated_at' => '', */
        ]);

        Letter::create([
            'id' => 4,
            'title' => "Infinity HR",
            'from' => 'infinity@mail.ru',
            'status' => '',
            'category' => 'inbox',
            'label' => '',
            'message' => 'Dear team, I wanted to reach out and express my gratitude for the valuable insights and tips I found on your website. Your expertise and attention to detail are truly commendable. Thank you!
            ',
            /* 'updated_at' => '', */
        ]);

        Letter::create([
            'id' => 5,
            'title' => "Web Support Dennis",
            'from' => 'support@mail.ru',
            'status' => '',
            'category' => 'inbox',
            'label' => '',
            'message' => 'Hi! I wanted to provide feedback on your websites design. Its visually appealing and easy to navigate, making the user experience enjoyable. Kudos to your web development team!
            ',
            /* 'updated_at' => '', */
        ]);

        Letter::create([
            'id' => 6,
            'title' => "me, Peter (2)",
            'from' => 'peter@mail.ru',
            'status' => '',
            'category' => 'inbox',
            'label' => '',
            'message' => 'Hello there! I wanted to let you know that your websites content has been instrumental in helping me with my research. The comprehensive information and well-referenced sources have been invaluable. Thank you!
            ',
            /* 'updated_at' => '', */
        ]);

        Letter::create([
            'id' => 7,
            'title' => "Medium",
            'from' => 'medium@mail.ru',
            'status' => '',
            'category' => 'inbox',
            'label' => '',
            'message' => 'Hi! I just wanted to say how impressed I am with the speed of your website. It loads quickly and smoothly, which makes browsing a breeze. Well done to your tech team!
            ',
            /* 'updated_at' => '', */
        ]);

        Letter::create([
            'id' => 8,
            'title' => "Death to Stock",
            'from' => 'death@mail.ru',
            'status' => '',
            'category' => 'inbox',
            'label' => '',
            'message' => 'Dear website admin, I wanted to share my positive experience with your online store. The ordering process was seamless, and the delivery was prompt. Im delighted with my purchase. Thank you!
            ',
            /* 'updated_at' => '', */
        ]);
    }
}
