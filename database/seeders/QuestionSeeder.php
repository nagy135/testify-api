<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
            'type' => 'multiChoice',
            'test_id' => 1,
            'data' => [
                "question" => "How many bla bla are in bla bla?",
                "options" => [
                    [
                        "option" => "one",
                        "answer" => 1
                    ],
                    [
                        "option" => "two",
                        "answer" => 0
                    ],
                    [
                        "option" => "three",
                        "answer" => 1
                    ],
                    [
                        "option" => "four",
                        "answer" => 0
                    ],
                ],
                "points" => 9
            ]
        ]);

        Question::create([
            'type' => 'dragJoin',
            'test_id' => 1,
            'data' => [
                "description" => "Join part of the body with text",
                "questions" => [
                    [
                        "content" => "Head",
                        "type" => "text"
                    ],
                    [
                        "content" => "https://blabla.com/image.png",
                        "type" => "link"
                    ],
                    [
                        "content" => "https://blabla.com/image2.png",
                        "type" => "link"
                    ],
                    [
                        "content" => "Body",
                        "type" => "text"
                    ],
                    [
                        "content" => "https://blabla.com/image3.png",
                        "type" => "link"
                    ]
                ],
                "answers" => [
                    [
                        "content" => "Head",
                        "type" => "text"
                    ],
                    [
                        "content" => "https://blabla.com/image.png",
                        "type" => "link"
                    ],
                    [
                        "content" => "https://blabla.com/image2.png",
                        "type" => "link"
                    ],
                    [
                        "content" => "Body",
                        "type" => "text"
                    ],
                    [
                        "content" => "https://blabla.com/image3.png",
                        "type" => "link"
                    ]
                ],
                "joins" => [
                    [0,4],
                    [1,3],
                    [4,2],
                    [3,1],
                    [2,0]
                ],
                "points" => 6
            ]

        ]);

        Question::create([
            'type' => 'yesNo',
            'test_id' => 1,
            'data' => [
                "question" => "Does bla contain 'a'?",
                "answer" => 1,
                "points" => 3
            ]
        ]);

        Question::create([
            'type' => 'image',
            'test_id' => 1,
            'data' => [
                "image" => "https://blabla.sk/image.png",
                "description" => "In this image of blabla describe parts",
                "subQuestions" => [
                    [
                        "question" => "Small description to subquestion(optional)",
                        "answer" => "Abdominal muscle",
                        "maxPoints" => 2
                    ],
                    [
                        "question" => "Small description to subquestion(optional)",
                        "answer" => "Bicameral muscle",
                        "maxPoints" => 3
                    ]
                ],
                "points" => 7
            ]
        ]);

        Question::create([
            'type' => 'questionAnswer',
            'test_id' => 1,
            'data' => [
                "image" => "https://blabla.sk/image.png",
                "question" => "How heavy is superman's ass-hair?",
                "answer" => "Noone knows!",
                "points" => 7
            ]
        ]);
    }
}
