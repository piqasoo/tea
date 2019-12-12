<?php
  return [
    // ['title' => 'Dashboard', 'link' => '', 'class' => 'ti-home', 'namespace' => ''],
        'about' => [
            'title' => 'About', 
            'link' => 'about/1/edit', 
            'class' => 'fa fa-university sidebar-nav-icon', 
            'namespace' => 'about', 
            'icon'  => '',
            'roles' => ['admin']
        ],
        'newspaper' => [   
            'title' => 'Newspapers', 
            'link' => 'newspaper', 
            'class' => 'fa fa-newspaper-o sidebar-nav-icon', 
            'namespace' => 'newspaper', 
            'icon'  => '',
            'roles' => ['admin']
        ]
  ];
