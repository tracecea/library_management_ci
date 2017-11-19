<?php

/*
 * This file is subject to the terms and conditions defined in
 * file 'LICENSE.txt', which is part of this source code package.
 */

$fields = 'fields';
$name = 'name';
$tag = 'tag';
$type = 'type';
$is_db = 'is_db';
$dbname = 'db_name';
$form_attr = 'form_attr';
$title = 'title';
$default = 'default';
$enabled = 'enabled';
$formtitle = 'form_title';
$staticdata = 'staticdata';
$dynamic_data = 'dynamic_data';
$extraclasses = 'extraclasses';
$extras = 'extras';
$table = 'table';
$primary_key = 'primary_key';




$config['library_user'] = array(
    $primary_key => 'id',
    $table => 'users',
    $formtitle => 'User',
    $fields => array(
        'name' => array(
            $name => 'name',
            $title => 'User Name',
            $tag => 'input',
            $type => 'text',
            $dbname => 'name',
            $form_attr => array('required', 'min_length[2]')
        ),
        'email' => array(
            $name => 'email',
            $title => 'Email Address',
            $tag => 'input',
            $type => 'email',
            $dbname => 'email',
            $form_attr => array(
                'required', 'min_length[2]', 'is_unique[users.email]'
                , 'valid_email'
            )
        ),
        'dob' => array(
            $name => 'dob',
            $title => 'Date of birth ',
            $tag => 'input',
            $type => 'date',
            $dbname => 'dob',
            $form_attr => array('required')
        ),
        'phone' => array(
            $name => 'phone',
            $title => 'Phone Number',
            $tag => 'input',
            $type => 'tel',
            $dbname => 'phone',
            $form_attr => array('min_length[10]', 'is_unique[users.phone]')
        ),
        'address' => array(
            $name => 'address',
            $title => 'User Address ',
            $tag => 'textarea',
            $dbname => 'address',
            $form_attr => array('min_length[15]', 'max_length[4000]')
        ),
        'enabled' => array(
            $name => 'enabled',
            $title => 'Enable this user',
            $tag => 'input',
            $type => 'simple_checkbox',
            $default => 'checked',
            $dbname => 'status',
            $is_db => false
        )
    )
);
