<?php require 'prepend.php';

// print_r(riceplusplus::get_reports());

//print_r(riceplusplus::get_comments(0));

// print_r(riceplusplus::get_comment_count(1));

$data = array(
    'broken' => 'Yes',
    'color' => 'yellow',
    'address' => 'los banos',
    'spotty' => 'Yes',
    'name' => 'Rustan Capal',
    'longitude' => 121.2249991,
    'latitude' => 14.1607913,
    'part' => 'Sheath',
    'stage' => '1 month',
    'variety' => 'r19',
    'pillars' => 'Yes',
    'hole' => 'Yes',
    'mobile' => '09292608488',
    'image' => '1352576786A0fe2.jpg',
);

echo riceplusplus::add_report($data);

?>