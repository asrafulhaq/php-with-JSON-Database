<?php 


    $game = ['PC','Mobile','TV'];

    $food = [
        [
            'id'    => 1,
            'name'  => 'Asraful Haque',
            'skill' => 'MERN Stack',
            'age'   => 12
        ],
        [
            'id'    => 2,
            'name'  => 'Piyal Khan',
            'skill' => 'Python Developer',
            'age'   => 30
        ],
        [
            'id'    => 3,
            'name'  => 'Subbit Khan',
            'skill' => 'BlockChain',
            'age'   => 120
        ],
        [
            'id'    => 4,
            'name'  => 'Torikul Islam',
            'skill' => 'BlockChain',
            'age'   => 150
        ]
    ];

    $data = array_search( 'Torikul Islam' , array_column($food, 'name'));

    echo "<pre>";
    echo $data;



?>