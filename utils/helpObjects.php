<?php

$icons = [
    'bedIcon',
    'wifiIcon',
    'carIcon',
    'snowIcon',
    'barbellIcon',
    'nosmokeIcon',
    'carIcon',
];

$facilities = [
    [
        'name' => 'Have High Rating',
        'number' => '01',
        'icon' => 'public/images/facilities1.svg'
    ],
    [
        'name' => 'Quiet Hours',
        'number' => '02',
        'icon' => 'public/images/facilities2.svg'
    ],
    [
        'name' => 'Best Locations',
        'number' => '03',
        'icon' => 'public/images/facilities3.svg'
    ],
    [
        'name' => 'Free Cancellation',
        'number' => '04',
        'icon' => 'public/images/facilities4.svg'
    ],
    [
        'name' => 'Payment Options',
        'number' => '05',
        'icon' => 'public/images/facilities5.svg'
    ],
    [
        'name' => 'Special Offers',
        'number' => '06',
        'icon' => 'public/images/facilities6.svg'
    ],
];

$menues = [
    [
        [
            'id' => 'menuOption1',
            'name' => 'Eggs & Bacon',
            'img' => 'public/images/foodsMenu/eggsBacon1.webp',
            'path' => 'eggsBacon'
        ],
        [
            'id' => 'menuOption2',
            'name' => 'Tea & Coffee',
            'img' => 'public/images/foodsMenu/teaCoffe1.webp',
            'path' => 'teaCoffe'
        ],
        [
            'id' => 'menuOption3',
            'name' => 'Chia Oatmeal',
            'img' => 'public/images/foodsMenu/chiaOat1.webp',
            'path' => 'chiaOat'
        ]
    ],
    [
        [
            'id' => 'menuOption4',
            'name' => 'Fruit Parfait',
            'img' => 'public/images/foodsMenu/fruit1.webp',
            'path' => 'fruit'
        ],
        [
            'id' => 'menuOption5',
            'name' => 'Marmalade Selection',
            'img' => 'public/images/foodsMenu/marmalade1.webp',
            'path' => 'marmalade'
        ],
        [
            'id' => 'menuOption6',
            'name' => 'Cheese Plate',
            'img' => 'public/images/foodsMenu/cheese1.webp',
            'path' => 'cheese'
        ]
    ],
    [
        [
            'id' => 'menuOption7',
            'name' => 'Coctail & Drink',
            'img' => 'public/images/foodsMenu/coctails1.webp',
            'path' => 'coctails'
        ],
        [
            'id' => 'menuOption8',
            'name' => 'Selected Wines',
            'img' => 'public/images/foodsMenu/wines1.webp',
            'path' => 'wines'
        ],
        [
            'id' => 'menuOption9',
            'name' => 'Alcohol Free Coctail',
            'img' => 'public/images/foodsMenu/alcoholFree1.webp',
            'path' => 'alcoholFree'
        ]
    ],
    [
        [
            'id' => 'menuOption10',
            'name' => 'Gourmet Brunch',
            'img' => 'public/images/foodsMenu/brunch1.webp',
            'path' => 'brunch'
        ],
        [
            'id' => 'menuOption11',
            'name' => 'Dessert & Cake',
            'img' => 'public/images/foodsMenu/dessert1.webp',
            'path' => 'dessert'
        ],
        [
            'id' => 'menuOption12',
            'name' => 'Chocolate Plate',
            'img' => 'public/images/foodsMenu/choco1.webp',
            'path' => 'choco'
        ]
    ],
    [
        [
            'id' => 'menuOption13',
            'name' => 'Plant Based Food',
            'img' => 'public/images/foodsMenu/plant1.webp',
            'path' => 'plant'
        ],
        [
            'id' => 'menuOption14',
            'name' => 'Gluten Free Options',
            'img' => 'public/images/foodsMenu/glutenFree1.webp',
            'path' => 'glutenFree'
        ],
        [
            'id' => 'menuOption15',
            'name' => 'Salad Bar',
            'img' => 'public/images/foodsMenu/salad1.webp',
            'path' => 'salad'
        ]
    ],
];

$counters = [
    [
        'img' => 'public/images/factPersonIcon.svg',
        'alt' => 'person icon',
        'counter' => '8000',
        'text' => 'Happy Users',
    ],
    [
        'img' => 'public/images/factStartIcon.svg',
        'alt' => 'stars icon',
        'counter' => '10M',
        'text' => 'Reviews & Appriciate',
    ],
    [
        'img' => 'public/images/factWorldIcon.svg',
        'alt' => 'world icon',
        'counter' => '100',
        'text' => 'Country Coverage',
    ]
];

$amenities = [
    'Air Conditioner' => "/public/images/amenities/airCondIcon.svg",
    'High speed WiFi' => "/public/images/amenities/wifiIcon.svg",
    'Breakfast' => "/public/images/amenities/breakIcon.svg",
    'Kitchen' => "/public/images/amenities/kitchenIcon.svg",
    'Cleaning' => "/public/images/amenities/cleanIcon.svg",
    'Shower' => "/public/images/amenities/showerIcon.svg",
    'Grocery' => "/public/images/amenities/groscerIcon.svg",
    'Single Bed' => "/public/images/amenities/bedIcon.svg",
    'Shop near' => "/public/images/amenities/shopIcon.svg",
    'Towels' => "/public/images/amenities/towelIcons.svg"
];

$bookingMessage = [
    'success' => ['title' => "¡Thank you for your request!", 'content' => "We have received it correctly. Someone from our Team will get back to you very soon."],
    'notAvailable' => ['title' => "¡We are really sorry!", 'content' => "This room is already occupied. Try selecting another date or choosing another room."]
];
