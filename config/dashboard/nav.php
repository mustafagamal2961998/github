<?php 

return [
       'items'=>
            [
                'title'=>['en'=>'Dashboard','ar'=>'لوحة التحكم'],
                'badge'=>'',
                'route'=>'/admin',
                'active'=>'admin.*',
                'dropdownStatus'=>false,
            ],   
            [
                'title'=>['en'=>'Categories','ar'=>'الاقسام'],
                'badge'=>'',
                'route'=>'categories',
                'active'=>'categories.*',
                'dropdownStatus'=>true,
                'dropdown'=>[
                    [
                        'title'=>['en'=>'All Categories','ar'=>'جميع الاقسام'],
                        'route'=>'/admin/categories',
                    ],
                    [
                         'title'=>['en'=>'Add Category','ar'=>'إضافة قسم'],
                         'route'=>'/admin/categories/create',
                    ],
                    [
                        'title'=>['en'=>'Trashed category','ar'=>'الاقسام المحذوفه'],
                        'route'=>'/admin/categories/trashed',
                   ]
                ]
           ],
           [
            'title'=>['en'=>'Contents','ar'=>'المواضيع'],
            'badge'=>'new',
            'route'=>'contents',
            'active'=>'contents.*',
            'dropdownStatus'=>true,
            'dropdown'=>[
                [
                    'title'=>['en'=>'All Contents','ar'=>'جميع المواضيع'],
                    'route'=>'/admin/contents',
                ],
                [
                     'title'=>['en'=>'Add Content','ar'=>'إضافة موضوع'],
                     'route'=>'/admin/contents/create',
                ],
                [
                    'title'=>['en'=>'Trashed contents','ar'=>'المواضيع المحذوفه'],
                    'route'=>'/admin/contents/trashed',
               ]
            ]
        ]             

];